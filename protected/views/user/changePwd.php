<?php
	$this->widget('bootstrap.widgets.Breadcrumbs', array(
		'links'=>array(
			'用户'=>array('setting/'),
			'修改密码',
		),
	));
?>

<div class="row">
	<section class="col-md-6">
		<?php
		$this->beginWidget('bootstrap.widgets.Box', array(
			'id' => 'change-pwd',
			'type' => 'danger',
			'headerIcon' => 'key',
			'header' => '修改密码',
			//'tools'=>array( 'collapse',),
		));
		$form = $this->beginWidget('bootstrap.widgets.ActiveForm', array(
			'id'=>'change-pwd-form',
			'enableAjaxValidation'=>true,
			'focus' => array($model, 'oldPassword'),
        	'type'=>'horizontal',
		));
		?>
		<fieldset>
			<?php echo $form->passwordFieldRow($model,'oldPassword',array(
				'size'=>20,
			)); ?>
			<?php echo $form->passwordFieldRow($model,'newPassword',array('size'=>20)); ?>
			<?php echo $form->passwordFieldRow($model,'newPasswordReinput',array('size'=>20)); ?>
		</fieldset>
        
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.Button', array('buttonType'=>'submit', 'type'=>'success', 'size'=>'sm', 'label'=>'保存修改')); ?>
                        <?php $this->widget('bootstrap.widgets.Button', array('buttonType'=>'reset','size'=>'sm', 'label'=>'重置')); ?>
		</div>
		<?php $this->endWidget(); ?>
		<?php $this->endWidget(); ?>
	</section>
</div>
