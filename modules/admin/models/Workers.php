<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property string|null $FIO
 * @property int|null $id_lib
 * @property int|null $reading_room
 *
 * @property History[] $histories
 * @property History[] $histories0
 * @property Libraries $lib
 * @property Room $readingRoom
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['reading_room' => 'reading_room']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lib', 'reading_room'], 'integer'],
            [['FIO'], 'string', 'max' => 100],
            [['id_lib'], 'exist', 'skipOnError' => true, 'targetClass' => Libraries::className(), 'targetAttribute' => ['id_lib' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FIO' => 'ФИО',
            'id_lib' => 'Библиотека',
            'reading_room' => 'Читательский зал',
        ];
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['id_worker_take' => 'id']);
    }

    /**
     * Gets query for [[Histories0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories0()
    {
        return $this->hasMany(History::className(), ['id_worker_return' => 'id']);
    }

    /**
     * Gets query for [[Lib]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLib()
    {
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    /**
     * Gets query for [[ReadingRoom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadingRoom()
    {
        return $this->hasOne(Room::className(), ['reading_room' => 'reading_room']);
    }
}
