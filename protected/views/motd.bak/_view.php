<?php
$opt  = str_replace("\n","<br>",$data->content);
$opt .= '<br><br>'; 
$opt .= date('Y年m月d日 G:i',strtotime($data->time));
$opt .= ', '.$data->category; 
$opt .= ', '.CHtml::link(CHtml::encode('Detail'), array('view', 'id'=>$data->id));
?>

<div class="view">
	<?=$opt?>
</div>

