<?php
spl_autoload_unregister(array('YiiBase','autoload')); 
Yii::import('application.vendors.*');
require_once('Parsedown.php');
spl_autoload_register(array('YiiBase','autoload'));

class DemoController extends Controller
{
	public $layout='column1';

	public function actionJstree() {
	        $this->render('jstree');
	}
	public function actionOn() {
	        $this->render('on');
	}
	public function actionAjax() {
		header("Content-type: application/json");
		$d = array(
			'entity' => '<button class="a btn btn-primary">Go</button>',
		);
		echo json_encode($d);
	}
	public function actionMytabview() {
	        $this->render('mytabview');
	}

}
