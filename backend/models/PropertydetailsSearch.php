<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Propertydetails;

/**
 * PropertydetailsSearch represents the model behind the search form of `backend\models\Propertydetails`.
 */
class PropertydetailsSearch extends Propertydetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'country_id', 'Status'], 'integer'],
            [['property_name', 'property_street1', 'property_street2', 'property_city', 'property_state', 'Permission'], 'safe'],
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
        $query = Propertydetails::find();

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
            'property_id' => $this->property_id,
            'country_id' => $this->country_id,
            'Status' => $this->Status,
        ]);

        $query->andFilterWhere(['like', 'property_name', $this->property_name])
            ->andFilterWhere(['like', 'property_street1', $this->property_street1])
            ->andFilterWhere(['like', 'property_street2', $this->property_street2])
            ->andFilterWhere(['like', 'property_city', $this->property_city])
            ->andFilterWhere(['like', 'property_state', $this->property_state])
            ->andFilterWhere(['like', 'Permission', $this->Permission]);

        return $dataProvider;
    }
}
