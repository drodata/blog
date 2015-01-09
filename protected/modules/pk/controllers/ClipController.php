<?php
spl_autoload_unregister(array('YiiBase','autoload')); 
Yii::import('application.vendors.*');
require_once('Parsedown.php');
spl_autoload_register(array('YiiBase','autoload'));

class ClipController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Clip::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Clip;
		$formTaxonomy = new FormTaxonomy;
                
		if(isset($_POST['Clip']) )
		{
			$model->attributes=$_POST['Clip'];
			$model->c_time = new CDbExpression('NOW()');
                
			if ($model->save())
			{
				// 1. store taxonomy
				Taxonomy::sv('Clip',$_POST['FormTaxonomy']['taxonomy'], $model->id, 'create');
				// 2. redirect
				$this->redirect(Yii::app()->request->baseUrl.'/'.$this->module->id);
			}
		}
		$this->render('create', array( 
			'model'=>$model,
			'formTaxonomy' => $formTaxonomy,
		));
	}

	public function actionAjaxGetTaxonomy()
	{
		header("Content-type: application/json");
		$d = array();

		$results = Taxonomy::model()->findAllByAttributes(array(
			'category' => 'Clip',
		));
		if ($results) {
			foreach ($results as $r) { 
				$d[] = $r->name;
			}
		}
		echo json_encode($d);
	}

	public function actionDelete()
	{
			$this->loadModel()->delete();
			ClipTaxonomy::model()->deleteAllByAttributes(array(
				'clip_id'=> $this->loadModel()->id,
			));
			$this->redirect(Yii::app()->request->baseUrl.'/'.$this->module->id);
		/*
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();
			ClipTaxonomy::model()->deleteAllByAttributes(array(
				'clip_id'=> $this->loadModel()->id,
			));

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
		$model=new Clip('search');
		$model->unsetAttributes();
		if(isset($_GET['Clip']))
			$model->attributes=$_GET['Clip'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionView()
	{
		$parsedown = new Parsedown();

		$criteria=new CDbCriteria;
		if (isset($_GET['section_id']))
			$criteria->compare('section_id',$_GET['section_id']);
		$criteria->order = 'c_time DESC';

		$dataProvider=new CActiveDataProvider('Clip', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('view',array(
			'dataProvider'=>$dataProvider,
			'parsedown' => $parsedown,
		));

	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		$formTaxonomy = new FormTaxonomy;
		$formTaxonomy->taxonomy = Taxonomy::getTaxonomyString( 'Clip', $model->id );
		if(isset($_POST['Clip']))
		{
			$model->attributes=$_POST['Clip'];
			if ( $model->validate()) 
			{
				$model->update();
				Taxonomy::sv('Clip',$_POST['FormTaxonomy']['taxonomy'], $model->id, 'update');
				$this->redirect(Yii::app()->request->baseUrl.'/'.$this->module->id);
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'formTaxonomy' => $formTaxonomy,
		));
	}
	public function actionAjaxSearch() {
		header("Content-type: application/json");
		$d = array();
		$p = $_POST;

		$criteria = new CDbCriteria;
		if (isset($p['section']))
			$criteria->compare('section_id', $p['section']);
		$criteria->order = 'c_time DESC';
		$results = Clip::model()->findAll($criteria);

		if (sizeof($results) > 0) {
			$content = $results[0];
			$d['slice'] = '';
			foreach ($results as $r) {
				$d['slice'] .= '<div class="col-sm-12">';
				$d['slice'] .= '<h4>'.$r->title.'</h4>';
				$d['slice'] .= '</div>';
			}
			$d['content'] = $content->c_time;
		} else {
			$d['slice'] = '<p>no results</p>';
			$d['content'] = '<p>no results</p>';
		}
		echo json_encode($d);
	}
	public function actionAjaxQuickAddTaxonomy() {
		header("Content-type: application/json");
		$d = array();

		$taxo = Taxonomy::model()->findByAttributes(array(
			'category' => 'Clip',
			'name' => trim($_POST['name']),
		));
		if (!isset($taxo)) 
		{
			$taxo = new Taxonomy;
			$taxo->name = trim($_POST['name']);
			$taxo->category = 'Clip';
			$taxo->save();
		}
		$clip_taxonomy = new ClipTaxonomy;
		$clip_taxonomy->clip_id = $_POST['id'];
		$clip_taxonomy->taxonomy_id = $taxo->id;
		$clip_taxonomy->save();
		$d['redirectUrl'] = Yii::app()->request->baseUrl.'/'.$this->module->id;
		$d['new'] = Clip::taxonomyString($_POST['id']);
		echo json_encode($d);
	}

}
