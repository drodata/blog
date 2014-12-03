<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/blog/z/playground/common.css" />
	<script type="text/javascript" src="/blog/js/jquery-latest.js"></script>
	<title>Minimal Page Template</title>
	<!--
	-->
	<script type="text/javascript"> 
		$(document).ready(function(){
			$('#SearchEssay').click(function(e){
				e.preventDefault();
				var wd = $('#general-dialog');
				wd.dialog('open');
			});
		});
	</script>
	<style type="text/css">
		#d {
			width:100px; height:100px;
			margin:20px;
			background-color: red;
			font-size:28px;
			text-align:center;
			color:#fff;
			position:relative;
		}
		#e {
			width:50px; height:50px;
			background-color: green;
			font-size:20px;
			text-align:center;
			color:#fff;

			position:absolute;
			left:100px;
			top:50px;
		}
		/*
		*/
	</style>
</head>
<body>
	<div id="d">
		<div id="e">e</div>
		d
	</div>
</body>
</html>
