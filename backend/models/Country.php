<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Country".
 *
 * @property int $country_id
 * @property string $country_name
 * @property int|null $Status
 *
 * @property PropertyDetails[] $propertyDetails
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_name'], 'required'],
            [['Status'], 'integer'],
            [['country_name'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country_name' => 'Country Name',
            'Status' => 'Status',
        ];
    }

    /**
     * Gets query for [[PropertyDetails]].
     *
     * @return \yii\db\ActiveQuery|PropertyDetailsQuery
     */
    public function getPropertyDetails()
    {
        return $this->hasMany(PropertyDetails::className(), ['country_id' => 'country_name']);
    }

    /**
     * {@inheritdoc}
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
