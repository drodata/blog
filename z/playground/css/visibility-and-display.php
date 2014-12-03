<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="/blog/js/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css" href="/blog/z/playground/common.css" />
	<title>
		The Difference between visibility and display
	</title>
	<script type="text/javascript"> 
		$(document).ready(function(){
		});
	</script>
	<style type="text/css">
		#a, #b, #c, #d {
			width:100px; height:100px;
			margin:20px;
			background-color: red;
			font-size:28px;
			text-align:center;
			color:#fff;
		}

		#b {visibility:hidden;}
	</style>
</head>
<body>
	<div id="a"> a </div>
	<div id="b"> b </div>
	<div id="c"> c </div>
<hr>
</body>
</html>
