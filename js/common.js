	function ajax_fail_handler (XHR, textStatus, errorThrown) {
		switch (textStatus) {
		case 'timeout':
			err = '请求超时';
			break;
		case 'parsererror':
			err = '解析器发生错误';
			break;
		case 'error':
			if (XHR.status && !/^\s*$/.test(XHR.status)) {
				err = '错误代码： ' + XHR.status;
			} else {
				err = '错误';
			}
			if (XHR.responseText && !/^\s*$/.test(XHR.responseText)) {
				err = err + ': ' + XHR.responseText;
			}
			break;
		}

		if (err) {
			$('#general-modal').find('.modal-body').html(err);
			$('#general-modal').modal();
		}

	}
	// label autocomplete
	function ivk_essay_label_autocomplete() {
		$.ajax({ 
		 	type: "POST" 
			,url: "/blog/essay/ajaxGetLabels" 
			,dateType: "json"
		}).done(function( d ) {
			function split( val ) {
				return val.split( /,\s*/ );
			}
			function extractLast( term ) {
				return split( term ).pop();
			} 
			$( ".AutoCompleteEssayLabel" ).bind( "keydown", function( event ) {
					if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "ui-autocomplete" ).menu.active ) {
						event.preventDefault();
					}
				}).autocomplete({
					minLength: 2,
					autoFocus: true,
					source: function( request, response ) {
						response( $.ui.autocomplete.filter(
							d, extractLast( request.term ) ) );
					},
					focus: function() {
						return false;
					},
					select: function( event, ui ) {
						var terms = split( this.value );
						terms.pop();
						terms.push( ui.item.value );
						terms.push( "" );
						this.value = terms.join( ", " );
						return false;
					}
				});

		});
	}
	/**
	 * @Function: Grab all elements' values in a dialog which is made by Yii's FormModel Class
	 * @Arguments:
	 *	model(String): Class name which inherited from CFormModel.
	 *
	 * @Return: Object
	 * @Start: 2013-11-22
	 * @Update: 2013-12-13: Inculde check box element.
	 *          2014-01-09: Add scope argument.
	 *			页面内可能存在多个 Forms, 例如 expense/ 页面下，即有用来新建报销的
	 *			Form, 也有用于追加、退回金额的 Form, 限定范围可只获取希望的数据
	 *
	 * @Note: check box's values couldn't contain ','.
	 */
	function grabFormModelValues( model, scope ) {
		if (!scope) scope = $(document);
		var name = tag = '';
		var values = {};
		scope.find('[name^='+model+'\\[]').each(function(idx){
			tag = $(this).get(0).tagName;
			name = ((tag == 'INPUT') && ($(this).attr('type') == 'checkbox')) 
				? $(this).attr('name').split(model+'[')[1].slice(0,-3)
				: $(this).attr('name').split(model+'[')[1].slice(0,-1);
			if ((tag == 'INPUT') && ($(this).attr('type') == 'radio')) {
				values[name] = $(this).parent().find(':checked').val();
			} else if (tag == 'SELECT') {
				values[name] = $(this).find('option:selected').val();
			} else if ((tag == 'INPUT') && ($(this).attr('type') == 'checkbox')) {
				var c = 0;
				var v = [];
				$('[name^='+model+'\\['+name+']').each(function(idx){
					if ($(this).attr('checked')) {
						v[c] = $(this).val();
						c++;
					}
				});
				values[name] = v.join(',');
			} else {
				values[name] = $(this).val();
			}
		});
		return values;
	}
	/* Requirment: Bootstrap.css
	 *
	 */
	function noempty_check(jqobj) {
		var 	judge = true,
			valid_arr = [];
		var c = 0;

		jqobj.find(".noempty").each(function(idx){

			var form_group = $(this).parents('.form-group').first();
			var warning_feedback = $('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
			var sub_flag = true;
			var tag = $(this).get(0).tagName;

			if ((tag == 'INPUT') && ($(this).attr('type') == 'radio')) {
				if (!$(this).parent().parent().find(':checked').val())
					sub_flag = false;
			} else if (tag == 'SELECT') {
				if ($(this).find('option:selected').val() == '') sub_flag = false;
			} else {
				if ($.trim($(this).val()) == '') sub_flag = false;
			}
        
			if (!sub_flag) {
				form_group.addClass("has-error has-feedback");
				warning_feedback.appendTo(form_group);
			}

			var invoker = ((tag == 'INPUT') && ($(this).attr('type') == 'radio')) ? 'change' : 'focus';
			$(this).on(invoker, function(){
				form_group.removeClass("has-error has-feedback").find('.form-control-feedback').remove();
			});
			valid_arr[idx] = sub_flag;
		});
        
		for (var i = 0; i < valid_arr.length; i++) {
			if (valid_arr[i] == false) {
				judge = false;
			}
		}
		return judge;
	}

