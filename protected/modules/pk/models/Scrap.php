<?php

/**
 * This is the model class for table "{{scrap}}".
 *
 * The followings are the available columns in table '{{scrap}}':
 * @property string $id
 * @property string $content
 * @property integer $page
 * @property string $section_id
 */
class Scrap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{scrap}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, section_id', 'required'),
			array('content', 'filter', 'filter' => array($obj=new CHtmlPurifier(),'purify')),
			array('page', 'numerical', 'integerOnly'=>true),
			array('section_id', 'length', 'max'=>20),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, page, section_id', 'safe', 'on'=>'search'),
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
			'clips' 	=> array(self::HAS_MANY, 'Clip', 'scrap_id'),
			'quotations' 	=> array(self::HAS_MANY, 'Quotation', 'scrap_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'page' => 'Page',
			'section_id' => 'Section',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('page',$this->page);
		$criteria->compare('section_id',$this->section_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Scrap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
