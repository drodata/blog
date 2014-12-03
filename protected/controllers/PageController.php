<?php

class PageController extends Controller
{
	public $layout='page';

	public function actionView()
	{
		if(isset($_GET['name'])) {
			$this->render($_GET['name']);
		}
	}

}
