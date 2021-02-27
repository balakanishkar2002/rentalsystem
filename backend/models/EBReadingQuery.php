<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EBReading]].
 *
 * @see EBReading
 */
class EBReadingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return EBReading[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return EBReading|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
