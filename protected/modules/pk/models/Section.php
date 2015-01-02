<?php

/**
 * This is the model class for table "{{section}}".
 *
 * The followings are the available columns in table '{{section}}':
 * @property string $id
 * @property string $source_id
 * @property string $name
 * @property string $link
 * @property string $parent
 * @property integer $position
 */
class Section extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Section the static model class
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
		return '{{section}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('source_id, name', 'required'),
			array('position', 'numerical', 'integerOnly'=>true),
			array('source_id, parent', 'length', 'max'=>20),
			array('name', 'length', 'max'=>50),
			array('link', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, source_id, name, link, parent, position', 'safe', 'on'=>'search'),
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
			'source' 	=> array(self::BELONGS_TO, 'Source', 'source_id'),
			'clips' 	=> array(self::HAS_MANY, 'Clip', 'section_id'),
			'quotations' 	=> array(self::HAS_MANY, 'Quotation', 'section_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'source_id' => 'Source',
			'name' => 'Name',
			'link' => 'Link',
			'parent' => 'Parent',
			'position' => 'Position',
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
		$criteria->compare('source_id',$this->source_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('link',$this->name,true);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'source_id' => CSort::SORT_ASC,
					'parent' => CSort::SORT_ASC,
				),
			),
		));
	}
}
