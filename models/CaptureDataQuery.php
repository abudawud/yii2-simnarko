<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CaptureData]].
 *
 * @see CaptureData
 */
class CaptureDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CaptureData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CaptureData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
