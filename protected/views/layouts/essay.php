<?php $this->beginContent('/layouts/main'); ?>
	<div class="row">
		<div class="col-md-12" id="top">
			<input accesskey="j" type="text" class="vocabulary-search" />
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

	Yii::app()->clientScript->registerScript(
		'vocabulary-search-autocomplete',
		'
		$.ajax({ 
		 	type: "POST" 
			,url: "/blog/pk/vocabulary/ajaxGetList" 
			,dateType: "json"
		}).done(function( list ) {
			$(".vocabulary-search").autocomplete({
				source: list,
				minLength: 2,
				autoFocus: true,
				select: function( event, ui ) {
					$.ajax({ 
					 	type: "POST" 
						,url: "/blog/pk/vocabulary/ajaxSearch" 
						,dateType: "json"
						,data: { name: ui.item.value }
					}).done(function( d ) {
						$("#general-modal").find(".modal-title").html( d.title );
						$("#general-modal").find(".modal-body").html( d.result );
						$("#general-modal").find(".modal-dialog").addClass("modal-lg");
						$("#general-modal").find("pre code").each(function(i, block) {
							hljs.highlightBlock(block);
						});

						$("#general-modal").find(".native-exp").hide();
						$("li.explanation").hover(
							function() {
								$(this).find(".native-exp").show();
							}, function() {
								$(this).find(".native-exp").hide();
							}
						);
						$("#general-modal").modal({
							backdrop: false,
						});
					});
				}
			});
		});
	',
	CClientScript::POS_END
	);
	?>
<?php $this->endContent(); ?>
