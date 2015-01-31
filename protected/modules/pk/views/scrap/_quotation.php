<?php
foreach ($quotations as $quotation)
{
?>
<p>
	<b><?=$quotation->explanation->vocabulary->name?></b>:
	<i><?=$quotation->explanation->explanation?></i>
	 | <i><?=$quotation->note?></i>
</p>
<?php
}
?>
