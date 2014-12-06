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

	public function actionAjaxTest()
	{
		header("Content-type: application/json");

		sleep(3);

		$d = array(
			'message' => 'reslts from Server via ajax',
		);

		echo json_encode($d);
	}

}
