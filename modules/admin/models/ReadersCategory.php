<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "readers_category".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Readers[] $readers
 */
class ReadersCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'readers_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[Readers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Readers::className(), ['id_category' => 'id']);
    }
}
