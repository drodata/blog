<?php

/**
 * This is the model class for table "{{quotation}}".
 *
 * The followings are the available columns in table '{{quotation}}':
 * @property string $id
 * @property string $explanation_id
 * @property string $section_id
 * @property string $content
 * @property string $note
 * @property string $anchor
 * @property string $c_time
 */
class Quotation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Quotation the static model class
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
		return '{{quotation}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('explanation_id, section_id, content', 'required'),
			array('explanation_id, section_id', 'length', 'max'=>20),
			array('anchor', 'length', 'max'=>100),
			array('content, note, c_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, explanation_id, section_id, content, note, anchor, c_time', 'safe', 'on'=>'search'),
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
			'section' 	=> array(self::BELONGS_TO, 'Section', 'section_id'),
			'explanation' 	=> array(self::BELONGS_TO, 'Explanation', 'explanation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'explanation_id' => 'Explanation',
			'section_id' => 'Section',
			'content' => 'Content',
			'note' => 'Note',
			'anchor' => 'Anchor',
			'c_time' => 'C Time',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('explanation_id',$this->explanation_id,true);
		$criteria->compare('section_id',$this->section_id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('anchor',$this->anchor,true);
		$criteria->compare('c_time',$this->c_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'id' => CSort::SORT_ASC,
				),
			),
		));
	}

	public static function getCompleteSource($quotation) {
		$names = Section::nameList($quotation->section->id);
		array_unshift($names, $quotation->section->source->name);
		return implode(' - ', $names);
	}
}
