<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/blog/js/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css" href="/blog/z/playground/common.css" />
	<title>Minimal Page Template</title>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$('#s').click(function(e){
				$('#a').data('uid', 'kuixy');
				alert($('#a').data('uid'));
			});
			$('#c').click(function(e){
				//$('#a').attr('data-uid', 'chnkui');
				$('#a').data('uid', 'chnkui');
				alert($('#a').data('uid'));
			});
		});
	</script>
	<style type="text/css">
	</style>
</head>
<body>
	<div id="a"></div>
	<button id="s">Set to 'kuixy'</button>
	<button id="c">Change to 'chnkui'</button>
</body>
</html>
