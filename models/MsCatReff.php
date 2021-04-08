<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_cat_reff".
 *
 * @property int $id
 * @property string|null $cat_name Nama Kategori
 * @property int|null $is_active Aktif / Non-Aktif
 *
 * @property MsRefference[] $msRefferences
 */
class MsCatReff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_cat_reff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['cat_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Nama Kategori',
            'is_active' => 'Aktif / Non-Aktif',
        ];
    }

    /**
     * Gets query for [[MsRefferences]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMsRefferences()
    {
        return $this->hasMany(MsRefference::className(), ['reff_cat_id' => 'id']);
    }
}
