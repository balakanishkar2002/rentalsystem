<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PropertyDetails]].
 *
 * @see PropertyDetails
 */
class PropertyDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PropertyDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PropertyDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
