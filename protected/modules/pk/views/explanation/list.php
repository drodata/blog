<?php

$this->widget('bootstrap.widgets.GridView', array(
	'type' => array(),
	'id'=>'section-grid',
	'dataProvider'=>$model->searchList(),
	'selectableRows'=>0,
	//'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'c_time',
			'value'=>'date("y-n-j",strtotime($data->c_time))',
			'htmlOptions' => array(
				'style' => 'width:90px',
			),
		),
		array(
			'name'=>'vocabulary_id',
			'value'=>'$data->vocabulary->name',
		),
		'example',
	),
)); 
?>
