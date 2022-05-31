<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z5 extends ActiveRecord
{
    public $FIO; 

    public static function tableName(){
        return 'history';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    public function getBooks(){
        return $this->hasMany(Books::className(), ['book_num' => 'books_num']);
    }

    public function getBooks_category(){
        return $this->hasMany(Books_category::className(), ['id' => 'id_category']);
    }


      
    public function rules(){
        return[
            ['FIO', 'required'],
            ['FIO','string'],
        ];
    }

}
