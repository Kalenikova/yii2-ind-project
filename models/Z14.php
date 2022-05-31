<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z14 extends ActiveRecord
{
    public $title; 
    


    public static function tableName(){
        return 'history';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    public function getReaders(){
        return $this->hasOne(Readers::className(), ['ticket_num' => 'ticket_num']);
    }

    public function getBooks_category(){
        return $this->hasOne(Books_category::className(), ['id' => 'id_category']);
    }

    public function getWorkers(){
        return $this->hasOne(Workers::className(), ['id' => 'id_worker_take']);
        return $this->hasOne(Workers::className(), ['id' => 'id_worker_return']);
    }

      
    public function rules(){
        return[
            ['title', 'required'],
            ['title','string'],
        ];
    }

}
