<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php echo CHtml::link('View',array('user/view', 'id' => Yii::app()->user->id)); ?>
