<h1><code><?php echo $this->module->id . '/' . $this->id . '/' . $this->action->id; ?></code></h1>
<?php
$this->breadcrumbs=array(
	'Comments',
);
?>



<?php
$this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create',
	'url' => Yii::app()->request->baseUrl.'/'. $this->module->id.'/section/create',
	'htmlOptions'=> array(
		//'id' => 'submit',
	),
)); ?>

<?php

$this->widget('bootstrap.widgets.GridView', array(
	'type' => array('striped', 'condensed'),
	'id'=>'section-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>0,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'link',
		array(
			'name'=>'source_id',
			'value'=>'$data->source->name',
			'filter'=>Source::nameList(),
		),
		'parent',
		'position',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{scrap} {update} {delete}',
			'htmlOptions' => array(
				'style' => 'width:130px;',
			),
			'buttons'=>array(
				'scrap'=>array(
					'label'=>'scrap',
					'url'=>'Yii::app()->request->baseUrl."/pk/section/view?id=".$data->id',
					'options'=>array(
					),
				),
			),
		),
	),
)); 
?>
