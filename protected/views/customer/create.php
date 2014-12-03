<?php
$this->breadcrumbs=array(
	'新建客户',
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'Manage Member', 'url'=>array('admin')),
);
?>

<h1>创建新客户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

