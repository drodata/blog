<?php
spl_autoload_unregister(array('YiiBase','autoload')); 
Yii::import('application.vendors.*');
require_once('Parsedown.php');
spl_autoload_register(array('YiiBase','autoload'));
class VocabularyController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Vocabulary::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Vocabulary;
		if(isset($_POST['Vocabulary']) )
		{
			$model->attributes=$_POST['Vocabulary'];
                
			if ( $model->validate()) {
				if ($model->save())
					$this->redirect(Yii::app()->request->baseUrl.'/'.$this->module->id
						.'/explanation/create?vocabulary_id='.$model->id);
			}
		}
		$this->render('create', array( 'model'=>$model,));
	}

	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionIndex()
	{
		$this->render('index',array(
		));
	}
	public function actionAdmin()
	{
		$model=new Vocabulary('search');
		$model->unsetAttributes();
		if(isset($_GET['Vocabulary']))
			$model->attributes=$_GET['Vocabulary'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['ajax']) && $_POST['ajax']==='vocabulary-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Vocabulary']))
		{
			$model->attributes=$_POST['Vocabulary'];
			if ( $model->validate()) {
				if ($model->update())
					$this->redirect('index');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionAjaxGetList()
	{
		header("Content-type: application/json");
		$d = array();

		$results = Vocabulary::model()->findAllByAttributes(array(
			'language' => Vocabulary::LANGUAGE_ENGLISH,
		));
		if ($results) {
			foreach ($results as $r) { 
				$d[] = $r->name;
			}
		}
		echo json_encode($d);
	}
	public function actionAjaxSearch()
	{
		header("Content-type: application/json");
		$d = array();
		$parsedown = new Parsedown();

		$vocabulary = Vocabulary::model()->findByAttributes(array(
			'name' => $_POST['name'],
		));
		$d['title'] = $this->renderPartial('_title',array(
			'vocabulary' => $vocabulary,
		),true);
		$d['result'] = $this->renderPartial('_view',array(
			'vocabulary' => $vocabulary,
			'parsedown' => $parsedown,
		),true);
		echo json_encode($d);
	}

}
