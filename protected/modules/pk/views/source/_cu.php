<div class="row">
	<div class="col-md-6">
<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=>'source-cu-form',
		'type'=>'horizontal',
		'enableAjaxValidation' => true,
	));
	?>

		<?php echo $form->textFieldRow($model,'name', array(
			'class'=>'form-control',
		)); ?> 
		<?php echo $form->textFieldRow($model,'author', array(
			'class'=>'form-control',
		)); ?> 
		<?php
		echo $form->dropDownListRow($model,'type',Lookup::items('SourceType'),array(
			'empty'=>'',
			'class'=>'form-control',
		));
		?>
		<?php echo $form->textFieldRow($model,'link', array(
			'class'=>'form-control',
		)); ?> 
		<?php echo $form->textAreaRow($model,'note', array(
			'class'=>'form-control',
			'rows' => 3,
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
