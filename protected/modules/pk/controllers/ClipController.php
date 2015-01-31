<?php
spl_autoload_unregister(array('YiiBase','autoload')); 
Yii::import('application.vendors.*');
require_once('Parsedown.php');
spl_autoload_register(array('YiiBase','autoload'));

class ClipController extends Controller
{
	public $layout = 'column1';
	private $_model;
	private $_redirectUrl;
	public function loadRedirectUrl()
	{
		if($this->_redirectUrl===null)
		{
			if(isset($_GET['redirect']))
			{
				$this->_redirectUrl = $_GET['redirect'];
			}
		}
		return $this->_redirectUrl;
	}
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Clip::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	/**
	 * $_GET['section_id'] is required
	 */
	public function actionCreate()
	{
		$modelClip=new Clip;
		$modelScrap=new Scrap;
		$formTaxonomy = new FormTaxonomy;
		if(isset($_POST['Clip']) )
		{
			$modelScrap->attributes=$_POST['Scrap'];
			$modelScrap->section_id=$_GET['section_id'];
			$modelScrap->save();

			$modelClip->attributes=$_POST['Clip'];
			$modelClip->scrap_id = $modelScrap->id;
			$modelClip->c_time = new CDbExpression('NOW()');
			if ($modelClip->save())
			{
				// 1. store taxonomy
				Taxonomy::sv('Clip',$_POST['FormTaxonomy']['taxonomy'], $modelClip->id, 'create');
				// 2. redirect
				$this->redirect( $this->loadRedirectUrl() );
			}
		}
		$this->render('create', array( 
			'modelClip'=>$modelClip,
			'modelScrap'=>$modelScrap,
			'formTaxonomy' => $formTaxonomy,
		));
	}
	public function actionUpdate()
	{
		$modelClip=$this->loadModel();
		$modelScrap = $modelClip->scrap;
		$formTaxonomy = new FormTaxonomy;
		$_a = array();
		foreach ($modelClip->taxonomies as $t)
		{
			if (trim($t->name) != '')
				$_a[] = $t->name;
		}
		$formTaxonomy->taxonomy = implode(', ',$_a);
		if(isset($_POST['Clip']))
		{
			$modelScrap->attributes=$_POST['Scrap'];
			$modelClip->attributes=$_POST['Clip'];
			if ( $modelScrap->validate()) 
			{
				$modelScrap->update();
				$modelClip->update();
				Taxonomy::sv('Clip',$_POST['FormTaxonomy']['taxonomy'], $modelClip->id, 'update');
				$this->redirect( $this->loadRedirectUrl() );
			}
		}

		$this->render('update',array(
			'modelClip'=>$modelClip,
			'modelScrap'=>$modelScrap,
			'formTaxonomy' => $formTaxonomy,
		));
	}

	public function actionDelete()
	{
		$model = $this->loadModel();
		Map::model()->deleteAllByAttributes(array(
			'f_id'=> $model->id,
			'category' => 'ClipTaxonomy',
		));
		$model->delete();
		$this->redirect( $this->loadRedirectUrl() );
	}


	public function actionAjaxGetTaxonomy()
	{
		header("Content-type: application/json");
		$d = array();

		$results = Taxonomy::model()->findAllByAttributes(array(
			'category' => 'Clip',
		));
		if ($results) {
			foreach ($results as $r) { 
				$d[] = $r->name;
			}
		}
		echo json_encode($d);
	}

	public function actionIndex()
	{
		$model=new Clip('search');
		$model->unsetAttributes();
		if(isset($_GET['Clip']))
			$model->attributes=$_GET['Clip'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionView()
	{
		$parsedown = new Parsedown();

		$criteria=new CDbCriteria;
		if (isset($_GET['section_id']))
			$criteria->compare('section_id',$_GET['section_id']);
		$criteria->order = 'c_time DESC';

		$dataProvider=new CActiveDataProvider('Clip', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('view',array(
			'dataProvider'=>$dataProvider,
			'parsedown' => $parsedown,
		));

	}

	public function actionAjaxSearch() {
		header("Content-type: application/json");
		$d = array();
		$p = $_POST;

		$criteria = new CDbCriteria;
		if (isset($p['section']))
			$criteria->compare('section_id', $p['section']);
		$criteria->order = 'c_time DESC';
		$results = Clip::model()->findAll($criteria);

		if (sizeof($results) > 0) {
			$content = $results[0];
			$d['slice'] = '';
			foreach ($results as $r) {
				$d['slice'] .= '<div class="col-sm-12">';
				$d['slice'] .= '<h4>'.$r->title.'</h4>';
				$d['slice'] .= '</div>';
			}
			$d['content'] = $content->c_time;
		} else {
			$d['slice'] = '<p>no results</p>';
			$d['content'] = '<p>no results</p>';
		}
		echo json_encode($d);
	}
	public function actionAjaxQuickAddTaxonomy() {
		header("Content-type: application/json");
		$d = array();

		$taxo = Taxonomy::model()->findByAttributes(array(
			'category' => 'Clip',
			'name' => trim($_POST['name']),
		));
		if (!isset($taxo)) 
		{
			$taxo = new Taxonomy;
			$taxo->name = trim($_POST['name']);
			$taxo->category = 'Clip';
			$taxo->save();
		}
		$map = new Map;
		$map->f_id = $_POST['id'];
		$map->t_id = $taxo->id;
		$map->category = 'ClipTaxonomy';
		$map->save();
		$d['redirectUrl'] = Yii::app()->request->baseUrl.'/'.$this->module->id;
		$d['new'] = Clip::taxonomyString($_POST['id']);
		echo json_encode($d);
	}

}
