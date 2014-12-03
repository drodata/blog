<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/blog/z/playground/common.css" />
	<title>jQuery Waypoint Learning Note</title>
	<script type="text/javascript" src="/blog/js/jquery-latest.js"></script>
	<script type="text/javascript" src="/blog/js/waypoint.js"></script>
	<script type="text/javascript" src="/blog/js/waypoint-infinite.js"></script>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$('.infinite-container').waypoint('infinite');
		});
	</script>
	<style type="text/css">
  .infinite-container {
      width:480px;
	  /*
      margin-left:-20px;
	  */
      overflow:hidden;
      position:relative;
	  background: lightblue;
    }

    .infinite-container.infinite-loading:after {
      content:"Loading...";
      height:30px;
      line-height:30px;
      position:absolute;
      left:0;
      right:0;
      bottom:0;
      text-align:center;
      background:#6a6272;
      color:#eae2f2;
    }

    .infinite-item {
      float:left;
      width:100px;
      height:100px;
      background:#444a50;
      margin:20px 0 20px 20px;
    }
    .infinite-item:nth-child(3n) {
      background:#6a6272;
    }
    .infinite-item:nth-child(3n+1) {
      background:#eae2f2;
    }

    .infinite-more-link {
      visibility:hidden;
    }

	.top-content {
		height:1500px;
		background: #9f9f9f;
	}
	</style>
</head>
<body>
<div class="top-content">
</div>
<div>
	<div class="infinite-container">
        	<div class="infinite-item"></div>
		<p>bccc</p>
		<p>b</p>
		<p>b</p>
		<p>b</p>
		<p>b</p>
		<p>b</p>
		<p>b</p>
		<p>google</p>
	</div>
	<a href="." class="infinite-more-link">More</a>
</div>
</body>
</html>
