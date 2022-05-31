<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Reg extends ActiveRecord
{

    public static function tableName(){
        return 'user';
    }

    public function rules(){
        return[
            [['username','password'],'required','message' => 'Поле не может быть пустым!'],
            ['username', 'unique',  'message' => 'Такой пользователь уже существует!']
        ];
    }
    
 
}

