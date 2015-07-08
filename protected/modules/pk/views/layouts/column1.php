<?php $this->beginContent('/layouts/main'); ?>
<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
));
?>

<!-- user flash message container -->
<?php $this->widget('ext.widget.flashMessage.FlashMessage', array(
)); ?>

<div class="container">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
