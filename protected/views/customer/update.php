<?php
/* @var $this CustomerController */
/* @var $model CustomerForm */

$this->breadcrumbs=array(
	'物流公司'=>array('admin'),
	'修改主地址',
);

?>

<h1>Update Address</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

