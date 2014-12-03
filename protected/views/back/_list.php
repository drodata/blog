<div class="essay-list-item" data-essay-id="<?=$data->essay->id?>">
	<div class="title">
	<span><u> <?= $data->essay->title ?> </u></span>
	</div>
	<div class="content">
		<b>
		<?php echo date('y-n-j',strtotime($data->essay->c_time)); ?>
		</b>
		<?php
			mb_internal_encoding("UTF-8");
			echo mb_substr(strip_tags($data->essay->content), 0, 20).'……';
		?>
	</div>
</div>
