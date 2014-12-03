<?php $this->beginWidget('CMarkdown'); ?>
## Overview

### HTML5 doctype

Bootstrap 使用了很多 HTML5 中才有的元素和 CSS 样式，因此，在使用 Bootstrap 前，
需要使用 HTML5 样式的 doctype:

	[html]
	<!DOCTYPE html>
	<html lang="en">
		...
	</html>
### Typography and links

## Grid system

Grid system 通过创建一系列“行”和“列”来控制页面显示框架，
不同于表格中的行（`<tr>`）和列（`<td>`），Grid stystem 采用 DIV 和 
CSS表示行与列。

### 工作原理

- 行必须放在`.container`(特定宽度)或`.container-fluid` (full-width)内，
  这两个样式可提供很好的对齐及 padding;
- 使用行来创建一系列水平的列;
- 内容放至在列内，列放至在行内；
- 列于列之间的间隙（gutters）用`padding`控制，

	>That padding is offset in rows for the first and last column 
	> via negative margin on `.row`s.

### Column ordering 作用不大
`.col-md-push-*` 和`.col-md-pull-*`用来方便地控制水平行内列之间的顺序

<div class="container" style="width:700px;">
	<div class="row">
		<div class="col-sm-8 border-1">
		hello
		</div>
		<div class="col-sm-4 border-1">
		gogo
		</div>
	</div>
</div>

## Typography

### Headings
`.h1`到`.h6`可快速设置标题样式.

### Abbreviations `.abbr` (缩写词)

	[html]
	<abbr title="HyperText Markup Language">HTML</abbr>
输出：<abbr title="HyperText Markup Language">HTML</abbr>.

## Code

- `<kbd>`显示键盘输入样式，如 <kbd>vim</kbd>

## Blockquotes

### Default blockquote

`<blockquote>` 可以包含任意 HTML 元素，最常用的是引用一段话（straight quotes），
这种情况下，推荐使用`<p>`标签：

	[html]
	<blockquote>
		<p>Respect is earned, not demanded.</p>
	</blockquote>
输出：
<blockquote>
	<p>Respect is earned, not demanded.</p>
</blockquote>

### Blockquote options

#### Naming a source
引用一段话一般都有出处，`<footer>` 标签用于指明出处：

	[html]
	<blockquote>
		<p>Respect is earned, not demanded.</p>
		<footer>An web article</footer>
	</blockquote>
输出：
<blockquote>
	<p>Respect is earned, not demanded.</p>
	<footer>An web article</footer>
</blockquote>

注意到出处前面有个很漂亮的折线，此折线是通过如下 CSS 样式实现的：

	[css]
	/* Line 651 in bootstrap.css (v3.1.1)*/
	blockquote footer::before, 
	blockquote small::before,
	blockquote .small::before {
		content: '— 014 \00A0';
	}

## Table

### Basic style
只需在`<table>`内加上`.table`，即可享用 Bootstrap 预设的默认表格样式，如：

	[html]
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>E-Mail</th>
				<th>Scenario</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>kuixy@163.com</td>
				<td>Work</td>
			</tr>
			<tr>
				<td>2</td>
				<td>kuixy@qq.com</td>
				<td>Life</td>
			</tr>
		</tbody>
	</table>
输出（注：此输出应用的有下面提到的其它样式，如`.info`）：
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>E-Mail</th>
			<th>Scenario</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>kuixy@163.com</td>
			<td>
			Work<br>
			Work<br>
			Work<br>
			Work<br>
			Work<br>
			Work<br>
			Work<br>
			</td>
		</tr>
		<tr>
			<td>2</td>
			<td>kuixy@qq.com</td>
			<td>Life</td>
		</tr>
		<tr class="info">
			<td>3</td>
			<td>yalongdiamong@foxmail.com</td>
			<td>Company</td>
		</tr>
	</tbody>
</table>

注意：为达到最佳显示效果，养成在表格中使用`<thead>`和`<tbody>`的习惯。

### Striped rows
在`<table>`中添加`.table-stiped`即可显示奇偶行（`<tbody>`内）
反色显示的效果（zebra-striping 斑马条纹）.

	[html]
	<table class="table table-striped">
		...
	</table>
类似的样式还有：

1. `table-bordered`: 添加边框；
2. `table-hover`
3. `table-condensed`: 紧凑型表格；
4. `.active`, `.success`, `.info`, `.warning`, `.danger`：
   用于`<tr>`或`<td>`内显示彩色背景；

## Forms
### Basic examples
Bootstap 中常见的一个表单格式如下：

	[html]
	<form>
		<div class="form-group">
			<label >Email</label>
			<input type="email" class="form-control">
		</div>
		<div class="form-group">
			<label >Password</label>
			<input type="password" class="form-control">
		</div>
	</form>
输出：
	<form>
		<div class="form-group">
			<label >Email</label>
			<input type="email" class="form-control">
		</div>
		<div class="form-group">
			<label >Password</label>
			<input type="password" class="form-control">
		</div>
	</form>

要点：

1. 表单各元素间用`.form-group`包裹，该类设置`<label>`与表单元素间的间隔；
2. 带有`.form-control`的文本类元素，如`<input>`, `<textarea>` 和 `<select>`,
   宽度为`width:100%`.

### Inline form `.form-inline`

### Horizontal form `.form-horizontal` 
这是自己用得最多的一种样式。

	[html]
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" >Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control">
			</div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" >Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control">
		</div>
	</div>
</form>

要点：

1. 所有`<label>`含有`.control-label`;
2. 所有表单元素用`<div class="col-sm-*">` 包裹，与
   `<label class="control-label col-sm-*">`一起形成两列，
   `<form class="form-horizontal">`内的`<div class="control-group">`
   具有和 Grid system 中`.row`一样的特性；

### Radio Buttons and Check box

由于 Radio buttons 和 Check boxes 元素本身也含有`<label>`元素，
默认会粗体显示，为了和`<label class="control-label">`加以区分，
需要将这些样式重新设置为`normal`.

	[css]
	label.radio,
	label.radio-inline,
	label.checkbox,
	label.checkbox-inline {
		font-weight:normal;
	}
#### Default (Stacked) `.radio`, `.checkbox`（像堆栈一样上下排列）

	[html]
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" >Blood Type</label>
			<div class="col-sm-10">
				<label class="radio">
					<input type="radio" name="type" value="a">
					A
				</label>
				<label class="radio">
					<input type="radio" name="type" value="b">
					B
				</label>
				<label class="radio">
					<input type="radio" name="type" value="c">
					O
				</label>
				<label class="radio">
					<input type="radio" name="type" value="d">
					AB
				</label>
			</div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" >Blood Type</label>
		<div class="col-sm-10">
			<label class="radio">
				<input type="radio" name="type" value="a">
				A
			</label>
			<label class="radio">
				<input type="radio" name="type" value="b">
				B
			</label>
			<label class="radio">
				<input type="radio" name="type" value="c">
				O
			</label>
			<label class="radio">
				<input type="radio" name="type" value="d">
				AB
			</label>
		</div>
	</div>
</form>

#### Inline `.radio-inline`, `.checkbox-inline`

	[html]
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" >Favourite fruit:</label>
			<div class="col-sm-10">
				<label class="checkbox-inline">
					<input type="checkbox" name="fruit[]" value="a">
					Banana
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="fruit[]" value="b">
					Apple
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="fruit[]" value="c">
					Orange
				</label>
			</div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" >Favourite fruits:</label>
		<div class="col-sm-10">
			<label class="checkbox-inline">
				<input type="checkbox" name="fruit[]" value="a">
				Banana
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="fruit[]" value="b">
				Apple
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="fruit[]" value="c">
				Orange
			</label>
		</div>
	</div>
</form>

### Static control `p.form-control-static` 

用于放至文本内容，

	[html]
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" >Email</label>
			<div class="col-sm-10">
				<p class="form-control-static">kuixy@163.com</p>
			</div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" >Email</label>
		<div class="col-sm-10">
			<p class="form-control-static">kuixy@163.com</p>
		</div>
	</div>
</form>

### Validation states `.has-error`, `.has-warning` and `.has-success`

有三种验证样式：Error (`.has-error`), Warning (`.has-warning`) 和
Success (`.has-success`). 使用时，添加至`<div class="form-group">` 后，
所有`.control-label`, `.form-control` 和 `.help-block` 都将接收到此样式。

	[html]
	<form class="form-horizontal">
		<div class="form-group has-error">
			<label class="col-sm-2 control-label" >Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control">
			</div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group has-error">
		<label class="col-sm-2 control-label" >Email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control">
		</div>
	</div>
</form>

输出：
<form class="form-horizontal">
	<div class="form-group has-error has-feedback">
		<label class="col-sm-2 control-label" >Email</label>
		<div class="col-sm-10">
			<label class="radio-inline"> <input type="radio" name="sex" value="a">ggo</label>
			<label class="radio-inline"> <input type="radio" name="sex" value="b">ggo</label>
			<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
		</div>
	</div>
</form>

### Control sizing

#### Height sizing `.input-lg`, `.input-sm`
可配合 `.btn-lg`, `.btn-sm` 使用，达到尺寸一致的效果。

	[html]
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" >Email</label>
			<div class="col-sm-10">
				<input type="text" class="input-sm form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" ></label>
			<div class="col-sm-10">
				<button class="btn btn-sm btn-success">Submit</button>
			</div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" >Email</label>
		<div class="col-sm-10">
			<input type="text" class="input-sm form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" ></label>
		<div class="col-sm-10">
			<a href="#" class="btn btn-sm btn-success">Submit</a>
		</div>
	</div>
</form>

#### Column sizing

默认的 `.form-control` 元素宽度值都是 100%, 将其放在 Grid system columns 
中达到控制宽度的目的。

	[html]
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" >Email</label>
			<div class="col-sm-4">
				<input type="text" class="form-control">
			</div>
			<div class="col-sm-6"></div>
		</div>
	</form>
输出：
<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" >Email</label>
		<div class="col-sm-4">
			<input type="text" class="form-control">
		</div>
		<div class="col-sm-6"></div>
	</div>
</form>
## Buttons

- `btn` 必须；
- 样式：`btn-[default, primary, success, info, warning, danger, link]`
- 尺寸：`btn-[lg, sm, xs]`
- Block level buttons: `btn-block`;
- Disabled state: 向`<button>`中添加`disabled`属性。例如:
  <button class="btn btn-default btn-xs" disabled>A Disabled Button</button>

以上样式可在`<a>`, `<button>` 和`<input>`中使用。
这意味这可以用：

	[html]
	<a class="btn btn-default btn-xs" href="#" role="button">A Link Button</a>
方便创建一个按钮样式的链接，如
<a class="btn btn-default btn-xs" href="#" role="button">A Link Button</a>

## Images

- `img-responsive`;
- `img-rounded`;
- `img-circle`;
- `img-thumbnail`;

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<img class="img-responsive img-rounded" src="<?php echo Yii::app()->request->baseUrl; ?>/img/ts.jpg">
		</div>
		<div class="col-md-4">
			<img class="img-responsive img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/ts.jpg">
		</div>
		<div class="col-md-4">
			<img class="img-responsive img-thumbnail" src="<?php echo Yii::app()->request->baseUrl; ?>/img/ts.jpg">
		</div>
	</div>
</div>

## Helper classes

1. 字体颜色：`.text-primary`等；
2. 背景颜色：`.bg-primary`等；
3. 关闭符号 &times; 
   `<button type="button" class="close" aria-hidden="true">&times;</button>`
4. 下拉提示符（Carets）<span class="caret"></span>:
   `<span class="caret"></span>`
5. 左右 floats: `.pull-left`, `.pull-right`
6. Clear float: `.clearfix`;
7. 内容居中对齐：`.center-block`;

综合上面的样式创建如下一个提醒：
<div class="center-block bg-warning" style="width:70%;padding:10px;">
   	<button type="button" class="close pull-right" aria-hidden="true">&times;</button>
	<div class="text-danger">
		I'm a tip.
	</div>
	<p class="text-primary pull-right">
		Text floated right.
	</p>
	<div class="clearfix"></div>
</div>


<?php $this->endWidget('CMarkdown'); ?>
