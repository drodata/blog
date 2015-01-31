<div class="row">
	<div class="col-md-6">
<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=> $this->id.'-cu-form',
		'type'=>'horizontal',
	));
	?>

		<?php echo $form->textFieldRow($formTaxonomy,'taxonomy', array(
			'class' => 'AutoCompleteClipTaxonomy',
			'tabindex' => 1,
		)); ?> 
		<?php echo $form->textAreaRow($modelScrap,'content', array(
			'class'=>'form-control',
			'rows' => 10,
			'tabindex' => 2,
		)); ?> 
		<?php echo $form->textFieldRow($modelScrap,'page', array(
			'class'=>'form-control',
			'tabindex' => 3,
		)); ?> 
		<?php echo $form->textFieldRow($modelClip,'title', array(
			'class'=>'form-control',
			'tabindex' => 4,
		)); ?> 
		<?php echo $form->textAreaRow($modelClip,'note', array(
			'class'=>'form-control',
			'rows' => 10,
			'tabindex' => 5,
		)); ?> 


		<div class="form-actions form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<?php $this->widget('bootstrap.widgets.Button', array(
					'buttonType'=> 'submit',
					'type'=>'success', 
					'label'=> $modelClip->isNewRecord ? 'Create' : 'Save Update', 
					'htmlOptions'=> array(
						'tabindex' => 6,
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
	Yii::app()->baseUrl.'/js/clip.js',
	CClientScript::POS_END
);
?>
