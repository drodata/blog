<?php
/* @var $this MotdController */

$this->breadcrumbs=array(
	'Motd'=>array('/motd'),
	'Update',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
