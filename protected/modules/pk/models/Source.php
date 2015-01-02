<?php

/**
 * This is the model class for table "{{source}}".
 *
 * The followings are the available columns in table '{{source}}':
 * @property string $id
 * @property string $name
 * @property string $author
 * @property integer $type
 * @property string $link
 * @property string $note
 */
class Source extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Source the static model class
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
		return '{{source}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('author', 'length', 'max'=>20),
			array('link', 'length', 'max'=>100),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, author, type, link, note', 'safe', 'on'=>'search'),
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
			'sections' 	=> array(self::HAS_MANY, 'Section', 'source_id'),
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
			'author' => 'Author',
			'type' => 'Type',
			'link' => 'Link',
			'note' => 'Note',
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
		$criteria->compare('author',$this->author,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'type' => CSort::SORT_ASC,
					'name' => CSort::SORT_ASC,
				),
			),
		));
	}

	public function nameList()
	{
		$model = Source::model()->findAll();
		return CHtml::listData($model, 'id', 'name');
	}
	public function completeList()
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'CONVERT(name USING gbk) ASC';
		$sources = self::model()->findAll($criteria);

		$values = array();
		if ($sources) {
			foreach ($sources as $r) {
				$values[ $r->name ] = self::sectionList($r->id);
			}
		}
		return $values;
	}

	public function sectionList($sourceId, $parent=0, $indent=0) {

		$indent_str = "&nbsp;&nbsp;&nbsp;&nbsp;";
		$criteria = new CDbCriteria;
		$criteria->compare('source_id',$sourceId);
		$criteria->compare('parent',$parent);
		$criteria->order = 'position';
		$sections = Section::model()->findAll($criteria);

		if ($sections) {
			foreach ($sections as $r) {
				$a[$r->id] = str_repeat($indent_str,$indent).$r->name;

				$criteria = new CDbCriteria;
				$criteria->compare('source_id',$sourceId);
				$criteria->compare('parent',$r->id);
				$criteria->order = 'position';
				$sub_sections = Section::model()->findAll($criteria);

				if ($sub_sections) {
					$new_indent = $indent + 1;
					$a += self::sectionList($sourceId, $r->id,$new_indent);
				}
			}
			return $a;
		}

	}
	/*
	public function sectionList($sourceId, $a=array(), $parent=0, $indent=0) {

		$sections = Section::model()->findAllByAttributes(array(
			'source_id' => $sourceId,
			'parent' => $parent,
		));
		if ($sections) {
			foreach ($sections as $r) {
				$a[$r->id] = $r->name;

				$sub_sections = Section::model()->findAllByAttributes(array(
					'source_id' => $sourceId,
					'parent' => $r->id,
				));

				if ($sub_sections) {
					$new_indent = $indent + 1;
					$b = self::sectionList($sourceId, $a, $r->id,$new_indent);
					$a = array_merge($a,$b);
				}
			}
			return $a;
		}

	}
	*/
}
