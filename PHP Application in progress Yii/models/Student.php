<?php

namespace app\models;
use \yii\db\ActiveRecord;

class Student extends ActiveRecord {

    public static function tableName()
    {
        return 'students';
    }

}