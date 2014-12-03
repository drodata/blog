<?php
/* @var $this CustomerController */
/* @var $model Company */

$this->breadcrumbs=array(
	'客户管理'=>array('/customer'),
);

$this->menu=array(
	array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Create Company', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('company-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>客户管理页面</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$model->searchCustomer(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'full_name',
			'type'=>'html',
			'value'=>'CHtml::link("$data->full_name",array("customer/view?id=$data->company_id"))',
		),
		'short_name',
		'c_time',
	),
)); ?>
