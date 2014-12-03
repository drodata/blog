<?php
/* @var $this ContinentController */

$this->breadcrumbs=array(
	'Continent'=>array('/continent'),
	'Update',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
