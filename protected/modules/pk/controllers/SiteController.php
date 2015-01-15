<?php

class SiteController extends Controller
{
	public $layout='column1';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionUpdate() {
		switch ($_GET['version'])
		{
			case '0.1.2':
				/**
				 * Merge all MANY_MANY maps into table 'ts_map'
				 */
				Yii::app()->db->createCommand()->setText('
					drop table if exists `ts_map`;
					create table `ts_map`
					(
					   `f_id`		BIGINT(20) DEFAULT NULL,
					   `t_id`		BIGINT(20) DEFAULT NULL,
					   `category`	VARCHAR(80) DEFAULT NULL
					) engine InnoDB DEFAULT CHARSET=utf8;
				')->execute();

				foreach ( ClipTaxonomy::model()->findAll() as $r)
				{
					$map = new Map;
					$map->category = 'ClipTaxonomy';
					$map->f_id = $r->clip_id;
					$map->t_id = $r->taxonomy_id;
					$map->save();
				}
				foreach ( ExplanationTaxonomy::model()->findAll() as $r)
				{
					$map = new Map;
					$map->category = 'ExplanationTaxonomy';
					$map->f_id = $r->explanation_id;
					$map->t_id = $r->taxonomy_id;
					$map->save();
				}
				Yii::app()->db->createCommand()->setText('
					DROP TABLE ts_clip_taxonomy;
					DROP TABLE ts_explanation_taxonomy;
				')->execute();
				/*
				Yii::app()->db->createCommand()->setText('
					ALTER TABLE ts_category ADD parent int(4) DEFAULT NULL AFTER name;
					ALTER TABLE ts_category ADD position int(4) DEFAULT NULL AFTER parent;
					UPDATE ts_category SET parent = 0;
					ALTER TABLE ts_category DROP slug;
					ALTER TABLE ts_category DROP cat_desc;
				')->execute();
				*/
				break;
			case '0.1.1':

				break;
			default:
				echo 'Please specify a version number.';
				break;
		}
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
		/*
		$model=new LoginForm;
		$form = new CForm('application.views.site.loginForm', $model);
		if ($form->submitted('login') && $form->validate() && $model->login())
			//$this->redirect(array('post/index'));
			$this->redirect(Yii::app()->user->returnUrl);
		else
			//$this->render('login',array('model'=>$model));
			$this->render('login',array('form'=>$form));
		*/
	}

	/**
	 * Create an Logistics Info
	 */
	public function actionAddlogistics()
	{
		$form = new CForm('application.views.site.addlogisticsForm');
		$form['company']->model = new Company;
		$form['address']->model = new Address;
		if ($form->submitted('create') && $form->validate()) 
		{
			$company = $form['company']->model;
			$address = $form['address']->model;
			if ($company->save(false)) 
			{
				$address->company_id = $compnay->id;
				$address->save(false);
				$this->redirect(array('address/index'));
			}
		}
		$this->render('addlogistics',array('form'=>$form));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}
