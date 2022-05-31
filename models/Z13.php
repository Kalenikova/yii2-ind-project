<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z13 extends ActiveRecord
{
    public $take_date; 
    public $return_date; 

    public static function tableName(){
        return 'readers';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    public function getReaders_category(){
        return $this->hasOne(Readers_category::className(), ['id' => 'id_category']);
    }

    public function getHistory(){
        return $this->hasOne(Histories::className(), ['ticket_num' => 'ticket_num']);
    }

      
    public function rules(){
        return[
            ['take_date', 'required'],
            ['take_date','date'],
            ['return_date', 'required'],
            ['return_date','date'],
        ];
    }

}
