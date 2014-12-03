<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logistics-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span> 的项必须填写</p>

	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>40)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'duty'); ?>
		<?php echo $form->textField($model,'duty'); ?>
		<?php echo $form->error($model,'duty'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'contacter'); ?>
		<?php echo $form->textField($model,'contacter'); ?>
		<?php echo $form->error($model,'contacter'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cell_phone'); ?>
		<?php echo $form->textField($model,'cell_phone'); ?>
		<?php echo $form->error($model,'cell_phone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'office_phone'); ?>
		<?php echo $form->textField($model,'office_phone'); ?>
		<?php echo $form->error($model,'office_phone'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('保存'); ?>
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
