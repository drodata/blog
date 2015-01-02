<?php

class ExplanationController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Explanation::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Explanation;
		if(isset($_POST['ajax']) && $_POST['ajax']==='explanation-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		if(isset($_POST['Explanation']) )
		{
			$model->attributes=$_POST['Explanation'];
			$model->c_time = new CDbExpression('NOW()');
                
			if ( $model->validate()) {
				if ($model->save())
					//$this->redirect('index');
					$this->redirect(Yii::app()->request->urlReferrer);
			}
		}
		$this->render('create', array( 'model'=>$model,));
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

	public function actionIndex()
	{
		$model=new Explanation('search');
		$model->unsetAttributes();
		if(isset($_GET['Explanation']))
			$model->attributes=$_GET['Explanation'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['ajax']) && $_POST['ajax']==='explanation-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Explanation']))
		{
			$model->attributes=$_POST['Explanation'];
			if ( $model->validate()) {
				if ($model->update())
					$this->redirect('index');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

}
