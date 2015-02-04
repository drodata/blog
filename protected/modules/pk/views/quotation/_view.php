<div class="clip-item bg-warning">
<h4><?=$data->explanation->vocabulary->name?></h4>
<blockquote>
	<?=$parsedown->text($data->scrap->content)?>
	<footer>
		<i>
		<?php echo Quotation::getCompleteSource($data).', @'.date('Y-n-j', strtotime($data->c_time)); ?>
		<?php
		echo CHtml::link(
			'<i class="fa fa-pencil"></i>',
			Yii::app()->request->baseUrl.'/'.$this->module->id.'/quotation/update?id='.$data->id
			.'&redirect='.urlencode(Yii::app()->request->url), array(
		));
		?>
		</i>
	</footer>
</blockquote>
	<?php
	if ($data->note) {
	?>
		<div class="">
		<p>
		<?=$parsedown->text($data->note)?>
		</p>
		</div>

	<?php
	}
	?>
</div>
