<?php

Yii::import('zii.widgets.CPortlet');

class TsMenu extends CPortlet
{
	public $title = '导航栏';
	protected function renderContent()
	{
		$this->render('TsMenu');
	}
}
