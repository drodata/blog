<?php

/**
 * This is the model class for table "{{folder}}".
 *
 * The followings are the available columns in table '{{folder}}':
 * @property string $id
 * @property string $name
 * @property string $parent
 * @property integer $position
 */
class Folder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Folder the static model class
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
		return '{{folder}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, parent', 'required'),
			array('position', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('parent', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent, position', 'safe', 'on'=>'search'),
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
			'clips' 	=> array(self::HAS_MANY, 'Clip', 'folder_id'),
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
			'parent' => 'Parent',
			'position' => 'Position',
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
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('position',$this->position);

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
	public function treeList($parent=0, $indent=0) {

		//$indent_str = '__';
		$indent_str = "&nbsp;&nbsp;&nbsp;&nbsp;";
		//$indent_str = '  ';
		$criteria = new CDbCriteria;
		$criteria->compare('parent',$parent);
		$criteria->order = 'CONVERT(name USING gbk) ASC';
		$results = Folder::model()->findAll($criteria);

		if ($results) {
			foreach ($results as $r) {
				$a[$r->id] = str_repeat($indent_str,$indent).$r->name;

				$criteria = new CDbCriteria;
				$criteria->compare('parent',$r->id);
				$criteria->order = 'CONVERT(name USING gbk) ASC';
				$sub_results = Folder::model()->findAll($criteria);

				if ($sub_results) {
					$new_indent = $indent + 1;
					$a += self::treeList($r->id,$new_indent);
				}
			}
			return $a;
		}

	}
	public static function getTopLevelFolderTree() {
		$criteria = new CDbCriteria;
		$criteria->compare('parent',0);
		$criteria->order = 'CONVERT(name USING gbk) ASC';
		$results = Folder::model()->findAll($criteria);
		$opt = '';
		if ($results) {
			$opt .= '<ul>';
			foreach ($results as $r) {
				$children = self::model()->findAllByAttributes(array('parent' => $r->id));
				$class = sizeof($children) == 0 ? '' : 'jstree-closed';
				$opt .= '<li id="floder-'.$r->id.'" class="'.$class.'">'.$r->name.'</li>';
			}
			$opt .= '</ul>';
			return $opt;
		}
	}
}
