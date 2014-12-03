<?php

class AddressController extends Controller
{
	public $layout='//layouts/column2';
	public function actions()
	{
		return array(
'create' => 'application.controllers.customer2.address.CreateAction',
		);
	}
}
