<?php

class TaxonomyController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Taxonomy::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionIndex()
	{
		$model=new Taxonomy('search');
		$model->unsetAttributes();
		if(isset($_GET['Taxonomy']))
			$model->attributes=$_GET['Taxonomy'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionCreate() {
		$model=new Taxonomy;
		if(isset($_POST['ajax']) && $_POST['ajax']==='taxonomy-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		if(isset($_POST['Taxonomy']) )
		{
			$model->attributes=$_POST['Taxonomy'];
                
			if ( $model->validate()) {
				if ($model->save())
					$this->redirect('index');
			}
		}
		$this->render('create', array( 'model'=>$model,));
	}

	public function actionUpdate() {
		$model=$this->loadModel();
		if(isset($_POST['ajax']) && $_POST['ajax']==='taxonomy-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Taxonomy']))
		{
			$model->attributes=$_POST['Taxonomy'];
			if ( $model->validate()) {
				if ($model->update())
					$this->redirect('index');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionDelete()
	{
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
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
