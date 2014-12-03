<?php
/* @var $this CountryController */

$this->breadcrumbs=array(
	'Country',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'slug',
		'iso3',
		//'continent.cn_name',
		array(
			'name'=>'continent_name',
			'value'=>'$data->continent->name',
			'filter'=>Continent::getContinentList(),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
