<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visitunregister;

/**
 * VisitunregisterSearch represents the model behind the search form of `app\models\Visitunregister`.
 */
class VisitunregisterSearch extends Visitunregister
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'destination_id'], 'integer'],
            [['guest_name', 'id_number', 'phone_number', 'email', 'photo', 'code', 'dt_visit', 'long_visit', 'additional_info'], 'safe'],
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
        $query = Visitunregister::find();

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
            'destination_id' => $this->destination_id,
            'dt_visit' => $this->dt_visit,
        ]);

        $query->andFilterWhere(['like', 'guest_name', $this->guest_name])
            ->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'long_visit', $this->long_visit])
            ->andFilterWhere(['like', 'additional_info', $this->additional_info]);

        return $dataProvider;
    }
}
