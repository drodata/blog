<button class="a btn btn-primary">Go</button>
<button id="b" class="btn btn-primary">Copy</button>
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
