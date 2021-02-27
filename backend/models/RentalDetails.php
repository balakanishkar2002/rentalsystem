<?php

namespace backend\models;
use backend\models\HouseDetails;
use backend\models\propertyfloor;
use backend\models\tenantdetails;
use Yii;

/**
 * This is the model class for table "Rental_details".
 *
 * @property int $Rental_id
 * @property int $property_id
 * @property int $floor_id
 * @property int $house_id
 * @property int $Tenant_id
 * @property int $EB_startreading
 * @property int $EB_Endreading
 * @property string $RentMonth
 * @property int $RentYear
 * @property float|null $Rent_due
 * @property float|null $Rent_paid
 * @property string|null $Notes
 *
 * @property RentalDetails $tenant
 * @property RentalDetails[] $rentalDetails
 */
class RentalDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Rental_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'floor_id', 'house_id', 'Tenant_id', 'EB_startreading', 'EB_Endreading', 'RentMonth', 'RentYear'], 'required'],
            [['property_id', 'floor_id', 'house_id', 'Tenant_id', 'EB_startreading', 'EB_Endreading', 'RentYear'], 'integer'],
            [['Rent_due', 'Rent_paid'], 'number'],
            [['RentMonth'], 'string', 'max' => 80],
            [['Notes'], 'string', 'max' => 2000],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\PropertyFloor::className(), 'targetAttribute' => ['floor_id' => 'floor_id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyDetails::className(), 'targetAttribute' => ['property_id' => 'property_id']],
            [['house_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\HouseDetails::className(), 'targetAttribute' => ['house_id' => 'house_id']],
            [['Tenant_id'], 'exist', 'skipOnError' => true, 'targetClass' => TenantDetails::className(), 'targetAttribute' => ['Tenant_id' => 'Tenant_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Rental_id' => 'Rental ID',
            'property_id' => 'Property ID',
            'floor_id' => 'Floor ID',
            'house_id' => 'House ID',
            'Tenant_id' => 'Tenant ID',
            'EB_startreading' => 'Eb Startreading',
            'EB_Endreading' => 'Eb Endreading',
            'RentMonth' => 'Rent Month',
            'RentYear' => 'Rent Year',
            'Rent_due' => 'Rent Due',
            'Rent_paid' => 'Rent Paid',
            'Notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[Tenant]].
     *
     * @return \yii\db\ActiveQuery|RentalDetailsQuery
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
        return $this->hasOne(TenantDetails::className(), ['Tenant_id' => 'Tenant_id']);
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
     * Gets query for [[RentalDetails]].
     *
     * @return \yii\db\ActiveQuery|RentalDetailsQuery
     */
    public function getRentalDetails()
    {
        return $this->hasMany(RentalDetails::className(), ['Rental_id' => 'Rental_id']);
    }

    /**
     * {@inheritdoc}
     * @return RentalDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RentalDetailsQuery(get_called_class());
    }

    public function getMonthsArray()
    {
        for($monthNum = 1; $monthNum <= 12; $monthNum++){
            $months[$monthNum] = date('F', mktime(0, 0, 0, $monthNum, 1));
        }

        return array(0 => 'Month:') + $months;
    }
    public function getYearsList() {
        $currentYear = date('Y');
        $yearFrom = 2020;
        $yearsRange = range($yearFrom, $currentYear);
        return array_combine($yearsRange, $yearsRange);
    }

}
