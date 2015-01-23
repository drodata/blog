<h2><i>
	<?php echo $model->source->name.' - '.implode(' - ', Section::nameList($model->id))?>
</i></h2>
<p>
	<?php echo CHtml::link($model->link,$model->link,array(
		'target' => '_blank',
	));?>
</p>


<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'success', 
	'label'=>'Create Clip',
	'url' => Yii::app()->request->baseUrl.'/'. $this->module->id.'/clip/create?section_id='.$_GET['id'],
	'htmlOptions'=> array(
		//'id' => 'submit',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'success', 
	'label'=>'Create Vocabulary',
	'url' => Yii::app()->request->baseUrl.'/'. $this->module->id.'/vocabulary/create?section_id='.$_GET['id'],
	'htmlOptions'=> array(
		'accesskey'=>'v',
	),
)); ?>

<div class="row">
	<div class="col-md-6">
		
		<?php 
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider'=>$clipDataProvider,
			'itemView'=>'/clip/_view',
			'viewData' => array(
				'parsedown' => $parsedown,
			),
			'template'=>"{items}\n{pager}",
		));
		?>
	</div>
	<div class="col-md-6">
		<?php 
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider'=>$quotationDataProvider,
			'itemView'=>'/quotation/_view',
			'viewData' => array(
				'parsedown' => $parsedown,
			),
			'template'=>"{items}\n{pager}",
		)); 
		?>
	</div>
</div>
