<?php

class ExplanationController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Explanation::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionAjaxGetTaxonomy()
	{
		header("Content-type: application/json");
		$d = array();

		$results = Taxonomy::model()->findAllByAttributes(array(
			'category' => 'Explanation',
		));
		if ($results) {
			foreach ($results as $r) { 
				$d[] = $r->name;
			}
		}
		echo json_encode($d);
	}
	public function actionCreate()
	{
		$model=new Explanation;
		if (isset($_GET['vocabulary_id'])) {
			$model->vocabulary_id = $_GET['vocabulary_id'];
		}
		// create in scrap/view page
		$queryStrtingTail = isset($_GET['scrap_id']) ? '&scrap_id='.$_GET['scrap_id'] : '';

		$formTaxonomy = new FormTaxonomy;
		if(isset($_POST['Explanation']) )
		{
			$model->attributes=$_POST['Explanation'];
			$model->c_time = new CDbExpression('NOW()');
                
			if ( $model->validate()) {
				if ($model->save()) {
					// 1. store taxonomy
					Taxonomy::sv('Explanation',$_POST['FormTaxonomy']['taxonomy'], $model->id, 'create');
					// 2. redirect
					$this->redirect(Yii::app()->request->baseUrl.'/'.$this->module->id
						.'/quotation/create?explanation_id='.$model->id.$queryStrtingTail);
				}
			}
		}
		$this->render('create', array( 
			'model'=>$model,
			'formTaxonomy' => $formTaxonomy,
		));
	}

	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();
			Map::model()->deleteAllByAttributes(array(
				'f_id'=> $this->loadModel()->id,
				'category' => 'ExplanationTaxonomy',
			));

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionAdmin()
	{
		$model=new Explanation('search');
		$model->unsetAttributes();
		if(isset($_GET['Explanation']))
			$model->attributes=$_GET['Explanation'];
                
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'c_time DESC';

		$dataProvider=new CActiveDataProvider('Explanation', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		$formTaxonomy = new FormTaxonomy;
		$_a = array();
		foreach ($model->taxonomies as $t)
		{
			if (trim($t->name) != '')
				$_a[] = $t->name;
		}
		$formTaxonomy->taxonomy = implode(', ',$_a);
		if(isset($_POST['Explanation']))
		{
			$model->attributes=$_POST['Explanation'];
			if ( $model->validate()) {
				$model->update();
				Taxonomy::sv('Explanation',$_POST['FormTaxonomy']['taxonomy'], $model->id, 'update');
				$this->redirect(Yii::app()->request->baseUrl);
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'formTaxonomy' => $formTaxonomy,
		));
	}

}
