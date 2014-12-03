<?php
class ViewAction extends CAction
{
	public function run($id)
	{
		$model=new CustomerForm; 
		$customerModel = Company::model()->findByPk($id);
		$model->full_name 	= $customerModel->full_name;
		$model->short_name 	= $customerModel->short_name;
		$model->site	 	= $customerModel->site;
		foreach ($customerModel->addresses as $a) {
			if ($a->is_main == 1) {
				$model->id 		= $id;
				$model->country_id 	= $a->country_id;
				$model->country_s 	= Country::model()->findByPk($a->country_id)->slug;
				$model->type 		= ($a->country_id == 47) ? 'mainland' : 'abroad';
				$model->province 	= $a->province;
				$model->city 		= $a->city;
				$model->street 		= $a->street;
				if ($a->country_id == 47) {
					$model->address_s 	= $a->province.$a->city.$a->street;
				} else {
					$list = array('street','city','province','country_s');
					foreach ($list as $i) {
						if ($i)
							$temp_a[] = $model[$i];
					}
					$model->address_s 	= implode(', ',$temp_a);
				}
				$model->zip 		= ($a->zip==NULL)?'':$a->zip;
				$model->contacter 	= $a->contacter;
				$model->duty 		= ($a->duty==NULL)?'':$a->duty;
				$model->cell_phone 	= ($a->cell_phone==NULL)?'':$a->cell_phone;
				$model->office_phone 	= ($a->office_phone==NULL)?'':$a->office_phone;
				$model->fax 		= ($a->fax==NULL)?'':$a->fax;
			}
		}

		$controller = $this->getController();
		$controller->render('view',array( 'model'=>$model,));
	}
}
?>
