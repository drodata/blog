	<h5>
		<?php echo $data->title;?>
	</h5>
	<div class="well">
		<?php 
		$this->beginWidget('CMarkdown', array('purifyOutput'=>false));
			echo $data->content; 
		$this->endWidget('CMarkdown');
		?>
		<p>
			<?php echo $data->section->source->name.', @'.$data->c_time; ?>
			<?php echo CHtml::link('Update',Yii::app()->request->baseUrl.'/pk/clip/update?id='.$data->id); ?>
		</p>
	</div>
	<?php
	if ($data->note) {
	?>
		<div>
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
