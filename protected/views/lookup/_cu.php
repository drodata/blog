<?php $form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
	'id'=>$this->id.'-cu-form',
	'type'=>'horizontal',
	'enableAjaxValidation' => true,
)); ?> 
	<?php echo $form->textFieldRow($model,'name', array()); ?> 
	<?php echo $form->textFieldRow($model,'code', array()); ?> 
	<?php echo $form->textFieldRow($model,'type', array()); ?> 
	<?php echo $form->textFieldRow($model,'position', array()); ?> 

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

<?php $this->endWidget('bootstrap.widgets.ActiveForm'); ?>
