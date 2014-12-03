<?php

class LogisticsController extends Controller
{
	public $layout='column2';
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Address::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	public function actionHide()
	{
		$model=$this->loadModel();
		$model->hide();
		$this->redirect(array('logistics/admin'));
	}

	public function actionCreateBranch()
	{
		$model=new LogisticsForm;
		$model->scenario='newBranch';

		$model->attributes=$_POST['LogisticsForm'];

		if(isset($_POST['ajax']) && $_POST['ajax']==='logistics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LogisticsForm']))
		{
			if($model->validate())
			{
				$address = new Address;
                                
				$address->company_id 	= $model->company_id;
				$address->duty 		= $model->duty;
				$address->contacter    	= $model->contacter;
				$address->cell_phone   	= $model->cell_phone;
				$address->office_phone 	= $model->office_phone;
                                
				if ($address->save(false)) {
					$this->redirect(array('logistics/admin'));
				}
			}
		}

		$this->render('createbranch',array( 'model'=>$model,));
	}
	public function actionCreate()
	{
		$model=new LogisticsForm;
		$model->scenario='newLogistics';

		// 几天来找的一行！
		// 不把表单元素的值传递到 $model 中，怎么能调用 validate() 方法？
		$model->attributes=$_POST['LogisticsForm'];

		if(isset($_POST['ajax']) && $_POST['ajax']==='logistics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LogisticsForm']))
		{
			if($model->validate())
			{
				$company = new Company;
				$address = new Address;
                                
				$company->category 	= Company::CATEGORY_LOGISTICS;
				$company->full_name 	= $model->full_name;
				$company->is_main 	= 1;

				$address->duty 		= $model->duty;
				$address->contacter    	= $model->contacter;
				$address->cell_phone   	= $model->cell_phone;
				$address->office_phone 	= $model->office_phone;
                                
				if ($company->save(false)) {
					$address->company_id = $company->company_id;
					$address->save(false);
					$this->redirect(array('logistics/admin'));
				}
			}
		}

		$this->render('create',array( 'model'=>$model,));
	}
	public function actionView()
	{
		$model=new LogisticsForm;
		$addressModel=$this->loadModel();
		$model->id 		= $id;
		$model->full_name 	= $addressModel->company->full_name;
		$model->duty 		= $addressModel->duty;
		$model->contacter 	= $addressModel->contacter;
		$model->cell_phone 	= $addressModel->cell_phone;
		$model->office_phone 	= $addressModel->office_phone;

		$this->render('view',array(
			'model'=>$model,
		));
	}
	public function actionUpdate()
	{
		$model=new LogisticsForm;
		$model->scenario='newLogistics';
		$addressModel=$this->loadModel();
		$companyModel=Company::model()->findByPk($addressModel->company_id);
		$model->full_name 	= $companyModel->full_name;
		$model->duty 		= $addressModel->duty;
		$model->contacter 	= $addressModel->contacter;
		$model->cell_phone 	= $addressModel->cell_phone;
		$model->office_phone 	= $addressModel->office_phone;

		if(isset($_POST['LogisticsForm']))
		{
			$model->attributes=$_POST['LogisticsForm'];
			if($model->validate())
			{
				$companyModel->full_name 	= $model->full_name;
				$addressModel->duty 		= $model->duty;
				$addressModel->contacter    	= $model->contacter;
				$addressModel->cell_phone   	= $model->cell_phone;
				$addressModel->office_phone 	= $model->office_phone;

				if ( $companyModel->save(false) && $addressModel->save(false)) {
					$this->redirect(array('logistics/admin'));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAdmin()
	{
		$model=new Address('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Address']))
			$model->attributes=$_GET['Address'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
		$model=$this->loadModel();
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
}
