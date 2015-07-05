<?php
return array(
	'title' => '请输入登录信息',

	'elements' => array(
		'username' => array (
			'type' => 'text',
			'maxLength' => 32,
			'label' => '用户名',
		),
		'password' => array (
			'type' => 'password',
			'maxLength' => 32,
			'label' => '口令',
		),
		'rememberMe' => array (
			'type' => 'checkbox',
			'label' => '记住我',
		),
	),

	'buttons' => array(
		'login' => array (
			'type' => 'submit',
			'label' => '登录',
		),
	),
);
?>

