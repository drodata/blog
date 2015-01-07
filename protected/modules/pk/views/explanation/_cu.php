<div class="row">
	<div class="col-md-6">
<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=>$this->id.'-cu-form',
		'type'=>'horizontal',
	));
	?>

		<?php
		echo $form->dropDownListRow($model,'vocabulary_id',Vocabulary::nameList(),array(
			'empty'=>'',
			'class'=>'form-control',
		));
		?>
		<?php echo $form->textFieldRow($formTaxonomy,'taxonomy', array(
			'class' => 'AutoCompleteExplanationTaxonomy',
			'tabindex' => 1,
		)); ?> 
		<?php echo $form->radioButtonListInlineRow($model,'is_main',array('1'=>'Yes', '0'=> 'No'),array()); ?>
		<?php echo $form->dropDownListRow($model,'class',Lookup::items('ExplanationClass'),array(
			'empty'=>'',
			'class'=>'form-control',
		)); ?>
		<?php echo $form->textAreaRow($model,'explanation', array(
			'class'=>'form-control',
			'rows' => 4,
		)); ?> 
		<?php echo $form->textFieldRow($model,'native_explanation', array(
			'class'=>'form-control',
		)); ?> 
		<?php echo $form->textAreaRow($model,'example', array(
			'class'=>'form-control',
			'rows' => 2,
		)); ?> 
		<?php echo $form->textFieldRow($model,'synonym', array(
			'class'=>'form-control',
		)); ?> 
		<?php echo $form->textFieldRow($model,'compare', array(
			'class'=>'form-control',
		)); ?> 
		<?php echo $form->textFieldRow($model,'see_also', array(
			'class'=>'form-control',
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
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
	Yii::app()->clientScript->registerScriptFile(
		Yii::app()->baseUrl.'/js/explanation.js',
		CClientScript::POS_END
	);
	?>
