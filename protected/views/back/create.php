<?php
$this->widget('bootstrap.widgets.Breadcrumbs', array(
	'links'=>array(
		'Essay'=>array($this->id.'/'),
		'新建',
	),
));
?>
<div class="row">
	<div class="col-md-6">

		<?php
		$this->beginWidget('bootstrap.widgets.Box', array(
			'type' => 'success',
			'header' => '新建',
			'tools'=>array(
				'collapse',
			),
		));
		?>

			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

		<?php $this->endWidget(); ?>
	</div>
</div>

<script>
$(function(){
});
</script>

