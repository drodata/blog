<?php

class LogisticsForm extends CFormModel
{
	public $full_name;
	public $duty;
	public $contacter;
	public $cell_phone;
	public $office_phone;

	public $id; // address_id
	public $company_id;

	public function rules()
	{
		return array(
			array('full_name,contacter,cell_phone', 'required','on'=>'newLogistics'),
			array('company_id,contacter,cell_phone', 'required','on'=>'newBranch'),
			// 这一行若没有，非必填项数据将保存不进去，换句话说，所有与数据表格有关连的 attributes 都必须在此声明
			array('duty,office_phone', 'length', 'max'=>40),
		);
	}

	public function attributeLabels()
	{
		return array(
			'full_name'=>'公司名称',
			'company_id'=>'公司名称',
			'duty'=>'分部名称',
			'contacter'=>'联系人',
			'cell_phone'=>'手机',
			'office_phone'=>'固定电话',
		);
	}
}
