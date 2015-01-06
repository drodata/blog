<?=$vocabulary->name?>
<?=$vocabulary->pronunciation ? ' /'.$vocabulary->pronunciation.'/' : ''?>
<a href="<?=Yii::app()->request->baseUrl.'/'.$this->module->id.'/'.$this->id.'/update?id='.$vocabulary->id?>">
	<i class="fa fa-pencil"></i>
</a>
