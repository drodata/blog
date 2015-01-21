<?php $this->beginContent('/layouts/main'); ?>
	<div class="row">
		<div class="col-md-12" id="top">
			<?php echo $this->renderPartial('application.modules.pk.views.vocabulary._search');?>
		</div>
	</div>
	<div class="row">
		<div id="side-navi">
			<?php $this->widget('EssayMenu'); ?>
			<?php $this->widget('CategoryMenu'); ?>
			<div id="ad"></div>
		</div>
		<div id="essay-list">
			<div id="essay-list-inner">
				<?php echo $content; ?>
			</div>
		</div>
		<div id="essay-container">
		<?php
		?>
		</div>
	</div>
	<?php
	echo $this->renderPartial('_CUDialog');

	Yii::app()->clientScript->registerScriptFile(
		Yii::app()->baseUrl.'/js/essay.js',
		CClientScript::POS_HEAD
	);

	Yii::app()->clientScript->registerScript('search', "
		$('#essay-search-form').submit(function(){
			$.fn.yiiListView.update('essay-list', {
				data: $(this).serialize()
			});
			return false;
		});
	");
	?>

<?php $this->endContent(); ?>
