<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span> 的项必须填写</p>

	<input type='hidden' name='createType' >
	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>40)); ?>
		<?php echo $form->error($model,'full_name'); ?>
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
	<div class="row">
		<?php echo $form->labelEx($model,'bank_name'); ?>
		<?php echo $form->textField($model,'bank_name'); ?>
		<?php echo $form->error($model,'bank_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'account_name'); ?>
		<?php echo $form->textField($model,'account_name'); ?>
		<?php echo $form->error($model,'account_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'account_number'); ?>
		<?php echo $form->textField($model,'account_number'); ?>
		<?php echo $form->error($model,'account_number'); ?>
	</div>
	<div class="row" id="typeD">
		<?php echo $form->labelEx($model,'type'); ?>
		<div class="radioR">
		<?php echo $form->radioButtonList(
			$model,
			'type',
			array('company'=>'公司帐户','personal'=>'个人帐户','misc'=>'其它')
			,array(
				'template'=>'{input} {label}',
				'separator'=>'  ',
				'labelOptions'=>array('style'=>'display:inline')
			)
			); ?>
		</div>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<div class="row" id="companyBankTypeD">
		<?php echo $form->labelEx($model,'company_bank_type'); ?>
		<div class="radioR">
		<?php echo $form->radioButtonList(
			$model,
			'company_bank_type',
			array('basic'=>'基本户','common'=>'一般户')
			,array(
				'template'=>'{input} {label}',
				'separator'=>'  ',
				'labelOptions'=>array('style'=>'display:inline')
			)
			); ?>
		</div>
		<?php echo $form->error($model,'company_bank_type'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('保存'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<?php
Yii::app()->clientScript->registerCoreScript('jquery');

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl.'/js/supplier.js',
	CClientScript::POS_END
);
?>

