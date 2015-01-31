<?php
spl_autoload_unregister(array('YiiBase','autoload')); 
Yii::import('application.vendors.*');
require_once('Parsedown.php');
spl_autoload_register(array('YiiBase','autoload'));


class ScrapController extends Controller
{
	private $_model;
	private $_redirectUrl;
	public function loadRedirectUrl()
	{
		if($this->_redirectUrl===null)
		{
			if(isset($_GET['redirect']))
			{
				$this->_redirectUrl = $_GET['redirect'];
			}
		}
		return $this->_redirectUrl;
	}
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Scrap::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionView()
	{
		$parsedown = new Parsedown();

		$criteria=new CDbCriteria;
		if (isset($_GET['section_id']))
		{
			$criteria->compare('section_id',$_GET['section_id']);
			$section = Section::model()->findByPk($_GET['section_id']);
		} 
		$criteria->order = 'id DESC';

		$dataProvider = new CActiveDataProvider('Scrap', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));
		$this->render('view',array(
			'dataProvider'=>$dataProvider,
			'parsedown' => $parsedown,
			'section' => $section,
		));
	}
	public function actionCreate()
	{
		$redirectUrl = $_GET['redirect'];

		$model=new Scrap;
		if(isset($_GET['section_id']) )
		{
			$model->section_id = $_GET['section_id'];
			$_tail = '?id='.$_GET['section_id'];
		} else
			$_tail = '';

		if(isset($_POST['Scrap']) )
		{
			$model->attributes=$_POST['Scrap'];
                
			if ($model->save())
				$this->redirect($redirectUrl);
		}
		$this->render('create', array( 
			'model'=>$model,
		));
	}
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Scrap']))
		{
			$model->attributes=$_POST['Scrap'];
			if ( $model->validate()) 
			{
				$model->update();
				$this->redirect( $this->loadRedirectUrl() );
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionDelete()
	{
		$scrap = $this->loadModel();
		if (isset($scrap->clips))
		{
			foreach ($scrap->clips as $c)
			{
				Map::model()->deleteAllByAttributes(array(
					'f_id'=> $c->id,
					'category' => 'ClipTaxonomy',
				));
				$c->delete();
			}
		}
		if (isset($scrap->quotations))
		{
			foreach ($scrap->quotations as $q)
			{
				$q->delete();
			}
		}
		$scrap->delete();
		$this->redirect( $this->loadRedirectUrl() );
	}
}
