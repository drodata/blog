<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'continent_id'); ?>
		<?php echo $form->dropDownList(
			$model,'continent_id',Continent::getContinentIdList(),
			array(
				'prompt'=>'== 请选择 ==',
			)); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug'); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cn_slug'); ?>
		<?php echo $form->textField($model,'cn_slug'); ?>
		<?php echo $form->error($model,'cn_slug'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'iso3'); ?>
		<?php echo $form->textField($model,'iso3'); ?>
		<?php echo $form->error($model,'iso3'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number'); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


