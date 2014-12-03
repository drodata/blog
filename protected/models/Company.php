<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property string $company_id
 * @property string $full_name
 * @property string $short_name
 * @property integer $category
 * @property string $site
 * @property string $c_time
 */
class Company extends CActiveRecord
{
	const CATEGORY_CUSTOMER  = 1;
	const CATEGORY_SUPPLIER  = 2;
	const CATEGORY_LOGISTICS = 3;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return '{{company}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('full_name, short_name', 'required'),
			array('full_name', 'required'),
			array('category', 'in', 'range'=>array(1,2,3)),
			array('full_name, site', 'length', 'max'=>128),
			array('short_name', 'length', 'max'=>30),
			array('full_name, short_name, category,c_time', 'safe', 'on'=>'search'),
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
			'addresses' => array(self::HAS_MANY, 'Address', 'company_id'),
			'banks' => array(self::HAS_MANY, 'Bank', 'company_id'),
		);
	}

	/**
	 * P113 4.4.11 Named Scopes <<Yii Guide>>
	 */
	public function scopes() {
		return array(
			'customer' => array(
				'condition' => 'category=1',
			),
			'logistics' => array(
				'condition' => 'category=3',
			),
			'recently' => array(
				'order' => 'create_time DESC',
				'limit' => 5,
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'company_id' => 'Company ID',
			'full_name' => '公司全称',
			'short_name' => '简称',
			'site' => '网址',
			'c_time' => '创建时间',
		);
	}
	protected function beforeSave() {
		if(parent::beforeSave()) {
			if($this->isNewRecord) {
				$this->c_time= new CDbExpression('NOW()');
			} else {
			}
			return true;
		} else
			return false;
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

		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('c_time',$this->c_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Get customer's dataProvider for CGridView
	 * sep-27-2012
	 */
	public function searchCustomer()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('c_time',$this->c_time,true);
		$criteria->compare('category',self::CATEGORY_CUSTOMER);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			),
			'sort'=>array(
				'attributes'=>array(
					'full_name'=>array(
						'asc'=>'CONVERT(full_name USING gbk) ASC',
						'desc'=>'CONVERT(full_name USING gbk) DESC',
					),
					'*',
				),
				'defaultOrder'=>array(
					'full_name'=>CSort::SORT_ASC
				),
				/*
				'defaultOrder'=>'CONVERT(full_name USING gbk) ASC'
				*/
			),
		));
	}

	public function getLogisticsFullNameList()
	{
		$model = Company::model()->findAllByAttributes(array('category'=>Company::CATEGORY_LOGISTICS));
		return CHtml::listData($model, 'company_id', 'full_name');
	}

}
