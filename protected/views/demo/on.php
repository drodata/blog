<?php
$a=['kuixy','go','a8'];
echo array_shift($a);
?>
<button class="a btn btn-primary">Go</button>
<button id="b" class="btn btn-primary">Copy</button>
<hr>
<form method="post">
	<input type="text" name="name" />
	<label><input type="radio" value="a" name="food" />Food A</label>
	<label><input type="radio" value="b" name="food" />Food B</label>

	<button type="submit">Go</button>
</form>
<?php
	if ($_POST) {
		K::printR($_POST);
	}
?>
<hr>
<div id="paste">
</div>
<div id="console"></div>
<script type="text/javascript"> 
$(function(){
	$('.a').on('click', function(){
		$('<p>gogo</p>').appendTo( $('#console') );
	});

	$('#b').click(function(){
		$.post('/blog/demo/ajax','',function(response){
			$(response.entity).appendTo($('#paste'));
		});
	});
});
</script>
