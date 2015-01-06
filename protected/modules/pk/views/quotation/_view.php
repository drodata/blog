<div class="well">
	<?php 
	$this->beginWidget('CMarkdown', array('purifyOutput'=>false));
		echo $data->content; 
	$this->endWidget('CMarkdown');
	?>
	<i>
		<?php echo $data->section->source->name.', @'.$data->c_time; ?>
		<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id.'/quotation/update?id='.$data->id?>">
			<i class="fa fa-pencil"></i>
		</a>
	</i>
</div>
	<?php
	if ($data->note) {
	?>
		<div class="">
		<p>
		<?php 
		$this->beginWidget('CMarkdown', array('purifyOutput'=>false));
			echo $data->note; 
		$this->endWidget('CMarkdown');
		?>
		</p>
		</div>

	<?php
	}
	?>
