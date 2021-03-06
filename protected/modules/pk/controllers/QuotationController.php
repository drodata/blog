<?php

class QuotationController extends Controller
{
	public $layout = 'column1';
	private $_model;
	private $_redirectUrl;
	public function filters()
	{
		return array( 'accessControl',);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function loadRedirectUrl()
	{
		if($this->_redirectUrl===null)
		{
			if(isset($_GET['redirect']))
			{
				$this->_redirectUrl = $_GET['redirect'];
			}
			else
				$this->_redirectUrl = Yii::app()->baseUrl.'/'.$this->module->id;
		}
		return $this->_redirectUrl;
	}
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Quotation::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Quotation;
		if (isset($_GET['explanation_id']))
		{
			$model->explanation_id = $_GET['explanation_id'];
		}
		// create in a certain section page
		if (isset($_GET['scrap_id']))
		{
			$model->scrap_id = $_GET['scrap_id'];
		}
		if(isset($_POST['Quotation']) )
		{
			$model->attributes=$_POST['Quotation'];
			$model->c_time = new CDbExpression('NOW()');
                
			if ($model->save()) 
			{
				$url = $this->loadRedirectUrl();
				if (isset($url))
					$this->redirect($url);
				else
					$this->redirect( Yii::app()->baseUrl.'/'.$this->module->id.'/section/view?id='.$model->scrap->section_id );
			}
		}
		$this->render('create', array( 'model'=>$model,));
	}

	public function actionDelete()
	{
		$this->loadModel()->delete();
		$this->redirect( Yii::app()->baseUrl.'/'.$this->module->id);
		/*
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		*/
	}

	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'c_time DESC';

		$dataProvider=new CActiveDataProvider('Quotation', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionAdmin()
	{
		$model=new Quotation('search');
		$model->unsetAttributes();
		if(isset($_GET['Quotation']))
			$model->attributes=$_GET['Quotation'];
                
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Quotation']))
		{
			$model->attributes=$_POST['Quotation'];
			if ( $model->validate()) {
				if ($model->update()) {
					$this->redirect( $this->loadRedirectUrl() );
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionView()
	{
		$criteria=new CDbCriteria;
		if (isset($_GET['section_id']))
			$criteria->compare('section_id',$_GET['section_id']);
		$criteria->order = 'c_time DESC';

		$dataProvider=new CActiveDataProvider('Quotation', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('view',array(
			'dataProvider'=>$dataProvider,
		));
	}

}
