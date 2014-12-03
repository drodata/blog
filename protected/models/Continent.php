<?php

/**
 * This is the model class for table "{{continent}}".
 *
 * The followings are the available columns in table '{{continent}}':
 * @property string $id
 * @property string $name
 * @property string $cn_name
 * @property string $slug
 */
class Continent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Continent the static model class
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
		return '{{continent}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,cn_name,slug', 'required'),
			array('name', 'length', 'max'=>255),
			array('cn_name', 'length', 'max'=>10),
			array('slug', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, cn_name, slug', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => '英文名称',
			'cn_name' => '中文名称',
			'slug' => '缩写',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cn_name',$this->cn_name,true);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getContinentIdList()
	{
		$model = Continent::model()->findAll();
		return CHtml::listData($model, 'id', 'name');
	}
	public function getContinentList()
	{
		$model = Continent::model()->findAll();
		return CHtml::listData($model, 'name', 'name');
	}
}
