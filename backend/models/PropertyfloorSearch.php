<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\propertyfloor;

/**
 * PropertyfloorSearch represents the model behind the search form of `backend\models\propertyfloor`.
 */
class PropertyfloorSearch extends propertyfloor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor_id', 'property_id'], 'integer'],
            [['floor_name', 'floor_details', 'created_date', 'updated_date'], 'safe'],
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
        $query = propertyfloor::find();

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
            'floor_id' => $this->floor_id,
            'property_id' => $this->property_id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'floor_name', $this->floor_name])
            ->andFilterWhere(['like', 'floor_details', $this->floor_details]);

        return $dataProvider;
    }
}
