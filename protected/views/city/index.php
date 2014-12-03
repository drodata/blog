<?php
/* @var $this CityController */

$this->breadcrumbs=array(
	'City',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<hr>
<?php echo CHtml::link('新建城市',array('city/create')); ?>
<hr>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'pid',
			'value'=>'City::getCityName($data->pid)',
			'filter'=>City::getProvinceIdList(),
		),
		'name',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
