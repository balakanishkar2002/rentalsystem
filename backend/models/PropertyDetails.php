<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property_details".
 *
 * @property int $property_id
 * @property string $property_name
 * @property string $property_street1
 * @property string|null $property_city
 * @property string $property_state
 * @property int|null $country_id
 * @property int|null $Status
 * @property string $Ownername
 * @property string|null $Property_details
 * @property string|null $created_date
 * @property string|null $updated_date
 * @property PropertyDetails $property
 * @property property[] $propertyDetails
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
            [['property_name', 'property_street1', 'property_state', 'Ownername','property_city','country_id'], 'required'],
            [['country_id', 'Status'], 'integer'],
            [['Property_details'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['property_name'], 'string', 'max' => 300],
            [['property_street1'], 'string', 'max' => 500],
            [['property_city', 'property_state', 'Ownername'], 'string', 'max' => 200],
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
            'property_city' => 'Property City',
            'property_state' => 'Property State',
            'country_id' => 'Country ID',
            'Status' => 'Status',
            'Ownername' => 'Ownername',
            'Property_details' => 'Property Details',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }
    public function property()
    {
        return $this->hasMany(PropertyFloor::className(), ['property_id' => 'property_name']);
    }
    public function floor()
    {
        return $this->hasMany(PropertyFloor::className(), ['floor_Id' => 'floor_name']);
    }

    /**
     * {@inheritdoc}
     * @return PropertyDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PropertyDetailsQuery(get_called_class());
    }
    public static function dropdown()
    {
        static $dropdown;
        if($dropdown ===null){
            $models = static ::find()->all();
            foreach ($models as $model){
                $dropdown[$model->property_id]=$model->property_name;
            }
        }
        return $dropdown;
    }
}
