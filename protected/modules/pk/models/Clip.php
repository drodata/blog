<?php

/**
 * This is the model class for table "{{clip}}".
 *
 * The followings are the available columns in table '{{clip}}':
 * @property string $id
 * @property string $section_id
 * @property string $title
 * @property string $content
 * @property string $note
 * @property string $anchor
 * @property string $c_time
 */
class Clip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clip the static model class
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
		return '{{clip}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('section_id, content', 'required'),
			array('section_id', 'length', 'max'=>20),
			array('title', 'length', 'max'=>100),
			array('anchor', 'length', 'max'=>100),
			array('content, note, c_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, section_id,title, content, note, anchor, c_time', 'safe', 'on'=>'search'),
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
			'section' 	=> array(self::BELONGS_TO, 'Section', 'section_id'),
			'taxonomies'	=>array(self::MANY_MANY, 'Taxonomy', 'ts_clip_taxonomy(clip_id, taxonomy_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'section_id' => 'Section',
			'title' => 'Title',
			'content' => 'Content',
			'note' => 'Note',
			'anchor' => 'Anchor',
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
		$criteria->compare('section_id',$this->section_id,true);
		$criteria->compare('title',$this->content,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('anchor',$this->anchor,true);
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
	/**
	 * for view action
	 */
	public static function taxonomyString( $clipId )
	{
		$a = array();
		$map = ClipTaxonomy::model()->findAllByAttributes(array(
			'clip_id' => $clipId,
		));
		if (sizeof($map) > 0) {
			foreach ($map as $m) {
				$a[] = '<span class="label label-default">'.$m->taxonomy->name.'</span>';
			}
		}
		$a[] = '<span>
			<i class="fa fa-plus" data-id="'.$clipId.'"></i>
		</span>';
		return implode('',$a);
	}
}
