<div class="row">
	<div class="col-md-6">
<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=>$this->id.'-cu-form',
		'type'=>'horizontal',
	));
	?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'explanation_id', array(
				'class' => 'col-sm-2 control-label',
			)); ?>
			<div class="col-sm-10">
				<?php echo Chosen::activeDropDownList($model,'explanation_id',Explanation::explanationsList(),array(
					'empty'=>'',
					'class'=>'form-control',
					'tabindex' => 1,
					'options' => array(
						'searchContains' => true,
					),
				)); ?>
			</div>
		</div>
		<?php echo $form->textAreaRow($model,'note', array(
			'rows' => 5,
			'class'=>'form-control',
			'tabindex' => 2,
		)); ?> 
		<?php echo $form->textFieldRow($model,'scrap_id', array(
			'class'=>'form-control',
			'tabindex' => 3,
		)); ?> 

		<div class="form-actions form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<?php $this->widget('bootstrap.widgets.Button', array(
					'buttonType'=> 'submit',
					'type'=>'success', 
					'label'=> $model->isNewRecord ? 'Create' : 'Save Update', 
					'htmlOptions'=> array(
					),
				)); ?>
				<?php $this->widget('bootstrap.widgets.Button', array(
					'buttonType'=>'reset', 
					'type'=>'default', 
					'label'=>'Reset',
					'htmlOptions'=> array(
					),
				)); ?>
                                
			</div>
		</div>

	<?php $this->endWidget(); ?>
	</div>

	<div class="col-md-6">
	</div>
</div>
	<?php
	/*
	Yii::app()->clientScript->registerScriptFile(
		Yii::app()->baseUrl.'/js/section.js',
		CClientScript::POS_END
	);
	*/
	?>
