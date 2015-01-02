<h1><code><?php echo $this->id . '/' . $this->action->id; ?></code></h1>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create',
	'url' => Yii::app()->request->baseUrl.'/taxonomy/create',
	'htmlOptions'=> array(
		//'id' => 'submit',
	),
)); ?>

<?php
$this->widget('bootstrap.widgets.GridView', array(
	'type' => array('striped', 'condensed'),
	'id'=>'taxonomy-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>0,
	'filter'=>$model,
	'columns'=>array(
		'name',
		'slug',
		array(
			'name'=>'category',
			'value'=>'$data->category',
			//'filter'=>Taxonomy::getCategoryFilterListData(),
		),
		'parent',
		'position',
		'note',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); 
?>
