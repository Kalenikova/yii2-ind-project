<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Books extends ActiveRecord
{
    public function getBooks_category(){
        return $this->hasOne(Books_category::className(), ['id' => 'id_category']);
    }


}
