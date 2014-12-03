<?php

/**
 * This is the model class for table "{{city}}".
 *
 * The followings are the available columns in table '{{city}}':
 * @property integer $id
 * @property integer $pid
 * @property string $name
 */
class City extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return City the static model class
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
		return '{{city}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, name', 'required'),
			array('pid', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, pid, name', 'safe', 'on'=>'search'),
			array('pid, name', 'safe', 'on'=>'search'),
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
			'pid' => '所属省份',
			'name' => '名称',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
	}
	public function getProvinceList()
	{
		$model = City::model()->findAllByAttributes(array('pid'=>0));
		return CHtml::listData($model, 'name', 'name');
	}
	public function getProvinceIdList()
	{
		$model = City::model()->findAllByAttributes(array('pid'=>0));
		return CHtml::listData($model, 'id', 'name');
	}

	public function getCityList($pid)
	{
		$model = City::model()->findAllByAttributes(array('pid'=>$pid));
		return CHtml::listData($model, 'name', 'name');
	}

	public function getCityName($id)
	{
		$model = City::model()->findByPk($id);
		return $model->name;
	}
}
