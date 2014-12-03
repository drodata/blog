<?php
/* @var $this MotdController */

$this->breadcrumbs=array(
	'Motd'=>array('/motd'),
	'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<a href="/blog/motd/">MOTD首页</a>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
