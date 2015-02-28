$(document).ready(function(){

	// Render an essay's content via ajax
	function renderEssayContent(id, keyword) {
		if (id) {
			$.ajax({ 
			 	type: 'POST' 
				,url: '/blog/essay/ajaxGetContent'
				,dateType: 'json'
				,data: { 
					id : id,
					keyword : keyword,
				}
			}).done(function( d ) {
				$('#essay-container').html(d.content);
				$(".essay #content").find('table').addClass('table table-condensed table-striped table-bordered table-hover');
				$(".essay #content").find('pre code').each(function(i, block) {
					hljs.highlightBlock(block);
				});
			});
		} else {
				$('#essay-container').html('找不到匹配的文章');
		}
	}
	function renderEssayListAndContent(searchCondition) {
		$.ajax({ 
		 	type: 'POST' 
			,url: '/blog/essay/ajaxUpdateListAndContainer'
			,dateType: 'json'
			,data: searchCondition
		}).done(function( d ) {
			if (d.pageNumber) {
				$(d.list).find('.items').children().appendTo($('#essay-list-inner').find('.items'));
				$('.page-number').feValue( d.pageNumber );
			} else {
				$('#essay-list').scrollTop(0);
				$('#essay-list-inner').html(d.list);
				var keyword = typeof(searchCondition.keyword) == 'undefined' ? null : searchCondition.keyword;
				renderEssayContent(d.essayId, keyword);
			}
        
		});
	}
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
	function searchCondition(action) {
		// default get all conditions
		if (typeof(action) == 'undefined') {
			var sc = {};
			if ($('.jstree-clicked').length > 0) {
				var category_id = $('.jstree-clicked').parents('li').first().attr('id').split('_')[1];
				if (category_id != '0')
					sc.id = category_id;
			}
			if ($('.search-label').val() != '')
				sc.label_name = $('.search-label').val();
			if ($('.search-keyword').find('input').val() != '')
				sc.keyword = $('.search-keyword').find('input').val();
			if ($('.search-date').feValue() != '')
				sc.ym = $('.search-date').feValue();
			if ($('.scrolled').feValue() == '1')
				sc.page_number = $('.page-number').feValue();
			return sc;
		}
	}

});
