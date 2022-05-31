<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property int|null $id_lib
 * @property int|null $ticket_num
 * @property int|null $books_num
 * @property string|null $take_date
 * @property int|null $id_worker_take
 * @property string|null $return_date
 * @property int|null $id_worker_return
 *
 * @property Books $booksNum
 * @property Libraries $lib
 * @property Readers $ticketNum
 * @property Workers $workerReturn
 * @property Workers $workerTake
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    public function getLibraries(){
        return $this->hasOne(Libraries::className(), ['id' => 'id_lib']);
    }

    public function getReaders(){
        return $this->hasOne(Readers::className(), ['ticket_num' => 'ticket_num']);
    }

    public function getWorkers(){
        return $this->hasOne(Workers::className(), ['id' => 'id_worker_take']);
        return $this->hasOne(Workers::className(), ['id' => 'id_worker_return']);
    }

    public function getBooks(){
        return $this->hasOne(Books::className(), ['book_num' => 'books_num']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lib', 'ticket_num', 'books_num', 'id_worker_take', 'id_worker_return'], 'integer'],
            [['take_date', 'return_date'], 'safe'],
            [['id_lib'], 'exist', 'skipOnError' => true, 'targetClass' => Libraries::className(), 'targetAttribute' => ['id_lib' => 'id']],
            [['id_worker_take'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['id_worker_take' => 'id']],
            [['id_worker_return'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['id_worker_return' => 'id']],
            [['ticket_num'], 'exist', 'skipOnError' => true, 'targetClass' => Readers::className(), 'targetAttribute' => ['ticket_num' => 'ticket_num']],
            [['books_num'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_num' => 'book_num']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lib' => 'Библиотека',
            'ticket_num' => 'Читатель',
            'books_num' => 'Книга',
            'take_date' => 'Дата выдачи',
            'id_worker_take' => 'Библиотека',
            'return_date' => 'Дата возврата',
            'id_worker_return' => 'Библиотекарь',
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
     * Gets query for [[TicketNum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketNum()
    {
        return $this->hasOne(Readers::className(), ['ticket_num' => 'ticket_num']);
    }

    /**
     * Gets query for [[WorkerReturn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerReturn()
    {
        return $this->hasOne(Workers::className(), ['id' => 'id_worker_return']);
    }

    /**
     * Gets query for [[WorkerTake]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerTake()
    {
        return $this->hasOne(Workers::className(), ['id' => 'id_worker_take']);
    }
}
