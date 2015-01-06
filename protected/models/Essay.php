<?php

/**
 * This is the model class for table "{{essay}}".
 *
 * The followings are the available columns in table '{{essay}}':
 * @property string $id
 * @property string $title
 * @property string $status
 * @property string $is_lock
 * @property string $show_toc
 * @property integer $toc_cid
 * @property string $js_file
 * @property string $c_time
 * @property string $m_time
 */
class Essay extends CActiveRecord
{
	public $ym;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Essay the static model class
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
		return '{{essay}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,c_time', 'required'),
			array('title', 'length', 'max'=>140),
			array('status', 'length', 'max'=>7),
			array('show_toc', 'length', 'max'=>1),
			array('js_file', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, status, show_toc, toc_cid, js_file, c_time, m_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'category'=>array(self::BELONGS_TO, 'Category', 'category_id'),
			'labels'=>array(self::MANY_MANY, 'Label', 'ts_essay_label(essay_id, label_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '标题',
			'status' => '状态',
			'show_toc' => 'Show Toc',
			'toc_cid' => 'Toc Cid',
			'js_file' => 'Js File',
			'c_time' => '创建时间',
			'm_time' => 'M Time',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('show_toc',$this->show_toc,true);
		$criteria->compare('toc_cid',$this->toc_cid);
		$criteria->compare('js_file',$this->js_file,true);
		$criteria->compare('c_time',$this->c_time,true);
		$criteria->compare('m_time',$this->m_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getLabelString( $essayId )
	{
		$map = EssayLabel::model()->findAllByAttributes(array(
			'essay_id' => $essayId
		));
		if (sizeof($map) > 0) {
			foreach ($map as $m) {
				$a[] = $m->label->name;
			}
			return implode(', ',$a);
		} else {
			return null;
		}
	}

	public function getLabelLinks( $essayId )
	{
		$map = EssayLabel::model()->findAllByAttributes(array(
			'essay_id' => $essayId
		));
		if (sizeof($map) > 0) {
			foreach ($map as $m) {
				$a[] = '<span class="label label-default">'.$m->label->name.'</span>';
			}
			return implode('',$a);
		} else {
			return null;
		}

	}

	public static function getCreateYearMonthList() {
		$criteria=new CDbCriteria;
		$criteria->distinct = true;
		$criteria->select = 'DATE_FORMAT(c_time,"%Y%m") AS ym';
		$criteria->order = 'c_time DESC';
                
		$records = self::model()->findAll($criteria);
		$a = array();
		foreach ($records as $r) {
			$a[$r->ym] = $r->ym;
		}
		return $a;
	}
}
