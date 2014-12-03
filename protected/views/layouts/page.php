<?php $this->beginContent('/layouts/main'); ?>
	<?php $this->beginWidget('CMarkdown'); ?>
		<?php echo $content; ?>
	<?php $this->endWidget('CMarkdown'); ?>
<?php $this->endContent(); ?>
