<?php

namespace backend\models;

use Yii;
use backend\models\propertyfloor;
/**
 * This is the model class for table "house_details".
 *
 * @property int $house_id
 * @property string $house_name
 * @property int|null $property_id
 * @property int|null $floor_id
 * @property float|null $rent_amount
 * @property float|null $water_amount
 * @property float|null $EB_rate
 * @property string|null $House_details
 * @property string $created_date
 * @property string $updated_date
 *
 * @property HouseDetails $floor
 * @property HouseDetails[] $houseDetails
 */
class HouseDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'house_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['house_name'], 'required'],
            [['property_id', 'floor_id'], 'integer'],
            [['rent_amount', 'water_amount', 'EB_rate'], 'number'],
            [['House_details'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['house_name'], 'string', 'max' => 300],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => propertyfloor::className(), 'targetAttribute' => ['floor_id' => 'floor_id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyDetails::className(), 'targetAttribute' => ['property_id' => 'property_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'house_id' => 'House ID',
            'house_name' => 'House Name',
            'property_id' => 'Property ID',
            'floor_id' => 'Floor ID',
            'rent_amount' => 'Rent Amount',
            'water_amount' => 'Water Amount',
            'EB_rate' => 'Eb Rate',
            'House_details' => 'House Details',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[Floor]].
     *
     * @return \yii\db\ActiveQuery|HouseDetailsQuery
     */
    public function getFloor()
    {
        return $this->hasOne(PropertyFloor::className(), ['floor_id' => 'floor_id']);
    }
    /**
     * Gets query for [[HouseDetails]].
     *
     * @return \yii\db\ActiveQuery|HouseDetailsQuery
     */
    public function getHouse()
    {
        return $this->hasMany(HouseDetails::className(), ['house_id' => 'house_id']);
    }
    public function getProperty()
    {
        return $this->hasOne(PropertyDetails::className(), ['property_id' => 'property_id']);
    }

    /**
     * {@inheritdoc}
     * @return HouseDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HouseDetailsQuery(get_called_class());
    }
    public static function dropdown()
    {
        static $dropdown;
        if($dropdown ===null){
            $models = static ::find()->all();
            foreach ($models as $model){
                $dropdown[$model->house_id]=$model->house_name;
            }
        }
        return $dropdown;
    }
}
