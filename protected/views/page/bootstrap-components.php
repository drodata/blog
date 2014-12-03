<?php $this->beginWidget('CMarkdown'); ?>

# Components
<p class="bg-primary" style="padding:15px;">
	持续更新中……
</p>
<span class="label label-warning">Warning</span>


## Glyphicons

> glyph [ɡlɪf]: 图象字符

截至目前，已接触到三种类似字体：Glyphicons, font awesome 和 ionicons.
使用方法大同小异，还是使用 Bootstrap 内置的吧。

### How to use

将下面的代码放至在任意需要的地方。

	[html]
	<span class="glyphicon glyphicon-home"></span>
注意图标和文字间放一个空格。例：

	[html]
	<button class="btn btn-primary btn-xs">
		<span class="glyphicon glyphicon-home"></span> Home
	</button>
输出：
<button class="btn btn-primary btn-xs">
	<span class="glyphicon glyphicon-home"></span> Home
</button>

## Navs

### Tabs

	[html]
	<ul class="nav nav-tabs">
		<li class="active"><a href="#">Home</a></li>
		<li><a href="#">Profile</a></li>
		<li><a href="#">Messages</a></li>
	</ul>
输出：
<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Messages</a></li>
			</ul>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>

## Dropdowns

	[html]
	<div class="dropdown">
		<button class="btn btn-default btn-xs" id="dropdownMenu2" data-toggle="dropdown">
			More
			<span class="caret"></span>
		</button>
        
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
		</ul>
	</div>
输出
<div class="dropdown">
	<button class="btn btn-default btn-sm" id="xdropdownMenu2" data-toggle="dropdown">
		More<span class="caret"></span>
	</button>

	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
		<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
		<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
	</ul>
</div>

## Panels `.panel`

这是一个类似自己创建的`Box` Widget 的 Component, 主要就是把内容放入一个个“盒子”
中。每个“盒子”包括三个部分：header, body 和 footer, 
其中 header 和 footer 不是必须。

### Basic example

最简单的用法就是只含有 Panel body `.panel-body`

	[html]
	<div class="panel panel-primary">
		<div class="panel-body">
			Simplest panel example
		</div>
	</div>
输出：
<div class="panel panel-primary">
	<div class="panel-body">
		Simplest panel example
	</div>
</div>


<div class="panel panel-success">
	<div class="panel-heading">
		Panel Heading
	</div>
	<div class="panel-body">
		Panel content
	</div>
	<div class="panel-footer">
		Panel Footer
	</div>
</div>

## Well `.well`,`.well-lg`, `.well-sm` （像井一样凹陷的效果）

<div class="well well-sm bg-success">
	Text in the well. ;)
</div>
<?php $this->endWidget('CMarkdown'); ?>

