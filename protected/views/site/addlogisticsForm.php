<?php
return array(
	'title' => '请输入登录信息',

	'elements' => array(
		'company'=>array(
			'type'=>'form',
			'title'=>'名称信息',
			'elements'=>array(
				'full_name' => array (
					'type' => 'text',
					'maxLength' => 64,
					'label' => '公司名称',
				),
			),
		),
		'address'=>array(
			'type'=>'form',
			'title'=>'联系信息',
			'elements'=>array(
				'duty' => array (
					'type' => 'text',
					'maxLength' => 32,
					'label' => '分部名称',
				),
				'contacter' => array (
					'type' => 'text',
					'maxLength' => 32,
					'label' => '联系人',
				),
				'cell_phone' => array (
					'type' => 'text',
					'maxLength' => 32,
					'label' => '手机',
				),
				'office_phone' => array (
					'type' => 'text',
					'maxLength' => 32,
					'label' => '固定电话',
				),
			),
		),
	),

	'buttons' => array(
		'create' => array (
			'type' => 'submit',
			'label' => '创建物流公司',
		),
	),
);
?>

