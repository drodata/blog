<?php

Yii::import('zii.widgets.CPortlet');

class UnpaidOrders extends CPortlet
{
	public $title = 'Calendar';
	protected function renderContent()
	{
		$this->render('CalendarMenu');
	}
}


