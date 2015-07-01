<?php
	$this->widget('bootstrap.widgets.Breadcrumbs', array(
		'links'=>array(
			//'用户'=>array('user/'),
			'用户详情',
		),
	));

?>


<div class="row">
	<div class="col-md-6">
	<?php
	$this->beginWidget('bootstrap.widgets.Box', array(
		'type' => 'primary',
		'header' => '用户信息',
	));
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'type' => array('striped', 'condensed'),
		'data'=>$model,
		'attributes'=>array(
			'id',
			'username',
			'email',
			'profile',
		),
	));
	?>
	<div style="margin-top:10px; text-align:center;">
		<?php 
		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'link',
			'url' => Yii::app()->request->baseUrl.'/user/changePwd',
			'label'=>'修改密码',
			'type' => 'primary',
		));


		?>
	</div>
	<?php $this->endWidget(); ?>
	</div>
</div>
