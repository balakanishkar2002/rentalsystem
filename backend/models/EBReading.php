<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "EB_Reading".
 *
 * @property int $EBRead_id
 * @property int $property_id
 * @property int $floor_id
 * @property int $house_id
 * @property int $Tenant_id
 * @property float|null $EBunit_rate
 * @property float|null $EB_startreading
 * @property float|null $EB_Endreading
 * @property int|null $YearMonth
 *
 * @property EBReading $property
 * @property EBReading[] $eBReadings
 * @property EBReading $floor
 * @property EBReading[] $eBReadings0
 * @property EBReading $house
 * @property EBReading[] $eBReadings1
 * @property EBReading $tenant
 * @property EBReading[] $eBReadings2
 */
class EBReading extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EB_Reading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property_id', 'floor_id', 'house_id', 'Tenant_id'], 'required'],
            [['property_id', 'floor_id', 'house_id', 'Tenant_id', 'YearMonth'], 'integer'],
            [['EBunit_rate', 'EB_startreading', 'EB_Endreading'], 'number'],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => EBReading::className(), 'targetAttribute' => ['property_id' => 'EBRead_id']],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => EBReading::className(), 'targetAttribute' => ['floor_id' => 'EBRead_id']],
            [['house_id'], 'exist', 'skipOnError' => true, 'targetClass' => EBReading::className(), 'targetAttribute' => ['house_id' => 'EBRead_id']],
            [['Tenant_id'], 'exist', 'skipOnError' => true, 'targetClass' => EBReading::className(), 'targetAttribute' => ['Tenant_id' => 'EBRead_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EBRead_id' => 'Eb Read ID',
            'property_id' => 'Property ID',
            'floor_id' => 'Floor ID',
            'house_id' => 'House ID',
            'Tenant_id' => 'Tenant ID',
            'EBunit_rate' => 'E Bunit Rate',
            'EB_startreading' => 'Eb Startreading',
            'EB_Endreading' => 'Eb Endreading',
            'YearMonth' => 'Year Month',
        ];
    }

    /**
     * Gets query for [[Property]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getProperty()
    {
        return $this->hasOne(EBReading::className(), ['EBRead_id' => 'property_id']);
    }

    /**
     * Gets query for [[EBReadings]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getEBReadings()
    {
        return $this->hasMany(EBReading::className(), ['property_id' => 'EBRead_id']);
    }

    /**
     * Gets query for [[Floor]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getFloor()
    {
        return $this->hasOne(EBReading::className(), ['EBRead_id' => 'floor_id']);
    }

    /**
     * Gets query for [[EBReadings0]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getEBReadings0()
    {
        return $this->hasMany(EBReading::className(), ['floor_id' => 'EBRead_id']);
    }

    /**
     * Gets query for [[House]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getHouse()
    {
        return $this->hasOne(EBReading::className(), ['EBRead_id' => 'house_id']);
    }

    /**
     * Gets query for [[EBReadings1]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getEBReadings1()
    {
        return $this->hasMany(EBReading::className(), ['house_id' => 'EBRead_id']);
    }

    /**
     * Gets query for [[Tenant]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getTenant()
    {
        return $this->hasOne(EBReading::className(), ['EBRead_id' => 'Tenant_id']);
    }

    /**
     * Gets query for [[EBReadings2]].
     *
     * @return \yii\db\ActiveQuery|EBReadingQuery
     */
    public function getEBReadings2()
    {
        return $this->hasMany(EBReading::className(), ['Tenant_id' => 'EBRead_id']);
    }

    /**
     * {@inheritdoc}
     * @return EBReadingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EBReadingQuery(get_called_class());
    }
}
