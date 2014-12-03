<?php

/**
 * This is the model class for table "{{bank}}".
 *
 * The followings are the available columns in table '{{bank}}':
 * @property string $bank_id
 * @property string $bank_name
 * @property string $account_name
 * @property string $account_number
 * @property string $company_id
 * @property string $type
 * @property string $company_bank_type
 */
class Bank extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bank the static model class
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
		return '{{bank}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_name, account_name, account_number, type', 'required'),
			array('bank_name, account_name', 'length', 'max'=>50),
			array('account_number', 'length', 'max'=>40),
			array('company_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>8),
			array('company_bank_type', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bank_id, bank_name, account_name, account_number, company_id, type, company_bank_type', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO,'Company','company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bank_id' => 'Bank',
			'bank_name' => 'Bank Name',
			'account_name' => 'Account Name',
			'account_number' => 'Account Number',
			'company_id' => 'Company',
			'type' => 'Type',
			'company_bank_type' => 'Company Bank Type',
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

		$criteria->compare('bank_id',$this->bank_id,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('account_number',$this->account_number,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('company_bank_type',$this->company_bank_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
