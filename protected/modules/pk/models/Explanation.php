<?php

/**
 * This is the model class for table "{{explanation}}".
 *
 * The followings are the available columns in table '{{explanation}}':
 * @property string $id
 * @property string $vocabulary_id
 * @property integer $is_main
 * @property integer $class
 * @property string $explanation
 * @property string $native_explanation
 * @property string $example
 * @property string $synonym
 * @property string $compare
 * @property string $see_also
 * @property string $c_time
 */
class Explanation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Explanation the static model class
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
		return '{{explanation}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vocabulary_id, is_main, class, explanation', 'required'),
			array('is_main, class', 'numerical', 'integerOnly'=>true),
			array('vocabulary_id', 'length', 'max'=>20),
			array('native_explanation, example', 'length', 'max'=>200),
			array('explanation', 'length', 'max'=>300),
			array('synonym, compare, see_also', 'length', 'max'=>100),
			array('c_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vocabulary_id, is_main, class, explanation, native_explanation, example, synonym, compare, see_also, c_time', 'safe', 'on'=>'search'),
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
			'vocabulary' 	=> array(self::BELONGS_TO, 'Vocabulary', 'vocabulary_id'),
			'quotations' 	=> array(self::HAS_MANY, 'Quotation', 'explanation_id'),
			'taxonomies' =>array(
				self::MANY_MANY, 'Taxonomy', 'ts_map(f_id, t_id)',
				'condition' => 'taxonomies_taxonomies.category="ExplanationTaxonomy"'
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vocabulary_id' => 'Vocabulary',
			'is_main' => 'Is Main',
			'class' => 'Class',
			'explanation' => 'Explanation',
			'native_explanation' => 'Native Explanation',
			'example' => 'Example',
			'synonym' => 'Synonym',
			'compare' => 'Compare',
			'see_also' => 'See Also',
			'c_time' => 'C Time',
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
		$criteria->compare('vocabulary_id',$this->vocabulary_id,true);
		$criteria->compare('is_main',$this->is_main);
		$criteria->compare('class',$this->class);
		$criteria->compare('explanation',$this->explanation,true);
		$criteria->compare('native_explanation',$this->native_explanation,true);
		$criteria->compare('example',$this->example,true);
		$criteria->compare('synonym',$this->synonym,true);
		$criteria->compare('compare',$this->compare,true);
		$criteria->compare('see_also',$this->see_also,true);
		$criteria->compare('c_time',$this->c_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'id' => CSort::SORT_ASC,
				),
			),
		));
	}

	public function searchList()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->alias = 'explanation';
		$criteria->with = array('vocabulary');
		$criteria->compare('vocabulary.language',Vocabulary::LANGUAGE_ENGLISH);
		//$criteria->order = 'explanation.c_time ';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => false,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'c_time' => CSort::SORT_DESC,
				),
			),
		));
	}

	/**
	 * for view action
	 */
	public static function taxonomyString( $explanationId )
	{
		$a = array();
		$taxonomies = Explanation::model()->findByPk($explanationId)->taxonomies;
		if (sizeof($taxonomies) > 0) {
			foreach ($taxonomies as $t) {
				$a[] = '<span class="label label-default">'.$t->name.'</span>';
			}
			return implode('',$a);
		} else
			return null;
	}
}
