<h1><code><?php echo $this->id . '/' . $this->action->id; ?></code></h1>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'primary', 
	'label'=>'Create',
	'url' => Yii::app()->request->baseUrl.'/'.$this->id.'/create',
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
		'name',
		array(
			'name'=>'language',
			'value'=>'Lookup::item("VocabularyLanguage", $data->language)',
			'filter'=>Lookup::items('VocabularyLanguage'),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); 
?>
