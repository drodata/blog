<?php

class SectionController extends Controller
{
	public $layout = 'column1';
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
		$model=new Section('search');
		$model->unsetAttributes();
		if(isset($_GET['Section']))
			$model->attributes=$_GET['Section'];
                
		$this->render('index',array(
			'model'=>$model,
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
		if ($_GET['id'] == '#') {
			$criteria = new CDbCriteria;
			$criteria->order = 'CONVERT(name USING gbk) ASC';
			$results = Source::model()->findAll($criteria);
			$opt = '';
			if ($results) {
				$opt .= '<ul>';
				foreach ($results as $r) {
					$opt .= '<li id="source_'.$r->id.'" class="jstree-closed">'.$r->name.'</li>';
				}
				$opt .= '</ul>';
			}
		} else {
			$type = explode('_',$_GET['id'])[0];
			$id = explode('_',$_GET['id'])[1];
			if ($type == 'source') {
				$criteria = new CDbCriteria;
				$criteria->compare('source_id', $id);
				$criteria->compare('parent', 0);
				$criteria->order = 'CONVERT(name USING gbk) ASC';
				$results = Section::model()->findAll($criteria);
				$opt = '';
				if ($results) {
					$opt .= '<ul>';
					foreach ($results as $r) {
						$children = Section::model()->findAllByAttributes(array(
							'parent' => $r->id,
						));
						$class = sizeof($children) == 0 ? '' : 'jstree-closed';
						$opt .= '<li id="section_'.$r->id.'" class="'.$class.'">'.$r->name.'</li>';
					}
					$opt .= '</ul>';
				}
			} else {
				$criteria = new CDbCriteria;
				$criteria->compare('parent', $id);
				$criteria->order = 'CONVERT(name USING gbk) ASC';
				$results = Section::model()->findAll($criteria);
				$opt = '';
				if ($results) {
					$opt .= '<ul>';
					foreach ($results as $r) {
						$children = Section::model()->findAllByAttributes(array(
							'parent' => $r->id,
						));
						$class = sizeof($children) == 0 ? '' : 'jstree-closed';
						$opt .= '<li id="section_'.$r->id.'" class="'.$class.'">'.$r->name.'</li>';
					}
					$opt .= '</ul>';
				}
			}
		}

		echo $opt;
	}

}
