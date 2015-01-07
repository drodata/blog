<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>


	<!-- jQuery plugins -->
	<!-- 	Highlight.js ['tomorrow-night-blue', 'github']-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/highlight-style/github.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/highlight.pack.js"></script>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js?time=<?=time()?>"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.trekshot.js"></script>

	<!-- jstree -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jstree/themes/default/style.min.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/jstree/jstree.min.js"></script>

	<script type="text/javascript"> 
		$(document).ready(function(){
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

		#tree-navi {
		position: relative;
		float: left;
		height: 100%;
		background: #f8f8f8;
		border-right: 1px solid #d2d2d2;
			font-family:"Droid sans";
		}
		#slice-div {
			position: relative;
			float: left;
			width: 257px;
			border-right: 1px solid #d3d8db;
			border-bottom: none;
		}
		#slice-div {
			float:left;
			overflow:auto;
			margin-left:10px;
			width:auto;
			height:100%;
		}
		label.radio,
		label.radio-inline,
		label.checkbox,
		label.checkbox-inline {
			font-weight:normal;
		}
		#main {
			margin-top:50px;
			width:100%;
			height:100%;
		}
	</style>

</head>

<body>
	<?php Yii::app()->bootstrap->register(); ?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a accesskey="h" class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">
				<?php echo Yii::app()->name; ?></a>
		</div> 
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/source">Source</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/section">Section</a></li>

				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/clip">Clip</a></li>

				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/vocabulary">Vocabulary</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/explanation">Explanation</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/quotation">Quotation</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/taxonomy">Taxonomy</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pk/gii">Gii</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

	<div class="" id="main">
			<?php echo $content; ?> 
	</div>
	<div>
		<?php echo 'Yii Version: <code>'.Yii::getVersion().'</code>'; ?>, 
		<?php echo 'PHP Version: <code>'.phpversion().'</code>'; ?>
	</div><!-- footer -->
</body>
</html>
