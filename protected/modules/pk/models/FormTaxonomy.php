<?php

class FormTaxonomy extends CFormModel
{
	public $taxonomy;


	public function rules()
	{
		return array(
			array( 'taxonomy', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'taxonomy' 	=> 'Taxonomy',
		);
	}
}

