<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/ts.jpg" />

<!-- jQuery plugins -->
	<!-- qTip2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.qtip.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.qtip.min.js"></script>
	<!-- jstree -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jstree/themes/default/style.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/jstree/jstree.min.js"></script>
	<!-- Highlight.js ['tomorrow-night-blue',]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/highlight-style/github.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/highlight.pack.js"></script>
	<!-- Misc -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jq.boxy.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.trekshot.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js?time=<?=time()?>"></script>

	<script type="text/javascript"> 
	$(document).ready(function(){
		// activate hihglight.js plugin
		hljs.initHighlightingOnLoad();
	});
	</script>

	<style type="text/css">
		pre, .terminal {
			padding:0;
			margin: 15px 0;
			border:0px solid red;
		}
		pre code {
			font-family:"Droid sans mono","Courier New";
			font-size:10pt;
		}
		.essay #content table {width:auto;min-width:200px;}
		.ivs {
			background-color:#eee;
			color:#222222;
		}
		.essay #content h1,
		.essay #content h2,
		.essay #content h3,
		.essay #content h4,
		.essay #content h5,
		.essay #content h6,
		.essay #content blockquote {
			font-family: "Sans Serif", "WenQuanYi Zen Hei" ;
		}
		.essay #content p ,
		.essay #content li {
			line-height:1.5;
			font-size:14px;
			font-family: "Droid sans", "WenQuanYi Zen Hei" ;
		}

		label.radio,
		label.radio-inline,
		label.checkbox,
		label.checkbox-inline {
			font-weight:normal;
		}
		#main {
			padding-top:60px;
			margin:0;
		}
		/*
		#content img {
			display:block;
			padding:5px;
			border:1px solid #ddd;
			margin:10px 0;
		}
		*/
		#content p {
			line-height: 1.5em;
		}
		.border-1 {
			border-right:1px solid #333;
			border-bottom:1px solid #333;
		}

		#top {
			position:absolute;
			width:100%;
			height:30px;
			background-color:#111;
			color:#eee;
			top:0;
			left:0;
			right:0; 
		}
		#side-navi {
			position:absolute;
			width:200px;
			background:#E5FAE3;
			top:30px;
			left:0; bottom:0;
			right:0; 
			overflow:auto;
			padding:5px;
			border-right:2px solid black;
		}
		#ad {
			/*
			position:absolute;
			bottom:0;
			background:#E5FAE3 url('/blog/img/back.jpg') no-repeat 0px -150px;
			width:190px;
			height:100px;
			*/
		}
		#essay-list {
			background:#FAEF97;
			position:absolute;
			/*
			background:#eee url("/blog/css/a.jpg") repeat-y;
			*/
			width:300px;
			top:30px;
			left:200px; bottom:0;
			right:0; 
			overflow:auto;
			padding:5px 10px;
			border-right:2px solid black;
			background-image: 
		}
		.list-view {
			margin:0; padding:0;
		}
		.essay-list-item {
			cursor:pointer;
			height:80px;
			border-bottom:2px solid red;
		}
		#essay-container {
			position:absolute;
			/*
			*/
			background:#FAEF97;
			top:30px;
			left:500px; bottom:0;
			right:0; 
			overflow:auto;
		}
		#essay-info-bar {
			padding:3px;
			height:40px;
			border-bottom:1px solid #aaa;
		}
		.essay {
			padding:30px;
		}
		.essay h4 {
			text-align:center;
			font-size:30px;
			margin-bottom:20px;
		}
/** ---------------------------------------------------------------------
 * 覆盖 jQuery UI 不合适的样式
.ui-widget-overlay {
	background-color: #ccc;
}
 */
.ui-dialog .ui-dialog-content {
	overflow:hidden;
}
	</style>

</head>

<body>
	<?php Yii::app()->bootstrap->register(); ?>
	<div class="container-fluid">
			<?php echo $content; ?> 
	</div>
	<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'general-dialog',
		'options'=>array(
			'modal' => true,
			'title'=>'General Title',
			'autoOpen'=>false,
			'resizable'=>false,
			'width'=>'auto',
			'hide'=>'fade',
			'show'=>'fade',
		),
	));
	$this->endWidget('zii.widgets.jui.CJuiDialog'); 
	?>
</body>
</html>
