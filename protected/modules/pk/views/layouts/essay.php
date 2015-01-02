<?php $this->beginContent('/layouts/main'); ?>
	<div class="row">
		<div class="col-md-8">
			<?php echo $content; ?>
		</div>
		<div class="col-md-4">
			<?php $this->widget('EssayMenu'); ?>
			<?php $this->widget('CategoryMenu'); ?>
		</div>
	</div>
<?php $this->endContent(); ?>
