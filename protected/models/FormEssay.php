<?php

class FormEssay extends CFormModel
{
	public $id;
	public $title;
	public $status;
	public $category;
	public $label;
	public $c_date;

	public $action;

	// Search Mode
	public $keyword;


	public function rules()
	{
		return array(
			array( 'title, c_date, status', 'required'),
			array( 'action, id, is_lock, category, label', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'title' 	=> '标题',
			'status' 	=> '状态',
			'category' 	=> '分类',
			'label' 	=> '标签',
			'c_date' 	=> '创建日期',
		);
	}
}
