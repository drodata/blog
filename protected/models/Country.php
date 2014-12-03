<?php

/**
 * This is the model class for table "{{country}}".
 *
 * The followings are the available columns in table '{{country}}':
 * @property string $id
 * @property integer $continent_id
 * @property string $code
 * @property string $name
 * @property string $slug
 * @property string $cn_slug
 * @property string $iso3
 * @property integer $number
 */
class Country extends CActiveRecord
{
	public $continent_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return '{{country}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('continent_id, code, name, slug, iso3, number', 'required'),
			array('continent_id, number', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>2),
			array('name, slug', 'length', 'max'=>255),
			array('cn_slug', 'length', 'max'=>50),
			array('iso3', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, continent_id, code, name, slug, cn_slug, iso3, number,continent_name', 'safe', 'on'=>'search'),
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
			'continent' => array(self::BELONGS_TO, 'Continent', 'continent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'continent_id' => 'Continent',
			'code' => 'Code',
			'name' => 'Name',
			'slug' => 'Slug',
			'cn_slug' => 'Cn Slug',
			'iso3' => 'Iso3',
			'number' => 'Number',
			'continent_name' => 'Continent',
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

		$criteria->with = array('continent');
		$criteria->compare('id',$this->id,true);
		$criteria->compare('continent_id',$this->continent_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('cn_slug',$this->cn_slug,true);
		$criteria->compare('iso3',$this->iso3,true);
		$criteria->compare('number',$this->number);

		$criteria->compare('continent.name',$this->continent_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'continent_name'=>array(
						'asc'=>'continent.name',
						'desc'=>'continent.name DESC',
					),
					'*',
				),
			),
		));
	}
	public function getCountryList()
	{
		$model = Country::model()->findAll();
		return CHtml::listData($model, 'id', 'slug');
	}
}
