<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Workers extends ActiveRecord
{
    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

}
