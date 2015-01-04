	<div class="alert alert-warning">
		<?php 
		$this->beginWidget('CMarkdown', array('purifyOutput'=>false));
			echo $data->content; 
		$this->endWidget('CMarkdown');
		?>
		<p>
			<?php echo $data->section->source->name.', @'.$data->c_time; ?>
			<?php echo CHtml::link('Update',Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/update?id='.$data->id); ?>
		</p>
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
