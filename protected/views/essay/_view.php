<div id="essay-info-bar">
	<div class="pull-left">
		<?php
		echo CHtml::link($data->essay->category->name, Yii::app()->request->baseUrl.'/essay/category/'.$data->essay->category->name);
		if ($link = Essay::getLabelLinks($data->essay->id)) {
			echo ', Labels: '.$link;
		}
		?>
		Created: <?php echo date('Y/n/j',strtotime($data->essay->c_time)); ?>
		, Updated: <?php echo date('Y/n/j',strtotime($data->essay->m_time)); ?>
	</div>
	<div class="pull-right">
		<?php 
		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'success', 
			'label'=>'Quick Update',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'EssayCU',
				'data-action' => 'update',
				'data-id' => $data->essay->id,
				'accesskey' => 'q',
			),
		));
		echo '&nbsp;&nbsp;';
		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'primary', 
			'label'=>'Update',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'EditContent',
				'data-id' => $data->essay->id,
				'accesskey' => 'u',
			),
		));
		echo '&nbsp;&nbsp;';

		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'info', 
			'label'=>'Save',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'UpdateContent',
				'data-id' => $data->essay->id,
				'accesskey' => 's',
			),
		));
		echo '&nbsp;&nbsp;';

		$this->widget('bootstrap.widgets.Button', array(
			'buttonType'=>'button', 
			'type'=>'danger', 
			'label'=>'Delete',
			'size' => 'xs',
			'htmlOptions' => array(
				'class' => 'EssayDelete',
				'data-id' => $data->essay->id,
			),
		));
		?> 
	</div>
</div>
<div class="essay">
	<h4>
		<?php echo CHtml::link(CHtml::encode($data->essay->title), '/blog/essay/view/'.$data->essay->id); ?>
	</h4>
	<div id="content">
		<?php
			$Parsedown = new Parsedown();
			echo $Parsedown->text(str_replace($keyword,'<span style="background:yellow;">'.$keyword.'</span>',$data->essay->content));
		?>
<?php
	// Show andro's media data
	$dirstr = Yii::app()->params['androMediaBaseDir'].'/photo/'.date('Y/m',strtotime($data->essay->c_time));
	if (is_dir($dirstr)) {
		if ($data->essay->category->id == '19' and $fileLists = scandir( $dirstr )) {
			foreach ($fileLists as $name) {
				$info = explode('.',$name);
				if (sizeof($info) == 3 and $info[0] == date('Ymd',strtotime($data->essay->c_time)) ) {
					echo '<img src="/media/andro/photo/'.date('Y/m/',strtotime($data->essay->c_time)).$name.'" title="'.$info[1].'" />'."\n";
				}
			}
		}
	}
?>
	</div>

</div>
