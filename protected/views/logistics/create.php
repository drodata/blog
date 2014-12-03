<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'物流公司'=>array('admin'),
	'创建',
);
?>

<h2>创建一个物流公司</h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
