<?php
/* @var $this CityController */

$this->breadcrumbs=array(
	'City'=>array('/city'),
	'Update',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
