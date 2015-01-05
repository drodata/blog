<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'xxoo',
	'options'=>array(
		'modal' => true,
		'title'=>'Create a Lookup Record',
		'autoOpen'=>false,
		'resizable'=>false,
		'width'=>'600',
		'hide'=>'fade',
		'show'=>'fade',
	),
));
?>

<?php $this->beginWidget('CMarkdown'); ?>
本窗口调用了`views/lookup/_cu.php`模块
<?php $this->endWidget('CMarkdown'); ?>

<?php echo $this->renderPartial('_cu', array('model' => $model));?>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
