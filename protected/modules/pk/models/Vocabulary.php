<?php

/**
 * This is the model class for table "{{vocabulary}}".
 *
 * The followings are the available columns in table '{{vocabulary}}':
 * @property string $id
 * @property string $name
 * @property string $pronunciation
 * @property integer $language
 * @property integer $parent
 * @property string $compare
 */
class Vocabulary extends CActiveRecord
{
	const LANGUAGE_ENGLISH = 1;
	const LANGUAGE_MODERN_CHINESE = 2;
	const LANGUAGE_ANCIENT_CHINESE = 3;

	public $language = self::LANGUAGE_ENGLISH;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vocabulary the static model class
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
		return '{{vocabulary}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, language', 'required'),
			array('language, parent', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>40),
			array('pronunciation', 'length', 'max'=>20),
			array('compare', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pronunciation, language, parent, compare', 'safe', 'on'=>'search'),
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
			'explanations' 	=> array(self::HAS_MANY, 'Explanation', 'vocabulary_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'pronunciation' => 'Pronunciation',
			'language' => 'Language',
			'parent' => 'Parent',
			'compare' => 'Compare',
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
		$criteria->compare('pronunciation',$this->pronunciation,true);
		$criteria->compare('language',$this->language);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('compare',$this->compare,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'name' => CSort::SORT_ASC,
				),
			),
		));
	}
	public function nameList()
	{
		$model = Vocabulary::model()->findAll();
		return CHtml::listData($model, 'id', 'name');
	}
	public function completeList()
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'name ASC';
		$results = self::model()->findAll($criteria);

		$values = array();
		if ($results) {
			foreach ($results as $r) {
				$criteria=new CDbCriteria;
				$criteria->compare('vocabulary_id',$r->id);
				$criteria->order = 'is_main DESC, class ASC';
				$explanations = Explanation::model()->findAll($criteria);
				$sub_lists = array();
				foreach ($explanations as $s) {
					$sub_lists[$s->id] = Lookup::item('ExplanationClass',$s->class).': '.$s->native_explanation;
				}

				$values[ $r->name ] = $sub_lists;
			}
		}
		return $values;
	}
}
