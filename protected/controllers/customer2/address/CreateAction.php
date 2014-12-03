<?php
class CreateAction extends CAction
{
	public function run($cid)
	{
		$controller = $this->getController();
		$controller->render('create');
	}
}
?>
