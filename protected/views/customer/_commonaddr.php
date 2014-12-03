<div id="" class="colorBox middle sent lf">
	<div class="colorBoxH">
		<?=$data->contacter?>
		<span class='rf'> 
			<?php echo CHtml::link('修改',array('customer/update?id='.$data->company_id.'&address_id='.$data->address_id)); ?>
			| <?php echo CHtml::link('设为主地址',array('address/setprimary?id='.$data->address_id)); ?>
		</span>
	</div>
	<div class="colorBoxM">
		<ul class="divTable addressInfo">
			<li class="cL">联系人：</li>
			<li class="cR"><?=$data->contacter?></li><div class="cf"></div>
			<li class="cL">职务：</li>
			<li class="cR"><?=$data->duty?></li><div class="cf"></div>
			<li class="cL">联系地址：</li>
			<li class="cR"><?=Address::getReadableAddr($data->address_id)?></li><div class="cf"></div>
			<li class="cL">办公电话：</li>
			<li class="cR"><?=$data->office_phone?></li><div class="cf"></div>
			<li class="cL">手机：</li>
			<li class="cR"><?=$data->cell_phone?></li><div class="cf"></div>
			<li class="cL">邮编：</li>
			<li class="cR"><?=$data->zip?></li><div class="cf"></div>
			<li class="cL">传真：</li>
			<li class="cR"><?=$data->fax?></li><div class="cf"></div>
		</ul>
	</div>
</div>
