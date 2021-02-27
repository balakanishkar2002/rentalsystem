<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\propertydetails;

/**
 * PropertydetailsSearch represents the model behind the search form of `backend\models\propertydetails`.
 */
class PropertydetailsSearch extends propertydetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'country_id', 'Status'], 'integer'],
            [['property_name', 'property_street1', 'property_city', 'property_state', 'Ownername', 'Property_details', 'created_date', 'updated_date'], 'safe'],
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
        $query = propertydetails::find();

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
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'property_name', $this->property_name])
            ->andFilterWhere(['like', 'property_street1', $this->property_street1])
            ->andFilterWhere(['like', 'property_city', $this->property_city])
            ->andFilterWhere(['like', 'property_state', $this->property_state])
            ->andFilterWhere(['like', 'Ownername', $this->Ownername])
            ->andFilterWhere(['like', 'Property_details', $this->Property_details]);

        return $dataProvider;
    }
}
