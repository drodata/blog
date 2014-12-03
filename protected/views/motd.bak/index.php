<?php
/* @var $this MotdController */

$this->breadcrumbs=array(
	'Motd',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<a href="/blog/motd/create">新建</a>
<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
