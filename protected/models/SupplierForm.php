<?php

class SupplierForm extends CFormModel
{
	public $full_name;
	public $contacter;
	public $cell_phone;
	public $office_phone;
	public $bank_name;
	public $account_name;
	public $account_number;
	public $type;
	public $company_bank_type;

	public $createType;

	public function rules()
	{
		return array(
			array('full_name,contacter,bank_name,account_name,account_number,type', 'required'),
			array('cell_phone,office_phone,company_bank_type', 'length', 'max'=>40),
		);
	}

	public function attributeLabels()
	{
		return array(
			'full_name'=>'公司名称',
			'contacter'=>'联系人',
			'cell_phone'=>'手机',
			'office_phone'=>'固定电话',
			'bank_name'=>'开户银行',
			'account_name'=>'开户名称',
			'account_number'=>'卡号',
			'type'=>'帐户类别',
			'company_bank_type'=>'公司帐户类别',
		);
	}
}

?>
