<h3>Quick Test Page (<code>views/site/test.php</code>)</h3>
<button id="a">
go
</button>
<button id="b">submit</button>
<?php
?>
<script type="text/javascript"> 
	$(function(){
		$('#a').click(function(){
			$('#b').prop('disabled',true);
		});
	/*
	$.qtip_hint({
		element: $('#a'),
		message: 'good',
		ready_show:true,
		position:5,
		style:'cluetip',
	});
	*/
	});
</script>
