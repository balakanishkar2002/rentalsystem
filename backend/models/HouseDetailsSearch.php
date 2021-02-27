<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HouseDetails;

/**
 * HouseDetailsSearch represents the model behind the search form of `backend\models\HouseDetails`.
 */
class HouseDetailsSearch extends HouseDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['house_id', 'property_id', 'floor_id'], 'integer'],
            [['house_name', 'House_details', 'created_date', 'updated_date'], 'safe'],
            [['rent_amount', 'water_amount', 'EB_rate'], 'number'],
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
        $query = HouseDetails::find();

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
            'house_id' => $this->house_id,
            'property_id' => $this->property_id,
            'floor_id' => $this->floor_id,
            'rent_amount' => $this->rent_amount,
            'water_amount' => $this->water_amount,
            'EB_rate' => $this->EB_rate,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'house_name', $this->house_name])
            ->andFilterWhere(['like', 'House_details', $this->House_details]);

        return $dataProvider;
    }
}
