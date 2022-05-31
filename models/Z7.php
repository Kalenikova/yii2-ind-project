<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z7 extends ActiveRecord
{
    public $place; 


    public static function tableName(){
        return 'placement';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }


    public function getBooks(){
        return $this->hasOne(Books::className(), ['book_num' => 'books_num']);
    }

    public function getRoom(){
        return $this->hasOne(Room::className(), ['reading_room' => 'reading_room']);
    }

      
    public function rules(){
        return[
            ['place', 'required'],
        ];
    }

}
