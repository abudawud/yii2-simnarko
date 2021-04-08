<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MsTransportMedia]].
 *
 * @see MsTransportMedia
 */
class MsTransportMediaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MsTransportMedia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MsTransportMedia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
