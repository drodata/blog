<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'essay-search-dialog',
	'options'=>array(
		'modal' => true,
		'title'=>'Search Essay',
		'autoOpen'=>false,
		'resizable'=>false,
		'width'=>'600',
		'hide'=>'fade',
		'show'=>'fade',
	),
));
	$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(

		'id'=>'essay-search-form',
		'type'=>'horizontal',

	));

	?>

			<div class="form-actions">
				<?php 
				$this->widget('bootstrap.widgets.Button', array(
					'buttonType'=>'button', 
					'type'=>'success', 
					'label'=>'发货',
					//'size' => 'xs',
					'htmlOptions' => array(
						'id' => 'submit',
					),
				));
                                $this->widget('bootstrap.widgets.Button', array(
					'buttonType'=>'button', 
					//'size' => 'xs',
					'type'=>'default', 
					'label'=>'取消',
					'htmlOptions' => array(
						'id' => 'cancel',
					),
				));
                                
				echo $form->hiddenField($model,'orderIdString');
				echo $form->hiddenField($model,'action');
				echo $form->hiddenField($model,'goods_type');
				echo $form->hiddenField($model,'dispatchId');
				?>
			</div>

	<?php $this->endWidget(); ?>
<?php 
	$this->endWidget('zii.widgets.jui.CJuiDialog'); 

	//Yii::app()->clientScript->registerCssFile('/eo/css/print.express.css','print');
?>
