<?php

Yii::import('zii.widgets.CPortlet');

class CustomerMenu extends CPortlet
{
	public $title = '客户管理';
	protected function renderContent()
	{
		$this->render('CustomerMenu');
	}
}
