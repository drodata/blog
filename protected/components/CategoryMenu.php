<?php

Yii::import('zii.widgets.CPortlet');

class CategoryMenu extends CPortlet
{
	public $title = 'Essay Category';
	protected function renderContent()
	{
		$this->render('CategoryMenu');
	}
}

