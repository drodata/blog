<?php
class AddAddresseAction extends CAction
{
	public function run()
	{
		$controller = $this->getController();
		//$controller->render('addaddress',array( 'model'=>$model,));
		$controller->render('addaddress');
		//!$this->render('create',array( 'model'=>$model,));
	}
}
?>
