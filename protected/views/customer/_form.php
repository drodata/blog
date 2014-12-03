<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<input id='addressType' type='hidden' name='address_type' value='<?php echo $model->addressType;?>'>

	<p class="note">标记 <span class="required">*</span> 的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

<div class='companyD'>
	<div class="row">
		<?php echo $form->labelEx($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'short_name'); ?>
		<?php echo $form->textField($model,'short_name'); ?>
		<?php echo $form->error($model,'short_name'); ?>
	</div>
</div>

	<div class="row" id="typeRow">
		<?php echo $form->labelEx($model,'type'); ?>
		<div class="radioR">
		<?php echo $form->radioButtonList(
			$model,
			'type',
			array('mainland'=>'国内客户','abroad'=>'国外客户')
			,array(
				'template'=>'{input} {label}',
				'separator'=>'  ',
				'labelOptions'=>array('style'=>'display:inline')
			)
			); ?>
		</div>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<div class="row" id="countryD">
	<?php
		echo $form->labelEx($model,'country_id');
		echo $form->dropDownList($model,'country_id',Country::getCountryList(),array(
			'empty'=>'-请选择-',
		));
		echo $form->error($model,'country_id');
	?>
	</div>

<div id="provCityMl">
	<div class="row">
	<?php 
		echo $form->labelEx($model,'province_ml');
		echo $form->dropDownList($model,'province_ml',City::getProvinceList(),array(
			'empty'=>'-请选择-',
			'ajax'=>array(
				'url'=>Yii::app()->createUrl('customer/dynamicCity'),
				'data'=>array('name'=>'js:this.value'),
				'update'=>'#CustomerForm_city_ml',
				//'update'=>'#kk',
			),
		));
		echo $form->error($model,'province_ml');
	?>
	</div>

	<div class="row">
	<?php 
		// If update a mainland customer
		$cM = City::model()->findByAttributes(array('name'=>$model->province_ml));
		$pid = $cM->id;

		echo $form->labelEx($model,'city_ml');
		echo $form->dropDownList($model,'city_ml',City::getCityList($pid),array('empty'=>'-请选择-'));
		echo $form->error($model,'city_ml');
	?>
	</div>
</div>
<div id="provCityAb">
	<div class="row">
		<?php
		echo $form->labelEx($model,'province_ab');
		echo $form->textField($model,'province_ab',array('size'=>20));
		echo $form->error($model,'province_ab');
		?>
	</div>
	<div class="row">
		<?php
		echo $form->labelEx($model,'city_ab');
		echo $form->textField($model,'city_ab',array('size'=>20));
		echo $form->error($model,'city_ab');
		?>
	</div>
</div>
	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo CHtml::activeTextArea($model,'street',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'contacter'); ?>
		<?php echo $form->textField($model,'contacter'); ?>
		<?php echo $form->error($model,'contacter'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'duty'); ?>
		<?php echo $form->textField($model,'duty'); ?>
		<?php echo $form->error($model,'duty'); ?>
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
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax'); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>
<div class='companyD'>
	<div class="row">
		<?php echo $form->labelEx($model,'site'); ?>
		<?php echo $form->textField($model,'site'); ?>
		<?php echo $form->error($model,'site'); ?>
	</div>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$fn = ($model->action=='update') ? 'customer_update.js' : 'customer_create.js';
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl.'/js/'.$fn,
	CClientScript::POS_END
);
?>
<div class="hidden" id="placeBox">
<?php 
?>
</div>
<!--
<select id="kk">
	<option value="0">g</option>
</select>
-->
