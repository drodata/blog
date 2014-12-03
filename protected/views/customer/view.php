<?php
/* @var $this CustomerController */
/* @var $model Address */

$this->breadcrumbs=array(
	'客户'=>array('/customer'),
	'查看详情',
);

?>

<h3>客户“<?php echo $model->company->full_name; ?>“ 详情</h3>


<div id="" class="colorBox middle ready lf">
	<div class="colorBoxH">
		<?=$model->contacter?>
		<span class='rf'> <?php echo CHtml::link('修改',array('customer/update?id='.$model->company_id)); ?></span>
	</div>
	<div class="colorBoxM">
		<ul class="divTable addressInfo">
			<li class="cL">公司名称：</li>
			<li class="cR"><?=$model->company->full_name?></li><div class="cf"></div>
			<li class="cL">助记简称：</li>
			<li class="cR"><?=$model->company->short_name?></li><div class="cf"></div>
			<li class="cL">联系人：</li>
			<li class="cR"><?=$model->contacter?></li><div class="cf"></div>
			<li class="cL">职务：</li>
			<li class="cR"><?=$model->duty?></li><div class="cf"></div>
			<li class="cL">联系地址：</li>
			<li class="cR"><?=Address::getReadableAddr($model->address_id)?></li><div class="cf"></div>
			<li class="cL">办公电话：</li>
			<li class="cR"><?=$model->office_phone?></li><div class="cf"></div>
			<li class="cL">手机：</li>
			<li class="cR"><?=$model->cell_phone?></li><div class="cf"></div>
			<li class="cL">邮编：</li>
			<li class="cR"><?=$model->zip?></li><div class="cf"></div>
			<li class="cL">传真：</li>
			<li class="cR"><?=$model->fax?></li><div class="cf"></div>
		</ul>
	</div>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>Address::getCmnAddrs($model->company_id),
	'itemView'=>'_commonaddr',
	'template'=>"{items}\n{pager}",
	'emptyText'=>'',
)); ?>
<div id="" class="colorBox middle sent lf">
	<div class="colorBoxH">&nbsp;</div>
	<div class="colorBoxM"><center>
		<?php echo CHtml::link('新建发货地址',array('customer/create?id='.$model->company_id)); ?>
	</center></div>
	<center>&nbsp;</center>
</div>
