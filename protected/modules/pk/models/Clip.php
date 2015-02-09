<?php

/**
 * This is the model class for table "{{clip}}".
 *
 * The followings are the available columns in table '{{clip}}':
 * @property string $id
 * @property string $title
 * @property string $note
 * @property string $c_time
 * @property string $scrap_id
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
		return array(
			array('scrap_id', 'required'),
			array('scrap_id', 'length', 'max'=>20),
			array('title', 'length', 'max'=>100),
			array('note', 'safe'),
			array('id, scrap_id, title, note, c_time', 'safe', 'on'=>'search'),
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
			'scrap' 	=> array(self::BELONGS_TO, 'Scrap', 'scrap_id'),
			'taxonomies' =>array(
				self::MANY_MANY, 'Taxonomy', 'ts_map(f_id, t_id)',
				'condition' => 'taxonomies_taxonomies.category="ClipTaxonomy"'
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
			'title' => 'Title',
			'note' => 'Note',
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
		$criteria->compare('scrap_id',$this->scrap_id);
		$criteria->compare('title',$this->content,true);
		$criteria->compare('note',$this->note,true);
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
		$taxonomies = Clip::model()->findByPk($clipId)->taxonomies;
		if (sizeof($taxonomies) > 0) {
			foreach ($taxonomies as $t) {
				$a[] = '<span data-taxonomy-id="'.$t->id.'" class="label label-default">'.$t->name.'</span>';
			}
		}
		$a[] = '<span>
			<i class="fa fa-plus" data-id="'.$clipId.'"></i>
		</span>';
		return implode('',$a);
	}
}
