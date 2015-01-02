<?php

class FolderController extends Controller
{
	public $layout = 'column1';
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=Folder::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionCreate()
	{
		$model=new Folder;
		if(isset($_POST['ajax']) && $_POST['ajax']=== $this->id.'-cu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		if(isset($_POST['Folder']) )
		{
			$model->attributes=$_POST['Folder'];
                
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
		$model=new Folder('search');
		$model->unsetAttributes();
		if(isset($_GET['Folder']))
			$model->attributes=$_GET['Folder'];
                
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
		if(isset($_POST['Folder']))
		{
			$model->attributes=$_POST['Folder'];
			if ( $model->validate()) {
				if ($model->update())
					$this->redirect('index');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAjaxGetChildren() {
		if ($_GET['id'] == '#') {
			$parent = 0;
		} else {
			$parent = explode('_',$_GET['id'])[1];
		}

		$criteria = new CDbCriteria;
		$criteria->compare('parent',$parent);
		$criteria->order = 'CONVERT(name USING gbk) ASC';
		$results = Folder::model()->findAll($criteria);
		$opt = '';
		if ($results) {
			$opt .= '<ul>';
			foreach ($results as $r) {
				$children = Folder::model()->findAllByAttributes(array('parent' => $r->id));
				$class = sizeof($children) == 0 ? '' : 'jstree-closed';
				$opt .= '<li id="folder_'.$r->id.'" class="'.$class.'">'.$r->name.'</li>';
			}
			$opt .= '</ul>';
		}
		echo $opt;
	}

}
