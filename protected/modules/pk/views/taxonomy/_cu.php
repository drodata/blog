<div class="row">
	<div class="col-md-6">
<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=>'taxonomy-cu-form',
		'type'=>'horizontal',
		'enableAjaxValidation' => true,
	));
	?>

		<?php echo $form->textFieldRow($model,'name', array(
		)); ?> 
		<?php echo $form->textFieldRow($model,'slug', array(
		)); ?> 
		<?php echo $form->textFieldRow($model,'category', array(
		)); ?> 
		<?php echo $form->textFieldRow($model,'parent', array(
		)); ?> 
		<?php echo $form->textFieldRow($model,'position', array(
		)); ?> 
		<?php echo $form->textAreaRow($model,'note', array(
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
