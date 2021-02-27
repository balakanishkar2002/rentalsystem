<?php

namespace backend\models;
use backend\models\HouseDetails;
use backend\models\propertyfloor;
use Yii;

/**
 * This is the model class for table "Tenant_details".
 *
 * @property int $Tenant_id
 * @property int $property_id
 * @property int $floor_id
 * @property int $house_id
 * @property float|null $rent_amount
 * @property float|null $water_amount
 * @property float|null $advance_amount
 * @property float|null $other_charges
 * @property string $tenant_name
 * @property int $tenant_mobile_no
 * @property string|null $tenant_details
 * @property string $created_date
 * @property string $updated_date
 *
 * @property TenantDetails $house
 * @property TenantDetails[] $tenantDetails
 */
class TenantDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tenant_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'floor_id', 'house_id', 'tenant_name', 'tenant_mobile_no'], 'required'],
            [['property_id', 'floor_id', 'house_id', 'tenant_mobile_no'], 'integer'],
            [['rent_amount', 'water_amount', 'advance_amount', 'other_charges'], 'number'],
            [['tenant_details'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['tenant_name'], 'string', 'max' => 200],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\PropertyFloor::className(), 'targetAttribute' => ['floor_id' => 'floor_id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyDetails::className(), 'targetAttribute' => ['property_id' => 'property_id']],
            [['house_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\HouseDetails::className(), 'targetAttribute' => ['house_id' => 'house_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Tenant_id' => 'Tenant ID',
            'property_id' => 'Property ID',
            'floor_id' => 'Floor ID',
            'house_id' => 'House ID',
            'rent_amount' => 'Rent Amount',
            'water_amount' => 'Water Amount',
            'advance_amount' => 'Advance Amount',
            'other_charges' => 'Other Charges',
            'tenant_name' => 'Tenant Name',
            'tenant_mobile_no' => 'Tenant Mobile No',
            'tenant_details' => 'Tenant Details',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[House]].
     *
     * @return \yii\db\ActiveQuery|TenantDetailsQuery
     */
    public function getHouse()
    {
        return $this->hasOne(\backend\models\HouseDetails::className(), ['house_id' => 'house_id']);
    }

    /**
     * Gets query for [[TenantDetails]].
     *
     * @return \yii\db\ActiveQuery|TenantDetailsQuery
     */
    public function getTenant()
    {
        return $this->hasOne(\backend\models\TenantDetails::className(), ['Tenant_id' => 'Tenant_id']);
    }
    public function getFloor()
    {
        return $this->hasOne(\backend\models\PropertyFloor::className(), ['floor_id' => 'floor_id']);
    }
    /**
     * Gets query for [[HouseDetails]].
     *
     * @return \yii\db\ActiveQuery|HouseDetailsQuery
     */
    public function getProperty()
    {
        return $this->hasOne(PropertyDetails::className(), ['property_id' => 'property_id']);
    }
    /**
     * {@inheritdoc}
     * @return TenantDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TenantDetailsQuery(get_called_class());
    }
    public static function dropdown()
    {
        static $dropdown;
        if($dropdown ===null){
            $models = static ::find()->all();
            foreach ($models as $model){
                $dropdown[$model->Tenant_id]=$model->tenant_name;
            }
        }
        return $dropdown;
    }
}
