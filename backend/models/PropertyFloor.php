<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "property_floor".
 *
 * @property int $floor_id
 * @property string $floor_name
 * @property int|null $property_id
 * @property string|null $floor_details
 * @property string|null $created_date
 * @property string|null $updated_date
 * @property PropertyFloor $floor
 * @property floor[] $propertyFloors
 */
class PropertyFloor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property_floor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor_name','property_id'], 'required'],
            [['property_id'], 'integer'],
            [['floor_details'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['floor_name'], 'string', 'max' => 300],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropertyDetails::className(), 'targetAttribute' => ['property_id' => 'property_id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'floor_id' => 'Floor ID',
            'floor_name' => 'Floor Name',
            'property_id' => 'Property ID',
            'floor_details' => 'Floor Details',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * Gets query for [[Property]].
     *
     * @return \yii\db\ActiveQuery|PropertyFloorQuery
     */
    public function getProperty()
    {
        return $this->hasOne(PropertyDetails::className(), ['property_id' => 'property_id']);
    }

    /**
     * Gets query for [[PropertyFloors]].
     *
     * @return \yii\db\ActiveQuery|PropertyFloorQuery
     */
    public function getPropertyFloorX()
    {
        return $this->hasMany(PropertyFloor::className(), ['floor_id' => 'floor_name']);
    }
    public function getfloor()
    {
        return $this->hasMany(PropertyFloor::className(), ['floor_Id' => 'floor_name']);
    }
    public function getPropertyFloor()
    {
        return $this->hasMany(PropertyFloor::className(), ['floor_id' => 'floor_name']);
    }
    public function getPropertyDetails()
    {
        return $this->hasMany(PropertyFloor::className(), ['property_id' => 'property_name']);
    }
    public function propertyx()
    {
        return $this->hasMany(PropertyFloor::className(), ['property_id' => 'property_name']);
    }

    public function getfloor_name()
    {
        return $this->hasMany(PropertyFloor::className(), ['property_id' => 'property_name']);

    }
    public static function dropdown()
    {
        static $dropdown;
        if($dropdown ===null){
            $models = static ::find()->all();
            foreach ($models as $model){
                $dropdown[$model->floor_id]=$model->floor_name;
            }
        }
        return $dropdown;
    }
    /**
     * {@inheritdoc}
     * @return PropertyFloorQuery the active query used by this AR class.
     */
    public function getAuthorName() {

        return $this->propetyfloor->floor_name;

    }
    public static function find()
    {
        return new PropertyFloorQuery(get_called_class());
    }
}
