<div class="clip-item">
<h4><?=$data->explanation->vocabulary->name?></h4>
<blockquote>
	<?=$parsedown->text($data->scrap->content)?>
	<footer>
		<i>
		<?php 
		echo CHtml::link(
			$data->scrap->section->name,
			Yii::app()->request->baseUrl.'/'.$this->module->id.'/section/view?id='.$data->scrap->section->id, array(
				'title' => 'view all clips in '.implode(' - ', Section::nameList($data->scrap->section->id)),
				'rel' => 'tooltip',
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
			<?php
			echo CHtml::link(
				'<i class="fa fa-pencil"></i>',
				Yii::app()->request->baseUrl.'/'.$this->module->id.'/quotation/update?id='.$data->id
				.'&redirect='.urlencode(Yii::app()->request->url), array(
			));
			?>
		</p>
		</div>

	<?php
	}
	?>
</div>
