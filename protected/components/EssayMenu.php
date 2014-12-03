<?php

Yii::import('zii.widgets.CPortlet');

class EssayMenu extends CPortlet
{
	public $title = 'Essay Menu';
	protected function renderContent()
	{
		$this->render('EssayMenu');
	}
}
