(function ( $ ) { 

/* =====================================================
 * Active Form
 *
 * ===================================================== */
	$.fn.afGet = function ( prefix ) {
		var name = full_name = tag = '';
		var elements = {};

		this.find('[name^='+ prefix +'\\[]').each(function(idx){

			tag = $(this).get(0).tagName;

			full_name = $(this).attr('name');
			name = ((tag == 'INPUT') && ($(this).attr('type') == 'checkbox')) 
				? $(this).attr('name').split(prefix+'[')[1].slice(0,-3)
				: $(this).attr('name').split(prefix+'[')[1].slice(0,-1);
			if (!elements[name]) elements[name] = $(this);

		});
		return elements;
	};
	/**
	 * 'fe' means Form Element
	 */
	$.fn.feSelect = function(optionId) {
		this.find("option[value="+optionId+"]").attr("selected","selected");
		return this;
	}; 
	$.fn.feType = function() {
		// 'SELECT', 'TEXTAREA'
		var obj = this;
		var tag = obj[0].tagName;
		return tag;
	}; 
	/**
	 * feValue: Get/Set form elements' value.
	 *  TEXT, RADIO, SELECT, TEXTAREA, HIDDEN
	 * Restriction:
	 *	1. Radio Button 不能单独使用，外面需有 HTML 区块包裹
	 */
	$.fn.feValue = function(value) {
		var obj = this;
		if (obj[0]) {
			var tag = obj[0].tagName;
                        
			if (typeof(value) === 'undefined') {
				// GET
				if (tag == 'SELECT') {
					var val = this.find('option:selected').val();
				} else if ((tag == 'INPUT') && (this.attr('type') == 'radio')) {
					var val = this.parent().find(':checked').val();
					//!var val =  $(this+':checked').val();
					//!var val =  $(':checked',this).val();
				} else {
					var val = $(this).val();
				}
				return val;
			} else {
				// SET
				if (tag == 'SELECT') {
					this.find('option[value='+value+']').attr('selected','selected');
				} else if ((tag == 'INPUT') && (this.attr('type') == 'radio')) {
					// Why? @2013年9月29日
					//!$('[value=mainland]',this).attr('checked','checked');
					this.parent().find('[value='+value+']').attr('checked','checked');
				} else {
					$(this).val(value);
				}
				return this;
			}
		} else {
			return false;
		}
	}; 

	/**	
	 * !DEPRECATED! Use $.fn.feValue() instead.
	 */
	$.fn.feActiveValue = function() {
		// 'SELECT', 'TEXTAREA'
		var obj = this;
		var tag = obj[0].tagName;
		//var tag = $(this)[0].tagName;
		if ( ( tag == 'TEXTAREA') || ( (tag == 'INPUT') && (this.attr('type') == 'text') ) ) {
			//文本
			var val = $(this).val();
		} else if ((tag == 'INPUT') && (this.attr('type') == 'radio')) {
			// 按钮
			return $(this+':checked').val();
		} else if (tag == 'SELECT') {
			// 下拉菜单
			var val = this.find('option:selected').val();
		}
		return val;
	}; 
	$.fn.feDisable = function() {
		this.attr("disabled","disabled");
		return this;
	}; 
	$.fn.feSetName = function(val) {
		this.attr("name",val);
		return this;
	}; 
	
	$.ltrim = function( str ) {
		return str.replace( /^\s+/, "" );
	}; 

	$.print_a = function( arr ) {
		// Ref. http://stackoverflow.com/questions/5289403/jquery-convert-javascript-array-to-string
		var blkstr = [];
		$.each(arr, function(idx2,val2) {                    
     			var str = idx2 + ": " + val2;
          		blkstr.push(str);
	  	});
	  	alert(blkstr.join("\n"));
	}
	$.dbg = function( str ) {
		alert(str);
		return false;
	}; 
	/**
	 * NOTE: the order.
	 */
	$.getCurrencyEntity = function ( num ) {
		var currency_entities = ['','&yen;','&dollar;',"JP&yen;","&euro;"];
		return (currency_entities[num]) ? currency_entities[num] : '';
	}

	/**
	 * color: 'dark','cream','red','green','blue','youtube','jtools','cluetip','tipsy','tipped'
	 *		full list: http://qtip2.com/guides#style.builtin
	 * Usage:
		$.qtip_hint({
			element:$('#id'),
			message:'any html entity',
			style: 'red',
			ready_show:true
		});

         		content: {
            			text: 'Loading...', 
            			ajax: {
               				url: '/eorder/md.ajax-pipe.php',
					type: 'POST',
               				data: { 
						do: 'generate_order_receipt_tip',
                  				order_id: $(this).attr('rel')
               				} 
            			}
         		},
	 * Change Log:
	 *	2014-01-04: 引入 ajax 功能
	 *		Example:
		$.qtip_hint({
			element: activeElement,
			message: {
				text: '请求处理中……',
            			ajax: {
               				url: '/eo/expense/ajaxAuth',
					type: 'POST',
					//dateType: 'json',
               				data: dt,
            			}
			},
			position:7,
			ready_show:true,
		});
	 *		
	 */
	$.qtip_hint = function(obj ) {
		obj.ready_show = (obj.ready_show) ? obj.ready_show : false;
		obj.style 	= (obj.style) ? obj.style : 'tipped';
		obj.position 	= (typeof(obj.position) != 'undefined') ? obj.position : 1;
		var pst = [
			// 'my':以tip为参考，标明元素相对位置
			// 'at':以元素为参考，标明tip相对位置
			{ my: 'bottom right' 	, at: 'top left' },
			{ my: 'bottom center' 	, at: 'top center' },
			{ my: 'bottom left' 	, at: 'top right' },
			{ my: 'center left' 	, at: 'center right' },
			{ my: 'top left' 	, at: 'bottom right' },
			{ my: 'top center' 	, at: 'bottom center' },
			{ my: 'top right' 	, at: 'bottom left' },
			{ my: 'center right' 	, at: 'center left' },
		];
		// Initial
		if (obj.element.data('qtip'))
			obj.element.qtip('destroy');

		if ( typeof(obj.message) == 'string' ) {
			var _ctt = {text:obj.message};
		} else {
			var _ctt = obj.message;
		}

		obj.element.qtip({
         		content: _ctt,
			position: pst[ obj.position ],
			show: {
				event: 'click',
				ready: obj.ready_show,
			},
			hide: {
				fixed:true,
				delay:1000,
			},
         		style: {
            			//classes: 'ui-tooltip-'+obj.style+' ui-tooltip-shadow'
            			classes: 'qtip-'+obj.style+' qtip-shadow'
         		}
		});
	}; 
	$.dbg = function (obj) {
		var i = 0;
		var opt = [];
		for (var pro in obj) {
			opt[i] = pro+": "+obj[pro];
			i++;
		}
		alert(opt.join("\n"));
	}
	$.getObjStr = function (obj) {
		var j = [];
		var i = 0;
		for (var k in obj) {
			j[i] = k+': '+obj[k];
			i++;	
		}
		return j.join("\n");
	}

	$.goodsEncode = function (ar) {
		var seperatorA = '^^';
		var seperatorB = '::';
		var seperatorC = '``';
		var _a = [];
		var _c = [];
		for (var i = 0; i < ar.length; i++) {
			var j = 0;
			for (var key in ar[i]) {
				_c[j] = key + seperatorC+ ar[i][key];
				j++;
			}
			_a[i] = _c.join(seperatorB);
		}
		return _a.join(seperatorA);
	}

	$.distinctJudge = function (array) {
			if ( array.length > 1 ) {
				var init = true;
				for (var i = 1; i < array.length; i++) {
					if (array[0] != array[i]) {
						init = false;
					}
				}
				return init;
			} else {
				return false;
			}
	}
}( jQuery ));
