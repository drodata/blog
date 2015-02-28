<?php
spl_autoload_unregister(array('YiiBase','autoload')); 
Yii::import('application.vendors.*');
require_once('Parsedown.php');
spl_autoload_register(array('YiiBase','autoload'));

class SectionController extends Controller
{
	//public $layout = 'evernote';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Section::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Section;
		if(isset($_POST['ajax']) && $_POST['ajax']==='section-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		if(isset($_POST['Section']) )
		{
			$model->attributes=$_POST['Section'];
                
			if ( $model->validate()) {
				if ($model->save())
					$this->redirect(array('section/view',
						'id' => $model->id,
					));
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
		$model=new Section('search');
		$model->unsetAttributes();
		if(isset($_GET['Section']))
			$model->attributes=$_GET['Section'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * view all clip and quotations of a section
	 * in a single page.
	 */
	public function actionView()
	{
		$parsedown = new Parsedown();

		$criteria=new CDbCriteria;
		$criteria->with = array('scrap');
		$criteria->compare('scrap.section_id',$_GET['id']);
		$criteria->order = 'c_time DESC';

		foreach (array('Clip','Quotation') as $model)
		{
			$name = $model.'DataProvider';
			$$name = new CActiveDataProvider($model, array(
				'pagination'=>array(
					'pageSize'=>Yii::app()->params['postsPerPage'],
				),
				'criteria'=>$criteria,
			));
			$model = self::loadModel();
		}
		$this->render('view',array(
			'clipDataProvider'=>$ClipDataProvider,
			'quotationDataProvider'=>$QuotationDataProvider,
			'model' => $model,
			'parsedown' => $parsedown,
		));

	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['ajax']) && $_POST['ajax']==='section-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Section']))
		{
			$model->attributes=$_POST['Section'];
			if ( $model->validate()) {
				if ($model->update())
					$this->redirect('index');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	// ajax get source and section tree
	public function actionAjaxGetChildren() {
		header("Content-type: application/json");
		$d = array();

		// Initial State
		if ($_GET['id'] == '#') {
			$criteria = new CDbCriteria;
			$criteria->order = 'CONVERT(name USING gbk) ASC';
			$results = Source::model()->findAll($criteria);

			if ($results) {
				for ($i =0; $i < sizeof($results); $i++)
				{
					$d[$i] = array(
						'id' => 'source_'.$results[$i]['id'],
						'children' => true,
						'text' => $results[$i]['name'],
					);
				}
			}
		} else 
		{
			$type = explode('_',$_GET['id'])[0];
			$id = explode('_',$_GET['id'])[1];

			$criteria = new CDbCriteria;
			if ($type == 'source') {
				$criteria->compare('source_id', $id);
				$criteria->compare('parent', 0);
			} else {
				$criteria->compare('parent', $id);
			}
			$criteria->order = 'CONVERT(name USING gbk) ASC';
			$results = Section::model()->findAll($criteria);

			if ($results) {
				for ($i =0; $i < sizeof($results); $i++)
				{
					$children = Section::model()->findAllByAttributes(array( 'parent' => $results[$i]['id']));
					$hasChildren = sizeof($children) == 0 ? false : true;
					$d[$i] = array(
						'id' => 'section_'.$results[$i]['id'],
						'children' => $hasChildren,
						'text' => $results[$i]['name'],
					);
				}
			}
		}
		echo json_encode($d);
	}
}
