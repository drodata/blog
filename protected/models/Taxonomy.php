<?php

/**
 * This is the model class for table "{{taxonomy}}".
 *
 * The followings are the available columns in table '{{taxonomy}}':
 * @property string $term_id
 * @property string $term_name
 * @property string $term_slug
 * @property string $term_taxonomy
 * @property string $term_note
 * @property string $term_parent
 */
class Taxonomy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Taxonomy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{taxonomy}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('term_name, term_note', 'length', 'max'=>200),
			array('term_slug, term_taxonomy', 'length', 'max'=>80),
			array('term_parent', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('term_id, term_name, term_slug, term_taxonomy, term_note, term_parent', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'term_id' => 'Term',
			'term_name' => 'Term Name',
			'term_slug' => 'Term Slug',
			'term_taxonomy' => 'Term Taxonomy',
			'term_note' => 'Term Note',
			'term_parent' => 'Term Parent',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('term_id',$this->term_id,true);
		$criteria->compare('term_name',$this->term_name,true);
		$criteria->compare('term_slug',$this->term_slug,true);
		$criteria->compare('term_taxonomy',$this->term_taxonomy,true);
		$criteria->compare('term_note',$this->term_note,true);
		$criteria->compare('term_parent',$this->term_parent,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
