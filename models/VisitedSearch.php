<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visited;

/**
 * VisitedSearch represents the model behind the search form of `app\models\Visited`.
 */
class VisitedSearch extends Visited
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'destination'], 'integer'],
            [['guest_name', 'id_type', 'id_number', 'gender', 'phone_number', 'email', 'photo', 'address', 'visit_code', 'dt_visit', 'long_visit', 'additional_info', 'created'], 'safe'],
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
        $query = Visited::find();

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
            'destination' => $this->destination,
            'dt_visit' => $this->dt_visit,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'guest_name', Yii::$app->user->identity->username])
            ->andFilterWhere(['like', 'id_type', $this->id_type])
            ->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'visit_code', $this->visit_code])
            ->andFilterWhere(['like', 'long_visit', $this->long_visit])
            ->andFilterWhere(['like', 'additional_info', $this->additional_info]);

        return $dataProvider;
    }
}
