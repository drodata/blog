<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'essay_id',
		array(
			'name'=>'title',
			'value'=>'$data->essay->title',
		),
		'category',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

