<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "readers".
 *
 * @property int $id
 * @property string|null $FIO
 * @property int|null $ticket_num
 * @property int|null $id_lib
 * @property int|null $id_category
 * @property string|null $property
 *
 * @property ReadersCategory $category
 * @property History[] $histories
 * @property Libraries $lib
 */
class Readers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'readers';
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
            [['ticket_num', 'id_lib', 'id_category'], 'integer'],
            [['FIO'], 'string', 'max' => 100],
            [['property'], 'string', 'max' => 225],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => ReadersCategory::className(), 'targetAttribute' => ['id_category' => 'id']],
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
            'ticket_num' => 'Номер читательского билета',
            'id_lib' => 'Библиотека',
            'id_category' => 'Категория/Жанр',
            'property' => 'Характеристика',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ReadersCategory::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['ticket_num' => 'ticket_num']);
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
}
