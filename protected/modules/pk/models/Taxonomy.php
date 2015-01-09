<?php

/**
 * This is the model class for table "{{taxonomy}}".
 *
 * The followings are the available columns in table '{{taxonomy}}':
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $category
 * @property string $parent
 * @property integer $position
 * @property string $note
 */
class Taxonomy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Taxonomy the static model class
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
		return '{{taxonomy}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('category', 'required'),
			array('position', 'numerical', 'integerOnly'=>true),
			array('name, note', 'length', 'max'=>200),
			array('slug, category', 'length', 'max'=>80),
			array('parent', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, slug, category, parent, position, note', 'safe', 'on'=>'search'),
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
			'explanations'=>array(self::MANY_MANY, 'Explanation', 'ts_explanation_taxonomy(taxonomy_id, explanation_id)'),
			'clips'=>array(self::MANY_MANY, 'Clip', 'ts_clip_taxonomy(taxonomy_id, clip_id)'),
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
			'slug' => 'Slug',
			'category' => 'Category',
			'parent' => 'Parent',
			'position' => 'Position',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'*',
				),
				'defaultOrder'=>array(
					'category' => CSort::SORT_ASC,
					'position' => CSort::SORT_ASC,
				),
			),
		));
	}

	public static function sv($category, $taxonomyString , $id, $action) {
		$taxonomy = explode(',',$taxonomyString);

		if ($action == 'update') 
		{
			if ($category == 'Explanation') 
			{
				ExplanationTaxonomy::model()->deleteAllByAttributes(array(
					'explanation_id'=> $id,
				));
			} 
			else if ($category == 'Clip') 
			{
				ClipTaxonomy::model()->deleteAllByAttributes(array(
					'clip_id'=> $id,
				));
			}
		}
		foreach ($taxonomy as $t) {
			$name = trim($t);	
        
			$_t = Taxonomy::model()->findByAttributes(array(
				'category' => $category,
				'name'=>$name,
			));
        
			if (!$_t) {
				$_t = new Taxonomy;
				$_t->name = $name;
				$_t->category = $category;
				$_t->save();
			}
			if ($category == 'Explanation')
			{
				$et = new ExplanationTaxonomy;
				$et->explanation_id = $id;
			} 
			else if ($category == 'Clip')
			{
				$et = new ClipTaxonomy;
				$et->clip_id = $id;
			}
			$et->taxonomy_id = $_t->id;
			$et->save();
		}
	}
	/**
	 * for update action of clip and explanation
	 */
	public static function getTaxonomyString( $type, $id )
	{
		if ($type == 'Explanation') 
		{
			$map = ExplanationTaxonomy::model()->findAllByAttributes(array(
				'explanation_id' => $id,
			));
		} else if ($type == 'Clip') 
		{
			$map = ClipTaxonomy::model()->findAllByAttributes(array(
				'clip_id' => $id,
			));
		}
		if (sizeof($map) > 0) {
			foreach ($map as $m) {
				$a[] = $m->taxonomy->name;
			}
			return implode(', ',$a);
		} else {
			return null;
		}
	}
}
