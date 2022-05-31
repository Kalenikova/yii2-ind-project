<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z12 extends ActiveRecord
{
    public $reading_room; 
    


    public static function tableName(){
        return 'history';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }


      
    public function rules(){
        return[
            ['reading_room', 'required'],
        ];
    }

}
