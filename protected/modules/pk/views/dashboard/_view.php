	<h5>
		<?php echo $data->title;?>
	</h5>
	<blockquote>
		<?php 
		$this->beginWidget('CMarkdown', array('purifyOutput'=>false));
			echo $data->content; 
		$this->endWidget('CMarkdown');
		?>
		<footer>
			Folder: <?php echo $data->folder->name.', '.$data->section->source->name.', @'.$data->c_time; ?>
			<?php echo CHtml::link('Update',Yii::app()->request->baseUrl.'/pk/clip/update?id='.$data->id); ?>
		</footer>
	</blockquote>
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
