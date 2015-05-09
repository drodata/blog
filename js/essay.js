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
