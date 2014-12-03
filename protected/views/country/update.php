<?php
/* @var $this CountryController */

$this->breadcrumbs=array(
	'Country'=>array('/country'),
	'Update',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
