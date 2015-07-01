<?php
class BackController extends Controller
{
	public $layout='essay';
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionAjaxGetLabels()
	{
		header("Content-type: application/json");
		$d = array();

		$results = Label::model()->findAll();
		if ($results) {
			foreach ($results as $r) { $d[] = $r->name;
			}
		}
		echo json_encode($d);
	}
	public function actionAjaxUpdateListAndContainer()
	{
		header("Content-type: application/json");
		$d = array();
		$p = $_POST;

		$model=new EssayLabel;
		$args = array();
		if (isset($p['id'])) 
			$args['category_id'] = $p['id'];
		if (isset($p['label_name']))
			$args['label_name'] = $p['label_name'];
		if (isset($p['keyword']))
			$args['keyword'] = $p['keyword'];
		if (isset($p['ym']))
			$args['ym'] = $p['ym'];
		if (isset($p['page_number']))
			$args['offset'] = $p['page_number'] * Yii::app()->params['essayItemNumber'];

		$dataProvider = $model->getLists($args);
		$d['list'] = $this->renderPartial('category',array(
			'dataProvider'=> $dataProvider,
			'model' => $model,
		),true);

		if (isset($p['page_number'])) {
			// scroll search, append operation
			$d['pageNumber'] =  $p['page_number'] + 1;
		} else {
			// normal search, render the first essay
			$d['essayId'] = ($dataProvider->totalItemCount > 0) ? $dataProvider->data[0]->essay->id : null;
		}
		echo json_encode($d);
	}

	public function actionAjaxGetContent()
	{
		header("Content-type: application/json");
		$d = array();

		$criteria=new CDbCriteria;
		$criteria->alias = 'map';
		$criteria->with = array('essay');
		$criteria->limit = 1;
		$criteria->compare('map.essay_id',$_POST['id']);
		$essay = EssayLabel::model()->find( $criteria );

		$d['content'] = $this->renderPartial('_view',array(
			'data'=>$essay,
			'keyword' => $_POST['keyword'],
		), true);

		echo json_encode($d);
	}

	public function actionAjaxGetData()
	{
		header("Content-type: application/json");
		$p = $_POST;
		$d = array();

		$essay = Essay::model()->findByPk($p['id']);
		$d['items']['title'] = $essay->title;
		$d['items']['status'] = $essay->status;
		$d['items']['category'] = $essay->category_id;
		$d['items']['c_date'] = date('Y-m-d', strtotime($essay->c_time));
		$d['items']['label'] = Essay::getLabelString($p['id']);
		$d['items']['id'] = $p['id'];
		$d['items']['action'] = 'update';
		echo json_encode($d);
	}
	public function actionAjaxDelete()
	{
		header("Content-type: application/json");
		$p = $_POST;
		$d = array();

		Essay::model()->deleteByPk($p['id']);
		EssayLabel::model()->deleteAllByAttributes(array(
			'essay_id' => $p['id'],
		));
		echo json_encode($d);
	}

	public function actionAjaxCU()
	{
		header("Content-type: application/json");
		$p = $_POST;
		$d = array();

		if ($p['action'] == 'create') {


			$essay = new Essay;
			$essay->title = $p['title'];
			$essay->content = file_get_contents('/home/ts/www/blog/pad.php');
			$essay->status = $p['status'];
			$essay->category_id = $p['category'];
			$essay->is_lock = 1;
			$essay->c_time = $essay->m_time = $p['c_date'].' '.date('H:i:s');

			$essay->save();

			file_put_contents('/home/ts/www/blog/pad.php', '');

			$d['message'] = "saved.";
			$d['id'] = $essay->id;

		} else {
			// 0. update essay
			$essay = Essay::model()->findByPk($p['id']);
			$essay->title = $p['title'];
			$essay->status = $p['status'];
			$essay->category_id = $p['category'];
			$essay->c_time = $p['c_date'].' '.date('H:i:s', strtotime($essay->c_time));
			$essay->m_time = new CDbExpression('NOW()');
			$essay->update(array('title','category_id','status','c_time','m_time'));

			// 1. delete old label mapping records
			EssayLabel::model()->deleteAllByAttributes(array(
				'essay_id'=> $p['id'],
			));
			$d['message'] = "updated.";
			$d['id'] = $p['id'];
		}
		// save label
		$labels = explode(',',$p['label']);
		if ($labels) {
			foreach ($labels as $lb) {
				$lb = trim($lb);	

				$label = Label::model()->findByAttributes(array('name'=>$lb));

				if (!$label) {
					$label = new Label;
					$label->name = $lb;
					$label->save();
				}
				$el = new EssayLabel;
				$el->essay_id = $essay->id;
				$el->label_id = $label->id;
				$el->save();
			}
		}

		echo json_encode($d);
	}

	public function actionAjaxEditContent()
	{
		header("Content-type: application/json");
		$p = $_POST;
		$d = array();

		$active_essay = Essay::model()->findByAttributes(array(
			'is_lock' => 0,
		));
		if ($active_essay) {
			$d['message'] = "有文章的修改尚未保存，ID为".$active_essay->id;
			$d['status'] = false;
			$d['position'] = 6;
			$d['style'] = 'red';
		} else {
			if ( file_get_contents('/home/ts/www/blog/pad.php') != '' ) {
				$d['message'] = "pad 内容不为空，请先清空pad内容";
				$d['status'] = false;
				$d['position'] = 6;
				$d['style'] = 'red';
			} else {
				$essay = Essay::model()->findByPk( $p['id'] );
				if ( file_put_contents('/home/ts/www/blog/pad.php', $essay->content) ) {
                
					$essay->is_lock = 0;
					$essay->m_time = new CDbExpression('NOW()');
					$essay->update(array('is_lock', 'm_time'));
                
					$d['message'] = "&radic; 写入成功";
					$d['status'] = true;
					$d['style'] = 'green';
				} else {
					$d['message'] = "&radic; 写入失败";
					$d['status'] = false;
				}
			}
		}

		echo json_encode($d);
	}
	public function actionAjaxUpdateContent()
	{
		header("Content-type: application/json");
		$p = $_POST;
		$d = array();

		$essay = Essay::model()->findByPk($p['id']);
		if ($essay->is_lock) {
			$d['message'] = "此文尚未 unlock, 禁止保存";
			$d['status'] = false;
			$d['style'] = 'red';
		} else {
			$essay->content = file_get_contents('/home/ts/www/blog/pad.php');
			if ( $essay->update(array('content')) ) {
				file_put_contents('/home/ts/www/blog/pad.php', '');

				$essay->is_lock = 1;
				$essay->update(array('is_lock'));

				$d['message'] = "主内容已保存";
				$d['status'] = true;
				$d['style'] = 'green';
			} else {
				$d['message'] = "主内容保存失败";
				$d['status'] = false;
				$d['style'] = 'red';
			}
		}

		echo json_encode($d);
	}
	public function actionView()
	{
		if(isset($_GET['id']))
		{
			$criteria=new CDbCriteria;
			$criteria->alias = 'map';
			$criteria->with = array('essay');
			$criteria->limit = 1;
			$criteria->compare('map.essay_id',$_GET['id']);
			$essay = EssayLabel::model()->find( $criteria );

			$this->render('view',array(
				'model'=>$essay,
			));
		}
	}
	public function actionIndex()
	{
		$model=new EssayLabel('search');
		$model->unsetAttributes(); 
		if(isset($_GET['EssayLabel']))
			$model->attributes=$_GET['EssayLabel'];

		$this->render('category',array(
			'dataProvider'=>$model->search(),
			'model' => $model,
		));
	}

	public function actionCategory() {

		$criteria=new CDbCriteria;
		$criteria->alias = 'map';
		$criteria->with = array('essay');
		$criteria->group = 'map.essay_id';
		$criteria->order = 'essay.c_time DESC';
		if(isset($_GET['slug'])) {
			$category = Category::model()->findByAttributes(array(
				'slug' => $_GET['slug'],
			));
			$criteria->compare('essay.category_id', $category->id);
		}
		$dataProvider=new CActiveDataProvider('EssayLabel', array(
			'pagination'=>array(
				'pageSize'=> 10,
			),
			'criteria'=>$criteria,
		));

		$render = 'category';

		$this->render($render,array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionLabel()
	{
		$criteria=new CDbCriteria;
		$criteria->alias = 'map';
		$criteria->with = array('essay', 'label');
		$criteria->order = 'essay.c_time DESC';
		if(isset($_GET['name']))
			$criteria->compare('label.name', $_GET['name']);
		$dataProvider=new CActiveDataProvider('EssayLabel', array(
			'pagination'=>array(
				'pageSize'=> 10,
			),
			'criteria'=>$criteria,
		));

		$this->render('category',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$criteria=new CDbCriteria;
				$criteria->alias = 'map';
				$criteria->with = array('essay');
				$criteria->compare('map.essay_id',$_GET['id']);
				$this->_model=EssayCategory::model()->find($criteria);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	public function actionCreate()
	{
		$model=new FormEssay;
		if(isset($_POST['FormEssay']) )
		{
			$model->attributes=$_POST['FormEssay'];
			$model->validate();
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
}
