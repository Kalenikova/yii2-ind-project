<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property int|null $book_num
 * @property int|null $id_category
 * @property string|null $title
 * @property string|null $author
 * @property string|null $come_date
 * @property string|null $end_date
 * @property int $give
 *
 * @property BooksCategory $category
 * @property History[] $histories
 * @property Placement[] $placements
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_num', 'id_category'], 'integer'],
            [['come_date', 'end_date'], 'safe'],
            [['give'], 'required'],
            [['title'], 'string', 'max' => 225],
            [['author'], 'string', 'max' => 50],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => BooksCategory::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_num' => 'Номенклатурный номер',
            'id_category' => 'Категория',
            'title' => 'Название',
            'author' => 'Автор',
            'come_date' => 'Дата получения',
            'end_date' => 'Дата списания',
            'give' => 'Выдача',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BooksCategory::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['books_num' => 'book_num']);
    }

    /**
     * Gets query for [[Placements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlacements()
    {
        return $this->hasMany(Placement::className(), ['books_num' => 'book_num']);
    }
}
