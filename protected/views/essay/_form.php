<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=>'essay-cu-form',
		'type'=>'horizontal',
	));
	?>

		<?php echo $form->textFieldRow($model,'title', array(
			'class'=>'noempty',
		)); ?> 
		<div class="form-group">
			<?php echo $form->labelEx($model,'c_date', array(
				'class' => 'col-sm-2 control-label',
			)); ?>
			<div class="col-sm-10">
				<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name'=>'FormEssay[c_date]',
					'value' => date('Y-m-d'),
					'options'=>array(
						'showAnim'=>'fold',
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'class'=>'form-control noempty'
                                
					),
				));
				?>
			</div>
		</div>

		<?php echo $form->dropDownListRow($model,'status', Lookup::items('EssayStatus'), array(
			'class' => 'noempty',
		)); ?> 
		<?php echo $form->dropDownListRow($model,'category', Category::treeList(), array(
			'class' => 'noempty',
			'encode' => false,
		)); ?> 
		<?php echo $form->textFieldRow($model,'label', array(
			'class' => 'AutoCompleteEssayLabel',
		)); ?> 

		<div class="form-actions form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<?php $this->widget('bootstrap.widgets.Button', array(
					'buttonType'=>'submit', 
					'type'=>'success', 
					'label'=>'Create',
					'htmlOptions'=> array(
						'id' => 'submit',
					),
				)); ?>
				<?php $this->widget('bootstrap.widgets.Button', array(
					'buttonType'=>'reset', 
					'type'=>'default', 
					'label'=>'Reset',
					'htmlOptions'=> array(
					),
				)); ?>
                                
				<?php 
				echo $form->hiddenField($model,'action');
				echo $form->hiddenField($model,'id');
				?>
			</div>
		</div>

	<?php $this->endWidget(); ?>
