<?php

class CustomerForm extends CFormModel
{
	public $full_name;
	public $short_name;
	public $type; 		//客户种类：国内客户或国外客户
	public $country_id;
	public $province_ml;
	public $city_ml;
	public $province_ab;
	public $city_ab;
	public $street;
	public $contacter;
	public $duty;
	public $cell_phone;
	public $office_phone;
	public $zip;
	public $fax;
	public $site;
	public $action; // create or update
	public $addressType; // 地址类型 'primary','common'

	public function rules()
	{
		return array(
			array('full_name,short_name,type,country_id,province_ml,street,contacter', 'required'),
			// 这一行若没有，非必填项数据将保存不进去，换句话说，所有与数据表格有关连的 attributes 都必须在此声明
			array('province_ab,city_ml,city_ab,zip,duty,cell_phone,office_phone,fax,site', 'length', 'max'=>40),
		);
	}

	public function attributeLabels()
	{
		return array(
			'full_name'=>'公司全称',
			'short_name'=>'助记简称',
			'type'=>'客户种类',
			'country_id'=>'国家',
			'province_ml'=>'省份/直辖市',
			'province_ab'=>'州名',
			'city_ml'=>'城市',
			'city_ab'=>'城市',
			'street'=>'区县/街道名称',
			'contacter'=>'联系人',
			'duty'=>'职务',
			'cell_phone'=>'手机',
			'office_phone'=>'固定电话',
			'zip'=>'邮编',
			'fax'=>'传真',
			'site'=>'网址',
		);
	}
}
