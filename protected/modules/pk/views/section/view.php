<h4><i>
	<?php echo $model->source->name.' - '.implode(' - ', Section::nameList($model->id))?>
</i></h4>
<p>
	<?php echo CHtml::link($model->link,$model->link,array(
		'target' => '_blank',
	));?>
</p>

<?php $this->widget('bootstrap.widgets.Button', array(
	'buttonType'=>'link', 
	'type'=>'success', 
	'label'=>'Create Clip',
	'url' => Yii::app()->request->baseUrl.'/'. $this->module->id.'/clip/create?section_id='
		.$_GET['id'].'&redirect='.urlencode(Yii::app()->request->url),
	'htmlOptions'=> array(
		//'id' => 'submit',
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
<?php
	Yii::app()->clientScript->registerScriptFile(
		$this->module->assetsUrl.'/js/quick-add-clip-taxonomy.js',
		CClientScript::POS_END
	);
?>
