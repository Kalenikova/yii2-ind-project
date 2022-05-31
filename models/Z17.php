<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z17 extends ActiveRecord
{
    public $title;  

    public static function tableName(){
        return 'readers';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    public function getReaders_category(){
        return $this->hasOne(Readers_category::className(), ['id' => 'id_category']);
    }

      
    public function rules(){
        return[
            ['title', 'required'],
            ['title','string']
        ];
    }

}
