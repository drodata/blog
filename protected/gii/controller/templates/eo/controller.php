<?php
/**
 * This is the template for generating a controller class file.
 * The following variables are available in this template:
 * - $this: the ControllerCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
	//public $layout='column2';
	public $widget;
	private $_model;
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				$this->_model=XXX::model()->findByPk($_GET['id']);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function filters()
	{
		return array(
			//array('ext.filter.login.LoginFilter',),
			//'accessControl',
		);
	}
	public function accessRules()
	{
		return array(
			/*
			array('allow',
				'actions'=>array( 'a', 'b' ),
				'roles' => array('saler', 'productionDirector'),
			),
			array('deny')
			*/
		);
	}
<?php foreach($this->getActionIDs() as $action): ?>
	public function action<?php echo ucfirst($action); ?>()
	{
		$this->render('<?php echo $action; ?>');
	}

<?php endforeach; ?>
	// Usefull snippet
	/*
		if (isset($_POST['FormCash']))
		{
			$model->attributes = $_POST['FormCash'];
			if ($model->validate())
			{
				$transaction = Yii::app()->db->beginTransaction();
				try {
					if (!$voucher->save())
						throw new Exception('Voucher cannot be saved.');
					$transaction->commit();
					Yii::app()->user->setFlash('success',"退款申请提交成功");
					$this->redirect(array('expense/mine'));
				} catch (Exception $e) {
					$transaction->rollback();
					Yii::app()->user->setFlash('danger',$e->getMessage());
				}
			}
		}
	*/
}
