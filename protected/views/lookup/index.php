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

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'button', 
	'type'=>'info', 
	'label'=>'Create in JUI Dialog',
	'htmlOptions'=> array(
		'id' => 'ajax-create-btn',
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
		'code',
		'type',
		'position',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); 
		$this->renderPartial('_CUDialog',array(
			'model'=>$model,
		));

		Yii::app()->clientScript->registerScript('auto','
			$("#ajax-create-btn").click(function(){
				$("#xxoo").dialog("open");
			});
			$("#lookup-cu-form").submit(function(e){
				e.preventDefault();
				//alert("good");
			});
		', CClientScript::POS_END);
?>
