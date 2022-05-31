<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Z11 extends ActiveRecord
{
    public $take_date; 
    public $return_date;
    


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
            ['take_date', 'required'],
            ['take_date','date'],
            ['return_date', 'required'],
            ['return_date','date'],
        ];
    }

}
