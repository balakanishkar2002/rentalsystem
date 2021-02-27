<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[RentalDetails]].
 *
 * @see RentalDetails
 */
class RentalDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RentalDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RentalDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
