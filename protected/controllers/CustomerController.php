<?php

class CustomerController extends Controller
{
	public $layout='column2';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Company::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	public function actionView()
	{
		$model = Address::getPriAddr($_GET['id']);
		$this->render('view',array( 'model'=>$model,));
	}

	public function actionAddAddress($cid)
	{
		$this->render('addaddress',array( 'model'=>$model,));
	}
	public function actionUpdate()
	{
		$model=new CustomerForm;
		if ($_GET['address_id'])
			$addressModel = Address::model()->findByPk($_GET['address_id']);
		else
			$addressModel = Address::getPriAddr($_GET['id']);
		$companyModel=Company::model()->findByPk($_GET['id']);

		$model->full_name 	= $addressModel->company->full_name;
		$model->short_name 	= $addressModel->company->short_name;
		$model->site 		= $addressModel->company->site;
		$model->country_id 	= $addressModel->country_id;
		$model->street 		= $addressModel->street;
		$model->zip 		= $addressModel->zip;
		$model->fax 		= $addressModel->fax;
		$model->contacter 	= $addressModel->contacter;
		$model->duty 		= $addressModel->duty;
		$model->cell_phone 	= $addressModel->cell_phone;
		$model->office_phone 	= $addressModel->office_phone;
		$model->action 		= 'update';
		if ($_GET['address_id'])
			$model->addressType 	= 'common';
		if ($model->country_id == 47) {
			$model->province_ml 	= $addressModel->province;
			$model->city_ml 	= $addressModel->city;
			$model->type = 'mainland';
		} else {
			$model->province_ab 	= $addressModel->province;
			$model->city_ab 	= $addressModel->city;
			$model->type = 'abroad';
		}

		if(isset($_POST['CustomerForm']))
		{
			$model->attributes=$_POST['CustomerForm'];
			if($model->validate())
			{
				$companyModel->full_name 	= $model->full_name;
				$companyModel->short_name 	= $model->short_name;
				$companyModel->site 		= ($model->site == '') ? NULL : $model->site;

				$addressModel->country_id	= $model->country_id;
				$addressModel->province		= ($model->type == 'mainland') ? $model->province_ml : $model->province_ab;
				$addressModel->city		= ($model->type == 'mainland') ? $model->city_ml : $model->city_ab;
				$addressModel->street 		= $model->street;
				$addressModel->zip 		= ($model->zip == '') ? NULL : $model->zip;
				$addressModel->contacter    	= $model->contacter;
				$addressModel->duty 		= ($model->duty == '') ? NULL : $model->duty;
				$addressModel->cell_phone   	= ($model->cell_phone == '') ? NULL : $model->cell_phone;
				$addressModel->office_phone 	= ($model->office_phone == '') ? NULL : $model->office_phone;
				$addressModel->fax 		= ($model->fax == '') ? NULL : $model->fax;
                                
				if ($companyModel->save(false) and $addressModel->save(false)) {
					$this->redirect(array('customer/view?id='.$addressModel->company_id));
				}
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model=new CustomerForm;
		
		$model->addressType = ($_GET['id']) ? 'common' : 'primary';

		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['CustomerForm']))
		{
			$model->attributes=$_POST['CustomerForm'];

			if($model->validate())
			{
				if ($model->addressType=='primary')
				{
					$company = new Company;
					$company->category 	= Company::CATEGORY_CUSTOMER;
					$company->full_name 	= $model->full_name;
					$company->short_name 	= $model->short_name;
					$company->site 		= ($model->site == '') ? NULL : $model->site;
				}
				$address = new Address;
                                

				$address->country_id	= $model->country_id;
				$address->is_main	= ($model->addressType=='primary')?1:0;
				$address->province	= ($model->type == 'mainland') ? $model->province_ml : $model->province_ab;
				if ($model->type == 'mainland') {
					$address->province 	= $model->province_ml;
					$address->city 		= ($model->city_ml == '') ? NULL : $model->city_ml;
				} else {
					$address->province 	= ($model->province_ab == '') ? NULL : $model->province_ab;
					$address->city 		= ($model->city_ab == '') ? NULL : $model->city_ab;
				}
				$address->street 	= $model->street;
				$address->zip 		= ($model->zip == '') ? NULL : $model->zip;
				$address->contacter    	= $model->contacter;
				$address->duty 		= ($model->duty == '') ? NULL : $model->duty;
				$address->cell_phone   	= ($model->cell_phone == '') ? NULL : $model->cell_phone;
				$address->office_phone 	= ($model->office_phone == '') ? NULL : $model->office_phone;
				$address->fax 		= ($model->fax == '') ? NULL : $model->fax;
                                
				if ($model->addressType=='primary' and $company->save(false))
				{
					$address->company_id = $company->company_id;
					$address->save(false);
					$this->redirect(array('customer/view?id='.$company->company_id));
				}
				else
				{
					$address->company_id = $_GET['id'];
					$address->save(false);
					$this->redirect(array('customer/view?id='.$_GET['id']));
				}
			}
		}

		$this->render('create',array( 'model'=>$model,));
	}
	public function actionIndex()
	{
		$model=new Company('search');
		//$model=new Company;
		// 下面三行决定筛选过滤功能
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Company']))
			$model->attributes=$_GET['Company'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionAdmin()
	{
	}
	// $name: province name
	public function actionDynamicCity($name)
	{
		$cM = City::model()->findByAttributes(array('name'=>$name));
		$pid = $cM->id;
		$model = City::model()->getCityList($pid);
		foreach($model as $value=>$name)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}
	}
}
