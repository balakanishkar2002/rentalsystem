<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property_details".
 *
 * @property int $property_id
 * @property string $property_name
 * @property string $property_street1
 * @property string|null $property_street2
 * @property string|null $property_city
 * @property string|null $property_state
 * @property int|null $country_id
 * @property int|null $Status
 * @property string|null $Permission
 *
 * @property Country $country
 */
class PropertyDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_name', 'property_street1'], 'required'],
            [['country_id', 'Status'], 'integer'],
            [['property_name'], 'string', 'max' => 300],
            [['property_street1', 'property_street2'], 'string', 'max' => 500],
            [['property_city', 'property_state'], 'string', 'max' => 200],
            [['Permission'], 'string', 'max' => 50],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'property_id' => 'Property ID',
            'property_name' => 'Property Name',
            'property_street1' => 'Property Street1',
            'property_street2' => 'Property Street2',
            'property_city' => 'Property City',
            'property_state' => 'Property State',
            'country_id' => 'Country ID',
            'Status' => 'Status',
            'Permission' => 'Permission',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * {@inheritdoc}
     * @return PropertyDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PropertyDetailsQuery(get_called_class());
    }
}
