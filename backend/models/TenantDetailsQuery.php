<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TenantDetails]].
 *
 * @see TenantDetails
 */
class TenantDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TenantDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TenantDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
