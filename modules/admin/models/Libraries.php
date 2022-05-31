<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "libraries".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $adress
 *
 * @property History[] $histories
 * @property Placement[] $placements
 * @property Readers[] $readers
 * @property Room[] $rooms
 * @property Workers[] $workers
 */
class Libraries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libraries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 225],
            [['adress'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'adress' => 'Адрес',
        ];
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['id_lib' => 'id']);
    }

    /**
     * Gets query for [[Placements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlacements()
    {
        return $this->hasMany(Placement::className(), ['id_lib' => 'id']);
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Readers::className(), ['id_lib' => 'id']);
    }




    /**
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['id_lib' => 'id']);
    }

    /**
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Workers::className(), ['id_lib' => 'id']);
    }
}
