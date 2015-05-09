<?php $this->beginContent('/layouts/main'); ?>
	<div class="row" id="main">
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
?>
	<?php

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
<script>
$(document).ready(function(){

	// essay list 滚动到底端时ajax获取下一组list items
	$('#essay-list').scroll(function(){
		if ($('#essay-list').scrollTop() == $('#essay-list-inner').height() - $('#essay-list').height()) {

			$('.scrolled').feValue('1');
			renderEssayListAndContent( searchCondition() );
		}
	});


	// 点击essay lists 中的文章 ajax 更新文章内容
	$(document).off('click','.essay-list-item').on('click','.essay-list-item',function(event){
		event.preventDefault();
		renderEssayContent($(this).data('essayId'));
	});

	// search essay via category id

	// configure
	$.jstree.defaults.core.themes= {
	};
	$('#category-tree').on('changed.jstree', function(e, data){
		$('.scrolled').feValue('0');
		$('.page-number').feValue('1');
		renderEssayListAndContent( searchCondition() );
		//$.print_a( searchCondition() );
	}).jstree({
		'core' : {
			'data' : {
				'url' : '/blog/category/ajaxGetChildren',
				'data' : function (node) {
					return { 'id' : node.id };
				}
			}
		}
	});

	// search essay via label
	$.ajax({ 
	 	type: "POST" 
		,url: "/blog/essay/ajaxGetLabels" 
		,dateType: "json"
	}).done(function( labels ) {
		$('.search-label').autocomplete({
			source: labels,
			minLength: 2,
			autoFocus: true,
			select: function( event, ui ) {
				$('.scrolled').feValue('0');
				$('.page-number').feValue('1');
				var sc =  searchCondition();
				sc.label_name = ui.item.value;
				renderEssayListAndContent(sc);
			}
		});
	});

	// search keyword
	$('.search-keyword').submit(function(e){
		e.preventDefault();
		$('.scrolled').feValue('0');
		$('.page-number').feValue('1');
		renderEssayListAndContent( searchCondition() );
	});

	// search via create date
	$('.search-date').change(function(e){
		$('.scrolled').feValue('0');
		$('.page-number').feValue('1');
		renderEssayListAndContent( searchCondition() );
	});

	// Reset all search options
	$('.search-reset').click(function(e){
		e.preventDefault();
		var sc = {};
		sc.keyword = $('.search-keyword').find('input');
		sc.label_name = $('.search-label');
		sc.ym = $('.search-date');
		sc.keyword.val('');
		sc.label_name.val('');
		sc.ym.find('option:first').attr('selected', 'selected');
		if ($('.jstree-clicked').length > 0) {
			var selectedId = $('.jstree-clicked').parents('li').first().attr('id');
			$('#category-tree').jstree('deselect_node', selectedId);
		}
		$('#category-tree').jstree('select_node','category_0');
	});
});
</script>

<?php $this->endContent(); ?>
