<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'essay-cu-dialog',
	'options'=>array(
		'modal' => true,
		'title'=>'Create Essay',
		'autoOpen'=>false,
		'resizable'=>false,
		'width'=>'600',
		'hide'=>'fade',
		'show'=>'fade',
	),
));
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
		'id'=>'essay-cu-form',
		'type'=>'horizontal',
	));
	$model=new FormEssay;
	?>

		<?php echo $form->textFieldRow($model,'title', array(
			'class'=>'noempty',
			'tabindex' => '1',
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
						'class'=>'form-control noempty',
						'tabindex' => '4',
                                
					),
				));
				?>
			</div>
		</div>

		<?php echo $form->dropDownListRow($model,'status', Lookup::items('EssayStatus'), array(
			'class' => 'noempty',
			'tabindex' => '5',
		)); ?> 
		<?php echo $form->dropDownListRow($model,'category', Category::treeList(), array(
			'class' => 'noempty',
			'encode' => false,
			'tabindex' => '2',
		)); ?> 
		<?php echo $form->textFieldRow($model,'label', array(
			'class' => 'AutoCompleteEssayLabel',
			'tabindex' => '3',
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
						'tabindex' => '6',
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
<?php 
	$this->endWidget('zii.widgets.jui.CJuiDialog'); 

?>
