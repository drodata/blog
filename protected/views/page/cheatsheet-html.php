<?php $this->beginWidget('CMarkdown'); ?>
### jQuery wrapper

	[html]
	<script type="text/javascript"> 
		$(document).ready(function(){
			$('#modal-trigger-1').click(function(){
				$('#myModal').modal();
			});
		});
	</script>
### Table

	[html]
	<table class="table">
		<thead>
			<tr>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
			</tr>
		</tbody>
	</table>
<?php $this->endWidget('CMarkdown'); ?>
