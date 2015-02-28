<?php

class CategoryController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Category::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Category;
		if(isset($_POST['ajax']) && $_POST['ajax']=== $this->id.'-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		if(isset($_POST['Category']) )
		{
			$model->attributes=$_POST['Category'];
                
			if ( $model->validate()) {
				if ($model->save())
					$this->redirect('index');
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
		$model=new Category('search');
		$model->unsetAttributes();
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];
                
		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['ajax']) && $_POST['ajax']=== $this->id.'-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if ( $model->validate()) {
				if ($model->update())
					$this->redirect('index');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAjaxGetChildren() 
	{
		header("Content-type: application/json");
		$d = array();
		$parent = $_GET['id'] == '#' ? 0 : explode('_',$_GET['id'])[1];
		$criteria = new CDbCriteria;
		$criteria->compare('parent',$parent);
		$criteria->order = 'CONVERT(name USING gbk) ASC';
		$results = Category::model()->findAll($criteria);

		if ($results) {
			$j = 0;
			if ($parent == 0)
			{
				$d[$j] = array(
					'id' => 'category_0',
					'text' => 'All Essays',
					'icon' => 'fa fa-folder',
				);
				$j++;
				
			}

			for ($i=$j; $i < sizeof($results); $i++)
			{
				$d[$i] = array(
					'id' => 'category_'.$results[$i]['id'],
					'text' => $results[$i]['name'],
					'icon' => 'fa fa-folder',
				);

				$children = Category::model()->findAllByAttributes(array('parent' => $results[$i]['id']));
				if ( sizeof($children) > 0 )
					$d[$i]['children'] = true;
			}
		}
		echo json_encode($d);
	}

}
