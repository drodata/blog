<div class="clip-item">
<h4>
	<?=$data->explanation->vocabulary->name?>
	<span class="h6">
		<?=Lookup::item('ExplanationClass',$data->explanation->class)?>: 
		<?=$data->explanation->explanation?>
	</span>
</h4>
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
<div class="">
	<?php
	if ($data->note)
		echo $parsedown->text($data->note);
	?>
	<p>
		<?php
		echo CHtml::link(
			'<i class="fa fa-pencil"></i>',
			Yii::app()->request->baseUrl.'/'.$this->module->id.'/quotation/update?id='.$data->id
			.'&redirect='.urlencode(Yii::app()->request->url), array(
					'title' => 'edit quotation',
		));
		?>
	</p>
	</div>
</div>
