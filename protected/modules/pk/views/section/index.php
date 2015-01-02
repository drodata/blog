<h1><code><?php echo $this->module->id . '/' . $this->id . '/' . $this->action->id; ?></code></h1>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create',
	'url' => Yii::app()->request->baseUrl.'/section/create',
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
		array(
			'name'=>'source_id',
			'value'=>'$data->source->name',
			'filter'=>Source::nameList(),
		),
		'parent',
		'position',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{clip} {vocabulary} {update} {delete}',
			'htmlOptions' => array(
				'style' => 'width:130px;',
			),
			'buttons'=>array(
				'clip'=>array(
					'label'=>'clip',
					'url'=>'Yii::app()->request->baseUrl."/pk/clip/view?section_id=".$data->id',
					'options'=>array(
						'class'=>'OrderUD',
						'data-action'=>'update',
					),
				),
				'vocabulary'=>array(
					'label'=>'words',
					'url'=>'Yii::app()->request->baseUrl."/pk/quotation/view?section_id=".$data->id',
				),
			),
		),
	),
)); 
?>
