<?php
$opt  = str_replace("\n","<br>",$data->content);
$opt .= '<br><br>'; 
$opt .= date('Y年m月d日 G:i',strtotime($data->time));
$opt .= ', '.$data->category; 
$opt .= ', '.CHtml::link(CHtml::encode('修改'), array('update', 'id'=>$data->id));
$opt .= ', '.CHtml::link(
	CHtml::encode('删除'), 
	array('delete', 'id'=>$data->id), 
	array (
		'class'=>'ddelete',
		'onclick'=>'{'.CHtml::ajax(array(
			'url'=>$this->createUrl('motd/delete',array("id"=>$data->id,"ajax"=>"delete")),
			'beforeSend'=>'js:function(){if(confirm("Really?"))return true; else return false;}',
			'success'=>'js:function(html){alert("Done");}',
		)).'return false;}',
	)
);
?>

<div class="view">
	<?=$opt?>
</div>
