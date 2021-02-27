<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RentalDetails;

/**
 * RentalDetailsSearch represents the model behind the search form of `backend\models\RentalDetails`.
 */
class RentalDetailsSearch extends RentalDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rental_id', 'property_id', 'floor_id', 'house_id', 'Tenant_id', 'EB_startreading', 'EB_Endreading', 'RentYear'], 'integer'],
            [['RentMonth', 'Notes'], 'safe'],
            [['Rent_due', 'Rent_paid'], 'number'],
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
        $query = RentalDetails::find();

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
            'Rental_id' => $this->Rental_id,
            'property_id' => $this->property_id,
            'floor_id' => $this->floor_id,
            'house_id' => $this->house_id,
            'Tenant_id' => $this->Tenant_id,
            'EB_startreading' => $this->EB_startreading,
            'EB_Endreading' => $this->EB_Endreading,
            'RentYear' => $this->RentYear,
            'Rent_due' => $this->Rent_due,
            'Rent_paid' => $this->Rent_paid,
        ]);

        $query->andFilterWhere(['like', 'RentMonth', $this->RentMonth])
            ->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }
}
