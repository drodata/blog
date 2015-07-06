<?php
Yii::import('zii.behaviors.CTimestampBehavior');
class CurrentDateBehavior extends CTimestampBehavior
{
    public function beforeSave($event)
    {
        if($this->owner->isNewRecord)
            $this->owner->c_time= new CDbExpression('NOW()');
    }
}
