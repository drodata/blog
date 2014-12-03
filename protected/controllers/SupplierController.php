<?php

class SupplierController extends Controller
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

	public function actionIndex()
	{
		$model=new Address('search');

		// 下面三行决定筛选过滤功能
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Address']))
			$model->attributes=$_GET['Address'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model = new SupplierForm;

		$model->createType = ($_GET['type']) ? 'bank' : 'supplier';
		if(isset($_POST['ajax']) && $_POST['ajax']==='supplier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['SupplierForm']))
		{
			$model->attributes=$_POST['SupplierForm'];

			if($model->validate())
			{
				if ($model->createType=='supplier')
				{
					$company = new Company;
					$company->category 	= Company::CATEGORY_SUPPLIER;
					$company->full_name 	= $model->full_name;
				}

				$address = new Address;
				$bank = new Bank;

				$address->is_main	= 1;
				$address->contacter    	= $model->contacter;
				$address->cell_phone   	= ($model->cell_phone == '') ? NULL : $model->cell_phone;
				$address->office_phone 	= ($model->office_phone == '') ? NULL : $model->office_phone;

				$bank->bank_name    	= $model->bank_name;
				$bank->account_name   	= $model->account_name;
				$bank->account_number   = $model->account_number;
				$bank->type    		= $model->type;
				$bank->company_bank_type= ($model->company_bank_type=='') ? NULL : $model->company_bank_type;
                                
				if ($model->createType=='supplier' and $company->save(false))
				{
					$address->company_id = $company->company_id;
					$bank->company_id = $company->company_id;
					$address->save(false);
					$bank->save(false);
					$this->redirect(array('supplier/view?id='.$company->company_id));
				}
				else
				{
					$address->company_id = $_GET['company_id'];
					$bank->company_id = $_GET['company_id'];
					$address->save(false);
					$bank->save(false);
					$this->redirect(array('supplier/view?id='.$_GET['company_id']));
				}
			}
		}
		$this->render('create',array( 'model'=>$model,));
	}

	public function actionView()
	{
		$model = Address::getSupplierData($_GET['id']);
		$this->render('view',array( 'model'=>$model,));
	}
}

?>
