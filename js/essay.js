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

	// Delete
	$(document).off('click','.EssayDelete').on('click','.EssayDelete',function(event){
		event.preventDefault();
		var active_element = $(this);
		var msg = '<p>确定删除此文？</p>';
		msg += '<center id="qtip-actions">'
			+ '<button class="btn btn-danger btn-xs">删除</button>'
			+ '&nbsp;&nbsp;'
			+ '<button class="btn btn-default btn-xs">取消</button>'
			+ '</center';
		$.qtip_hint({
			element: active_element,
			message: msg,
			ready_show:true,
			position:6,
		});
		$('#qtip-actions .btn-danger').live('click', function(event) {
			event.preventDefault();
			$.ajax({ 
			 	type: 'POST' 
				,url: '/blog/essay/ajaxDelete'
				,dateType: 'json'
				,data: { id : active_element.data('id') }
			}).done(function( d ) {
				window.location = '/blog/essay/';
			});
		});
		$('#qtip-actions .btn-default').live('click', function(event) {
			event.preventDefault();
			active_element.qtip('destroy');
		});

	});

	// Just edit essay's content

	$(document).off('click','.EditContent').on('click','.EditContent',function(event){
		event.preventDefault();
		var active_element = $(this);
		$.ajax({ 
		 	type: 'POST' 
			,url: '/blog/essay/ajaxEditContent'
			,dateType: 'json'
			,data: { id : $(this).data('id') }
			//,beforeSend:loading
		}).done(function( d ) {
			$.qtip_hint({
				element: active_element,
				message: d.message,
				ready_show:true,
				position:d.position,
				style: d.style,
				hide:{delay:1000},
			});
		});
		return false;
	});

	// Save essay's content

	$(document).off('click','.UpdateContent').on('click','.UpdateContent',function(event){
		event.preventDefault();
		var active_element = $(this);
		var id = $(this).data('id');
		$.ajax({ 
		 	type: 'POST' 
			,url: '/blog/essay/ajaxUpdateContent'
			,dateType: 'json'
			,data: { id : id }
		}).done(function( d ) {
			$.qtip_hint({
				element: active_element,
				message: d.message,
				ready_show:true,
				hide:{delay:1000},
				position:1,
				style: d.style,
			});
			renderEssayContent(id);
		});
		return false;
	});

	// Edit other attributes but content of an essay
	$(document).off('click','.EssayCU').on('click','.EssayCU',function(e){
		e.preventDefault();
		var wd = $("#essay-cu-dialog");
		var wf = $("#essay-cu-form");
		var fe = wf.afGet('FormEssay');
		var trigger = wf.find('input[name=submit]');

		// reset dialog window
		fe.title.feValue('');
		fe.label.feValue('');

		// invoke label autocomplete
		ivk_essay_label_autocomplete();

		fe.action.feValue($(this).data('action'));
		if ($(this).data('id'))
			fe.id.feValue($(this).data('id'));

		// popute data in update mode
		if ($(this).data('action') === 'update') {
			$.ajax({ 
			 	type: "POST" 
				,url: "/blog/essay/ajaxGetData" 
				,dateType: "json"
				,data: {id: $(this).data('id')}
			}).done(function( d ) {
				for ( var item in d.items) {
					fe[item].feValue( d.items[ item ] );
				}
				wd.find('[type=submit]').html('Save Changes');
				wd.dialog('option','title','Quick Edit');

			});
		}
			
		wd.dialog('open');
		wf.unbind('submit');
		wf.submit(function(e){
			e.preventDefault();
			var serializedData = wf.serialize();
			trigger.attr('disabled','disabled');
			$.post('/blog/essay/ajaxCU', serializedData, function(response) {
				if (response.status) {
					wd.dialog("close");
					renderEssayContent(response.id);

				} else {
					for( var ele in response.errors) {
						var form_group = fe[ele].parents('.form-group').first();
						var warning_feedback = $('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
						form_group.addClass("has-error has-feedback");
						warning_feedback.appendTo(form_group);
						var ff = fe[ele].parents('.col-sm-10').first();
						if (ff.find('span.help-inline'))
							ff.find('span.help-inline').remove();
						$('<span class="help-inline error">' + response.errors[ele] + '</span>').appendTo(ff);
						
					}
					trigger.removeAttr('disabled');
				}
			}).fail([ajax_fail_handler, function(){
				trigger.prop('disabled',false);
			}]).always(function(){
			});
		});
	});


	// search essay via category id

	// configure
	$.jstree.defaults.core.themes= {
	};
	$('#category-tree').on('changed.jstree', function(e, data){
		$('.scrolled').feValue('0');
		$('.page-number').feValue('1');
		renderEssayListAndContent( searchCondition() );
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
