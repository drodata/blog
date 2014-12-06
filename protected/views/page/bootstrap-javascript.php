<?php $this->beginWidget('CMarkdown'); ?>
# JavaScript

## Overview

### Individual or complied
本节介绍的所有 JS 特效都包含在`bootstrap.js`中。
使用这些插件有两种方式。

### Markup API (Data attributes)
Bootstrap 中的这些 JavaScript plugins 可以通过 *markup API* 来实现，
而不需要写任何JavaScript代码。

禁用 *data attribute API*, 可将 namespace 为 `data-api` 的文档内所有元素
都 'unbind' 之：

	[javascript]
	$(ducument).off('.data-api');
若想仅禁用某一个 plugin, 只需在 namespace 前加上 plugin 名称即可：

	[javascript]
	$(ducument).off('.alert.data-api');
### Programmatic API (Javascript Code)

> All public APIs are *single*, chainable methods, 
> and return the collection acted upon.

查看`bootstrap.js`文件可理解此处 'single'的含义。

## Modals

> Overlapping modals not supported
> 
> Be sure <span class="text-danger">not to open a modal while another is 
> still visible.</span> 
> Showing more than one modal at a time requires custom code.

Modal 虽轻巧，但它不支持重叠弹窗，从这点来说，还是 jQuery UI 更适合自己。

使用 *markup API* 方式创建的 Modal 分为两个部分：Modal 本身和触发显示 Modal
的按钮：

	[html]
	<!-- Trigger Button -->
	<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
		Launch demo modal
	</button>
	<!-- Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				
				<div class="modal-body">
					...
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
输出:
<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
	Click to meet modal effect of Bootstrap
</button>

<!-- Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			
			<div class="modal-body">
				...
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

对触发按钮而言：

1. `data-toggle="modal"` 就是 *markup API*, 
   Bootstrap 中很多插件都带有 `data-toggle` attribute, 其值表示 plugin 的名称，
   例如：`tooltip`, `collapse`等；
2. `data-target` 指定 Modal 的 ID;

对 Modal 来说：

1. `id` 为必须，和触发按钮的 `data-target` 值对应；
2. 必须有`.modal` base class, `.fade` 淡入淡出效果可选；
3. 其它以 `.modal-` 开头的 class 都需包括；
4. `.modal-lg` 和 `.modal-sm` 两个可选的 classes 用于控制尺寸，使用时加进 `.modal-dialog` 所在 div 内即可；
   
    	  	[html]
		<div class="modal fade" id="myModal">
			<div class="modal-dialog modal-sm">
				...
			</div>
		</div>
5. 背后发生的事。当 Modal 出现时，Bootstrap 在 `<body>` 标签中加入 
   `.modal-open` 用以覆盖原有的窗口滚动条，同时生成一个类名为
   `.modal-backdrop` 的 div, 该 div 生成 Modal 周围的阴影区域，
   用户点击此区域时，Modal 将会关闭；

以上是用 *data attributes* 的方法来触发 Modal, 用 JavaScript 
代码触发用如下一行代码即可：

	[javascript]
	$('#myModal').modal(options);
### Options
<button id="modal-trigger-1" class="btn btn-default btn-xs">
	Trigger Modal With JavaScrpt Code</button>
<script type="text/javascript"> 
	$(document).ready(function(){
		$('#modal-trigger-1').click(function(){
			$('#myModal').modal();
			//$('#myModal').on('shown.bs.modal', function(e){ });
		});
	});
</script>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Option Name</th>
			<th>Type</th>
			<th>Default Value</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><code>backdrop</code></td>
			<td>boolean or the string <code>static</code></td>
			<td><code>true</code></td>
			<td>
				<ul>
					<li><code>true</code>: 带阴影，点击阴影关闭Modal</li>
					<li><code>false</code>: 不带阴影</li>
					<li><code>'static'</code>: 带阴影，点击阴影没有反应</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td><code>keyboard</code></td>
			<td>boolean</td>
			<td><code>true</code></td>
			<td>按下 <kbd>Esc</kbd> 时是否关闭 Modal.</td>
		</tr>
		<tr>
			<td><code>show</code></td>
			<td>boolean</td>
			<td><code>true</code></td>
			<td>
				Show the modal when initialized, 值为 <code>flase</code> 时，
				可通过 <code>$('#myModal').modal('show');</code> 来触发.
			</td>
		</tr>
		<tr>
			<td><code>remote</code></td>
			<td>path</td>
			<td><code>false</code></td>
			<td>
				通过设置 remote URL 可将 Modal 的内容分离出去，
				通过 jQuery 的 <code>load</code> method 
				<b>加载一次</b>并注入（inject）<code>.modal-content</code> div 内。

			</td>
		</tr>
	</tbody>
</table>

以上 options 均可通过 *data attributes* 的方式添加，方法是添加 
`data-optionName` attribute, 如 `data-keyboard="false"`.


### Methods


- `.modal(options)`
- `.modal('toggle')` <span class="label label-danger">do NOT understand</span>
- `.modal('show')`
- `.modal('hide')`

### Events

- `show.bs.modal`
- `hide.bs.modal`
- `shown.bs.modal`
- `hidden.bs.modal` 当 Modal 关闭后触发的自定义事件；如：
		
		[javascript]
		$('#myModal').on('hidden.bs.modal', function (e) {
			// do something...
		});
- `loaded.bs.modal`

## Tooltips and Popovers

这两个插件感觉一般，没有 qTip2 好用。

<button id="tooltip-btn-a" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
	<span class="glyphicon glyphicon-home"></span>
</button>
<button id="popover-btn-a" class="btn btn-default">
	Popover Button Demo
</button>
<script type="text/javascript"> 
	$(document).ready(function() {
		$('#tooltip-btn-a').tooltip();
		$('#popover-btn-a').popover({
			trigger:'hover',
			content: '<p>Hello from Popover</p><p>Good</p>',
			html: true,
			title: 'Confirm',
		});
		$('#button-btn-1').click(function(){
			var btn = $(this);
			btn.button('loading');
			$.post('/blog/page/ajaxTest', '', function(response) {
				btn.data('completeText', response.message);
				btn.button('reset');
			});
		});

		// Buttons
	});
</script>
## Buttons
<button type="button" autocomplete="off" id="button-btn-1" class="btn btn-primary btn-sm" data-loading-text="正在提交，请稍后……">Loading state</button>
## Tabs

	[html]
	<ul class="nav nav-tabs">
		<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
		<li><a href="#profile" data-toggle="tab">Profile</a></li>
		<li><a href="#messages" data-toggle="tab">Messages</a></li>
		<li><a href="#settings" data-toggle="tab">Settings</a></li>
	</ul> 
	<div class="tab-content">
		<div class="tab-pane active" id="home">...</div>
		<div class="tab-pane" id="profile">...</div>
		<div class="tab-pane" id="messages">...</div>
		<div class="tab-pane" id="settings">...</div>
	</div>
输出：
<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4" style="border:0px solid #eee;">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
				<li><a href="#profile" data-toggle="tab">Profile</a></li>
				<li><a href="#messages" data-toggle="tab">Messages</a></li>
				<li><a href="#settings" data-toggle="tab">Settings</a></li>
			</ul> 
        
			<div class="tab-content">
				<div class="tab-pane active" id="home">...</div>
				<div class="tab-pane" id="profile">...</div>
				<div class="tab-pane" id="messages">...</div>
				<div class="tab-pane" id="settings">...</div>
			</div>

		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<?php $this->endWidget('CMarkdown'); ?>

