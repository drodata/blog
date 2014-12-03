<?php $this->beginWidget('CMarkdown'); ?>
# PHP Cheat Sheet

## `date()` Parameters

<table class="table table-stripped table-condensed">
	<thead>
		<tr>
			<th>Character</th>
			<th>Example</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><code>Y-m-d H:i:s</code></td>
			<td><code>2011-05-25 16:55:00</code></td>
		</tr>
		<tr>
			<td><code>y/n/j G:i</code></td>
			<td><code>01/6/9 9:18</code></td>
		</tr>
	</tbody>
</table>

## `header()`实现页面跳转

	[php]
	header("location: http://www.outstanding.com.hk/eo/");
.
<?php $this->endWidget('CMarkdown'); ?>
