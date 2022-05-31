<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int|null $reading_room
 * @property int|null $id_lib
 *
 * @property Libraries $lib
 * @property Placement[] $placements
 * @property Workers[] $workers
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reading_room', 'id_lib'], 'integer'],
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
            'reading_room' => 'Читательский зал',
            'id_lib' => 'Библиотека',
        ];
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
     * Gets query for [[Placements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlacements()
    {
        return $this->hasMany(Placement::className(), ['reading_room' => 'reading_room']);
    }

    /**
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Workers::className(), ['reading_room' => 'reading_room']);
    }
}
