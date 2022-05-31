<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Placement;

/**
 * PlacementSearch represents the model behind the search form of `app\modules\admin\models\Placement`.
 */
class PlacementSearch extends Placement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'books_num', 'reading_room', 'shelf', 'stillage', 'id_lib'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Placement::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'books_num' => $this->books_num,
            'reading_room' => $this->reading_room,
            'shelf' => $this->shelf,
            'stillage' => $this->stillage,
            'id_lib' => $this->id_lib,
        ]);

        return $dataProvider;
    }
}
