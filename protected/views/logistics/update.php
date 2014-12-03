<?php
/* @var $this LogisticsController */
/* @var $model Address */

$this->breadcrumbs=array(
	'物流公司'=>array('admin'),
	'修改',
);

$this->menu=array(
	array('label'=>'List Address', 'url'=>array('index')),
	array('label'=>'Create Address', 'url'=>array('create')),
	array('label'=>'View Address', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Address', 'url'=>array('admin')),
);
?>

<h1>Update Address <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
