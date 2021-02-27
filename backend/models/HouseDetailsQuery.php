<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[HouseDetails]].
 *
 * @see HouseDetails
 */
class HouseDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return HouseDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return HouseDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
