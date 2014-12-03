<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->full_name,
);

?>

<h1>客户资料：<?php echo $model->full_name; ?></h1>
<h2>公司信息</h2>
	<table>
		<tr>
			<td>全称：</td>
			<td><?=$model->full_name?></td>
		</tr>
		<tr>
			<td>简称：</td>
			<td><?=$model->short_name?></td>
		</tr>
		<tr>
			<td>网址：</td>
			<td><?=$model->site?></td>
		</tr>
		<tr>
			<td>创建时间：</td>
			<td><?=$model->c_time?></td>
		</tr>
	</table>
<h2>地址信息</h2>
<?php
foreach ($model->addresses as $a) {
		
	$street = ($a->country->slug == 'China') 
		? $a->province.$a->city.$a->street
		: $a->street.', '.$a->city.' '.$a->province.', '.$a->country->slug;
?>
<table>
<tr><td>联系人：</td><td><?=$a->contacter?></td></tr>
<tr><td>地址：</td><td><?=$street?></td></tr>
<tr><td>固话：</td><td><?=$a->office_phone?></td></tr>
<tr><td>手机：</td><td><?=$a->cell_phone?></td></tr>
</table>
<?php
}
if (sizeof($model->banks)) {
	echo '<h2>银行帐户信息</h2>';
	foreach ($model->banks as $b) {
?>
<pre>
开户行：	<?=$b->bank_name?>

帐户名：	<?=$b->account_name?>

卡号:		<?=$b->account_number?>
</pre>
<?php
	}
}
?>



<?php?>
