<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "placement".
 *
 * @property int $id
 * @property int|null $books_num
 * @property int|null $reading_room
 * @property int|null $shelf
 * @property int|null $stillage
 * @property int|null $id_lib
 *
 * @property Books $booksNum
 * @property Libraries $lib
 * @property Room $readingRoom
 */
class Placement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'placement';
    }

    public function getBooks(){
        return $this->hasOne(Books::className(), ['book_num' => 'books_num']);
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
            [['books_num', 'reading_room', 'shelf', 'stillage', 'id_lib'], 'integer'],
            [['books_num'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_num' => 'book_num']],
            [['reading_room'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['reading_room' => 'reading_room']],
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
            'books_num' => 'Книга',
            'reading_room' => 'Читальный зал',
            'shelf' => 'Полка',
            'stillage' => 'Стеллаж',
            'id_lib' => 'Библиотека',
        ];
    }

    /**
     * Gets query for [[BooksNum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooksNum()
    {
        return $this->hasOne(Books::className(), ['book_num' => 'books_num']);
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
