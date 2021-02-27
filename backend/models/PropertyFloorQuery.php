<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PropertyFloor]].
 *
 * @see PropertyFloor
 */
class PropertyFloorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PropertyFloor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PropertyFloor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
