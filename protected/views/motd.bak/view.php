<?php
/* @var $this MotdController */
/* @var $model Motd */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->id,
);

?>

<h1>View Company #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'category',
		'time',
		'm_time',
	),
)); ?>

