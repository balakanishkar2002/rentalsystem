<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TenantDetails;

/**
 * TenantDetailsSearch represents the model behind the search form of `backend\models\TenantDetails`.
 */
class TenantDetailsSearch extends TenantDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tenant_id', 'property_id', 'floor_id', 'house_id', 'tenant_mobile_no'], 'integer'],
            [['rent_amount', 'water_amount', 'advance_amount', 'other_charges'], 'number'],
            [['tenant_name', 'tenant_details', 'created_date', 'updated_date'], 'safe'],
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
        $query = TenantDetails::find();

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
            'Tenant_id' => $this->Tenant_id,
            'property_id' => $this->property_id,
            'floor_id' => $this->floor_id,
            'house_id' => $this->house_id,
            'rent_amount' => $this->rent_amount,
            'water_amount' => $this->water_amount,
            'advance_amount' => $this->advance_amount,
            'other_charges' => $this->other_charges,
            'tenant_mobile_no' => $this->tenant_mobile_no,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'tenant_name', $this->tenant_name])
            ->andFilterWhere(['like', 'tenant_details', $this->tenant_details]);

        return $dataProvider;
    }
}
