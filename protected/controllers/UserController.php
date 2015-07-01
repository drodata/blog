<?php

class UserController extends Controller
{
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=User::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	} 
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionChangePwd()
	{
		$model=new FormUserChangePassword;
                    
		if(isset($_POST['ajax']) && $_POST['ajax']==='change-pwd-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                    
		if(isset($_POST['FormUserChangePassword']) )
		{
			$model->attributes=$_POST['FormUserChangePassword'];
			$user = User::model()->findByPk(Yii::app()->user->id);
			$user->password = $user->hashPassword($model->newPassword, $user->salt);
                    
			if ( $model->validate() && $user->update(array('password')) ) {
				Yii::app()->user->setFlash('success', "&radic; 修改已保存");
				$this->redirect(array('user/view', 'id' => $user->id));
			}
		}
                    
		$this->render('changePwd', array( 'model'=>$model,));
	}

	public function actionIndex()
	{
		$this->render('index',array(
		));
	}
	public function actionView()
	{
		$model= $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
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
