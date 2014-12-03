/**
 * Motd Index Action
 *
 * @author Drodata <kuixy@163.com>
 * @create 2012-12-6
 * @link http://cnblogs.com/drodata
 */
$(document).ready(function(){

	var sampleHtml = $('<span>Hello Boxy<br><i>The second line.</i></span><button class="closeBtn">关闭</button>');
	$('#motdCreateBtn').click(function(){
		var bi = new Boxy(sampleHtml,{
			title: 'Dialog',
			draggable:false,
		});
		$('.closeBtn').click(function(){
			bi.hide();
		});
		return false;
	});
	$('.delete').click(function(){
		var confirmInfo = $('<div class="boxy"><i>正在删除一条记录，请再次确认</i></div>');;
		Boxy.confirm(confirmInfo, function() { 
		}, {title: ''});
		//return false;
	});
});

/*
*/
