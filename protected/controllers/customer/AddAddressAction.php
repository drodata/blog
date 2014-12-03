<?php
class AddAddressAction extends CAction
{
	public function run($cid)
	{
		$controller = $this->getController();
		//$controller->render('addaddress',array( 'model'=>$model,));
		$controller->render('addaddress');
		//!$this->render('create',array( 'model'=>$model,));
	}
}
?>
