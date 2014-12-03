	<br /><br />
<h2>2012.12.25 更新</h2>
<h2>原始</h2>
<!--
	<video controls="controls" preload="auto"> 
		<source src="/media/andro/video/02-03/20140218.mop-floor-then-slip.mp4">
	</video>
	<br>
	<img  src="/media/andro/photo/02-03/xx.jpg" />
<h4></h4>
<pre class="brush: php">
</pre>
<ul><li>
</li><li>
</li></ul>
<blockquote>
<p class="source"></p>
</blockquote>
<img class="lf" src="/img/page/2013/andro.20130103.jpg" />
-->
	/**
	 * @Desc:
	 * @Author: chnkui@gmail.com
	 * @Create: Oct 19, 2012
	 */


$opt.= "<td align=\"center\"><a rel=\"".$ehid."\"class=\"btn editExpenseHistoryAmountL\">修改金额</a></td>";
add_expense_detail_list_event();
add_expense_history_detail_list_event();
		var confirmInfo = "正在删除一条记录，请再次确认";
		Boxy.confirm(confirmInfo, function() { 
		}, {title: ''});
var bi = boxy_input('#revenueList','公司收入明细');
	$.ajax({ 
		 type: "POST" 
		,url: "md.ajax-pipe.php" 
		,data: {
		 }
		,beforeSend:loading
	}).done(function( msg ) {
		var dt = split_ajax_data(msg);
		boxy_msg(msg,'','*.php');
		loading_end();
	});
<?php
	echo "<span>order_id_str^".$order_id_str.
	"::has_invoice^".$has_invoice.
	"::has_particle_chart^".$has_chart.
	"</span>";
