<?php

/**
 * This is the model class for table "{{clip_taxonomy}}".
 *
 * The followings are the available columns in table '{{clip_taxonomy}}':
 * @property string $id
 * @property string $clip_id
 * @property string $taxonomy_id
 */
class ClipTaxonomy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{clip_taxonomy}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clip_id, taxonomy_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, clip_id, taxonomy_id', 'safe', 'on'=>'search'),
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
			'clip' 		=> array(self::BELONGS_TO, 'Clip', 'clip_id'),
			'taxonomy' 	=> array(self::BELONGS_TO, 'Taxonomy', 'taxonomy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'clip_id' => 'Clip',
			'taxonomy_id' => 'Taxonomy',
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
		$criteria->compare('clip_id',$this->clip_id,true);
		$criteria->compare('taxonomy_id',$this->taxonomy_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClipTaxonomy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
