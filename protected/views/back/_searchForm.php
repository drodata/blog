<?php 
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(

		'id'=>'essay-search-form',
		'method' => 'get',
		'type'=>'inline',
		'htmlOptions' => array(
			'class' => 'well',
		),

	));
	?>

		<?php echo $form->dropDownListRow($model,'category', Category::getList(), array(
			'class' => 'form-control input-sm',
		)); ?> 
		<?php echo $form->textFieldRow($model,'label_name', array(
			'class' => 'form-control input-sm XAutoCompleteEssayLabel',
		)); ?> 
		<?php echo $form->textFieldRow($model,'keyword', array(
			'class' => 'form-control input-sm',
		)); ?> 
		<?php $this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'submit', 
			'type'=>'success', 
			'label'=>'Create',
			'size' => 'sm',
			'htmlOptions'=> array(
				'id' => 'submit',
			),
		)); ?>
	<?php $this->endWidget(); ?>
