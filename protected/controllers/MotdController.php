<?php

class MotdController extends Controller
{
	public $layout='column2';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Motd::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Motd;
		if(isset($_POST['Motd']))
		{
			$model->attributes=$_POST['Motd'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Motd']))
		{
			$model->attributes=$_POST['Motd'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
		$this->loadModel()->delete();
		$this->redirect(array('index'));
	}

	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
			'order'=>'time DESC',
		));
		$dataProvider=new CActiveDataProvider('Motd', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionView()
	{
		$motd=$this->loadModel();

		$this->render('view',array(
			'model'=>$motd,
		));
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
