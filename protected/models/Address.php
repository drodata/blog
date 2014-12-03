<?php

/**
 * This is the model class for table "{{address}}".
 *
 * The followings are the available columns in table '{{address}}':
 * @property string $address_id
 * @property integer $company_id
 * @property integer $is_main
 * @property integer $visible
 * @property string $contacter
 * @property string $duty
 * @property integer $country_id
 * @property string $province
 * @property string $city
 * @property string $street
 * @property string $zip
 * @property string $office_phone
 * @property string $cell_phone
 * @property string $fax
 */
class Address extends CActiveRecord
{
	// Virtual Attributes
	public $company_search;
	public $supplier_company;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Address the static model class
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
		return '{{address}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('duty, contacter, cell_phone', 'required'),
			array('company_id, is_main, visible, country_id', 'numerical', 'integerOnly'=>true),
			array('contacter, office_phone, cell_phone', 'length', 'max'=>30),
			array('duty', 'length', 'max'=>40),
			array('province, city, zip, fax', 'length', 'max'=>20),
			//array('street', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('contacter, office_phone, cell_phone, company_search,supplier_company', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'address_id' => 'ID',
			'company_id' => 'Company',
			'is_main' => 'Is Main',
			'visible' => 'Visible',
			'contacter' => '联系人',
			'duty' => '职务',
			'country_id' => 'Country',
			'province' => 'Province',
			'city' => 'City',
			'street' => 'Street',
			'zip' => 'Zip',
			'office_phone' => '办公电话',
			'cell_phone' => '手机',
			'fax' => 'Fax',
		);
	}
	/**				2012.12.11
	 * 快递公司的删除键实际上是“隐藏”
	 */
	public function hide()
	{
		$this->visible=0;
		$this->update(array('visible'));
	}
	public function setPrimary()
	{
		if ($this->is_main==0)
		{
			$m = Address::getPriAddr($this->company_id);
			$m->is_main=0;
			$m->update(array('is_main'));
			$this->is_main=1;
			$this->update(array('is_main'));
		}
	}
	/**
	 * 客户详情中主发货地址所需的所有信息
	 *
	 */
	public function getPriAddr($customer_id)
	{
		return Address::model()->findByAttributes(array('is_main'=>1,'company_id'=>$customer_id));
	}
	/**
	 * 客户详情中一般发货地址所需的所有信息
	 *
	 */
	public function getCmnAddrs($customer_id)
	{
		//return Address::model()->findAllByAttributes(array('is_main'=>0,'company_id'=>$customer_id));
		$criteria=new CDbCriteria();
		$criteria->compare('company_id',$customer_id);
		$criteria->compare('is_main',0);
		$dataProvider=new CActiveDataProvider('Address', array(
			'criteria'=>$criteria,
		));
		return $dataProvider;
	}
	public function getReadableAddr($address_id)
	{
		$d=Address::model()->findByPk($address_id);
		return ($d->country->iso3 == 'CHN')
			? $d->province.$d->city.$d->street
			: $d->street.','.$d->city.' '.$d->province.', '.$d->country->slug;
	}

	public function getSupplierData($company_id)
	{
		return Address::model()->findByAttributes(array('company_id'=>$company_id,));
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
		$criteria->with = array('company');

		$criteria->compare('company.category',Company::CATEGORY_LOGISTICS);
		$criteria->compare('visible',1);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('office_phone',$this->office_phone,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('company.full_name',$this->company_search,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			),
			'sort'=>array(
				'attributes'=>array(
					'company_search'=>array(
						'asc'=>'CONVERT(company.full_name USING gbk) ASC',
						'desc'=>'CONVERT(company.full_name USING gbk) DESC',
						'label'=>'物流公司［营业分部］',
					),
					'*',
				),
				'defaultOrder'=>array(
					'company_search'=>CSort::SORT_ASC,
				),
			),
		));
	}
	public function searchSupplier()
	{
		$criteria=new CDbCriteria;
		$criteria->with = array('company');

		$criteria->compare('company.category',Company::CATEGORY_SUPPLIER);
		$criteria->compare('visible',1);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('office_phone',$this->office_phone,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('company.full_name',$this->supplier_company,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			),
			'sort'=>array(
				'attributes'=>array(
					'supplier_company'=>array(
						'asc'=>'CONVERT(company.full_name USING gbk) ASC',
						'desc'=>'CONVERT(company.full_name USING gbk) DESC',
						'label'=>'公司名称',
					),
					'*',
				),
				'defaultOrder'=>array(
					'supplier_company'=>CSort::SORT_ASC,
				),
			),
		));
	}
}
