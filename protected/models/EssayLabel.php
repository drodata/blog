<?php

/**
 * This is the model class for table "{{essay_label}}".
 *
 * The followings are the available columns in table '{{essay_label}}':
 * @property string $id
 * @property string $essay_id
 * @property string $label_id
 */
class EssayLabel extends CActiveRecord
{
	public $title;
	public $category;
	public $keyword;
	public $label_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EssayLabel the static model class
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
		return '{{essay_label}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('essay_id', 'required'),
			array('essay_id, label_id', 'length', 'max'=>20),
			// Please remove those attributes that should not be searched.
			array('id, essay_id, label_id, category, label_name, keyword, title', 'safe', 'on'=>'search'),
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
			'essay' 	=> array(self::BELONGS_TO, 'Essay', 'essay_id'),
			'label' 	=> array(self::BELONGS_TO, 'Label', 'label_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'essay_id' => 'Essay',
			'label_id' => 'Label',
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
		$criteria->alias = 'map';
		$criteria->distinct = true;
		$criteria->group = 'map.essay_id';
		$criteria->with = array('essay', 'label');

		$criteria->compare('essay.category_id',$this->category);
		$criteria->compare('essay.content',$this->keyword, true);
		$criteria->compare('essay.title',$this->title, true);
		$criteria->compare('label.name',$this->label_name, true);

		$criteria->order = 'essay.c_time DESC';
		$criteria->addNotInCondition('essay.category_id', array(3,19)); // hardcode ('andro', 'life')

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getLists($args)
	{
		$criteria=new CDbCriteria;
		$criteria->alias = 'map';
		$criteria->group = 'essay_id';
		$criteria->with = array('essay', 'label');
		if ($args['category_id'])
			$criteria->compare('essay.category_id', $args['category_id']);
		if ($args['label_name'])
			$criteria->compare('label.name', $args['label_name']);
		if ($args['keyword'])
			$criteria->compare('essay.content', $args['keyword'], true);
		if ($args['ym'])
			$criteria->compare('DATE_FORMAT(essay.c_time,"%Y%m")', $args['ym']);
		$criteria->limit = 20;
		if ($args['offset'])
			$criteria->offset = $args['offset'];

		$criteria->order = 'essay.c_time DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}
}
