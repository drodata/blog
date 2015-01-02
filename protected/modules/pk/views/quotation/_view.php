	<h4>
		<?php echo $data->explanation->vocabulary->name.': '.$data->explanation->native_explanation;?>
	</h4>
	<div class="well">
		<?php 
		$this->beginWidget('CMarkdown', array('purifyOutput'=>false));
			echo $data->content; 
		$this->endWidget('CMarkdown');
		?>
		<p>
			<?php echo $data->section->source->name.', @'.$data->c_time; ?>
			<?php echo CHtml::link('Update',Yii::app()->request->baseUrl.'/'.$this->id.'/update?id='.$data->id); ?>
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
<hr>

