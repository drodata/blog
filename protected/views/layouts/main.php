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
	<!-- Highlight.js ['tomorrow-night-blue','github']-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/highlight-style/github.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/highlight.pack.js"></script>
	<!-- Misc -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jq.boxy.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.trekshot.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js?time=<?=time()?>"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />

	<script type="text/javascript"> 
	$(document).ready(function(){
		// activate hihglight.js plugin
		hljs.initHighlightingOnLoad();
	});
	</script>

	<style type="text/css">

		/* change hljs style */
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
		
		.container #content { 
			margin-top:50px;
		}
		.essay #content h1,
		.essay #content h2,
		.essay #content h3,
		.essay #content h4,
		.essay #content h5,
		.essay #content h6,
		.essay #content blockquote {
			font-family: "Sans Serif", "WenQuanYi Zen Hei" ;
			padding-top:20px;
		}

		.essay #content h2 { border-top: 5px solid #999; }
		.essay #content h3 { border-top: 3px solid #aaa; }
		.essay #content h4 { border-top: 1px solid #eee; }

		.essay #content p ,
		.essay #content li {
			font-size:16px;
			/*
			font-family: Georgia,"Droid sans", "WenQuanYi Zen Hei" ;
			*/
			font-family: Georgia,"Droid sans","WenQuanYi Zen Hei" ;
		}

		label.radio,
		label.radio-inline,
		label.checkbox,
		label.checkbox-inline {
			font-weight:normal;
		}
		.essay #content img {
			display:block;
			padding:5px;
			border:1px solid #ddd;
			margin:10px 0;
			max-width:100%;
		}
		.essay #content p {
			line-height: 1.8em;
		}
		.border-1 {
			border-right:1px solid #333;
			border-bottom:1px solid #333;
		}

		#side-navi {
			position:absolute;
			width:200px;
			background:#E5FAE3;
			top:50px;
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
			position:absolute;
			/*
			background:#FAEF97;
			background:#eee url("/blog/css/a.jpg") repeat-y;
			*/
			width:300px;
			top:50px;
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
			background:#FAEF97;
			*/
			top:50px;
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
		.essay h4.center {
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

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#blog-navi">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a accesskey="h" class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">
				<?php echo Yii::app()->name; ?></a>
		</div> 
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="#blog-navi">
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<?php echo $this->renderPartial('application.modules.pk.views.vocabulary._search');?>
				</div>
			</form>
			<ul class="nav navbar-nav">
				<li><?php echo CHtml::link('Pk', Yii::app()->request->baseUrl.'/pk',array( 'accesskey'=>'p',)); ?></li>
				<li><?php echo CHtml::link('CV', Yii::app()->request->baseUrl.'/pk/vocabulary/create',array( 'accesskey'=>'v',)); ?></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=Yii::app()->user->name?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?=CHtml::link('logout', array('site/logout'))?></li>
					</ul>
				</li>
			</ul>
			
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
	<div class="container-fluid">
			<?php echo $content; ?> 
	</div>

	<div class="modal fade" id="general-modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Information</h4>
				</div>

				<div class="modal-body">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<!--
					<button type="button" class="btn btn-primary">Save changes</button>
					-->
				</div>
			</div>
		</div>
	</div>
	<?php
	/*
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
	*/
	?>
</body>
</html>
