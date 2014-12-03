<?php
/* @var $this CompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'Create Company', 'url'=>array('create')),
	array('label'=>'Manage Company', 'url'=>array('admin')),
);
?>

<h1>Companies</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'full_name',
		'short_name',
		array(
			'name'=>'category',
			'value'=>'Lookup::item("CompanyCategory",$data->category)',
			'filter'=>Lookup::items('CompanyCategory'),
			//'value'=>'City::getCityName($data->pid)',
			//'filter'=>City::getProvinceIdList(),
		),
		'c_time',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
	/*
	*/
)); ?>
