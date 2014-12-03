<div class="row">
	<div class="col-md-6">
<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=> $this->id.'-cu-form',
		'type'=>'horizontal',
		'enableAjaxValidation' => true,
	));
	?>

		<?php echo $form->textFieldRow($model,'name', array(
			'class' => 'form-control',
		)); ?> 
		<?php
		echo $form->dropDownListRow($model,'parent',array(0=>'-Root-') + Category::treeList(),array(
			//'empty'=>'',
			'class'=>'form-control',
			'encode' => false,
		));
		?>
		<?php echo $form->textFieldRow($model,'position', array(
			'class' => 'form-control',
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
