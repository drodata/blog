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

}
