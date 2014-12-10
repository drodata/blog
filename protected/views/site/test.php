<h3>Quick Test Page (<code>views/site/test.php</code>)</h3>
<button id="a">
go
</button>
<input type="hidden" name="size" value="kuixy" />
<input type="text" name="size" />

<form id="fm">
<input type="text" name="size" value="kuixy" />
<input type="text" name="name" value="hello" />
<input type="text" name="disabled_name" value="helloo" disabled="disabled" />
<input type="submit" name="submit" value="Go" />
</form>

<?php
?>
<script type="text/javascript"> 
	$(function(){
		$('#fm').submit(function(e){
			e.preventDefault();
			alert($(this).serialize());
		});
		//$('#general-modal').modal();

		var size = $('[name=size]');

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
