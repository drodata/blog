<?php
class CreateAction extends CAction
{
	public function run()
	{
		$model=new CustomerForm;
		$model->scenario = 'mainland';


		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['CustomerForm']))
		{
			$model->attributes=$_POST['CustomerForm'];

			//!$model->scenario = ($model->type == 'mainland') ? 'mainland' : 'abroad';
			if ($model->type == 'abroad')
				$model->scenario = 'abroad';
			if($model->validate())
			{
				$company = new Company;
				$address = new Address;
                                
				$company->category 	= Company::CATEGORY_CUSTOMER;
				$company->full_name 	= $model->full_name;
				$company->short_name 	= $model->short_name;
				$company->site 		= ($model->site == '') ? NULL : $model->site;

				$address->country_id	= $model->country_id;
				$address->is_main	= 1;
				$address->province	= ($model->type == 'mainland') ? $model->province_cn : $model->province;
				$address->city 		= ($model->city == '') ? NULL : $model->city;
				$address->street 	= $model->street;
				$address->zip 		= ($model->zip == '') ? NULL : $model->zip;
				$address->contacter    	= $model->contacter;
				$address->duty 		= ($model->duty == '') ? NULL : $model->duty;
				$address->cell_phone   	= ($model->cell_phone == '') ? NULL : $model->cell_phone;
				$address->office_phone 	= ($model->office_phone == '') ? NULL : $model->office_phone;
				$address->fax 		= ($model->fax == '') ? NULL : $model->fax;
                                
				if ($company->save(false)) {
					$address->company_id = $company->id;
					$address->save(false);
					$this->redirect(array('customer/admin'));
				}
			}
		}

		$this->getController()->render('create',array( 'model'=>$model,));
		/**
		 * http://stackoverflow.com/questions/9563562/using-extends-caction-class-of-yii-framework
		 */
		//!$this->render('create',array( 'model'=>$model,));
	}
}
?>
