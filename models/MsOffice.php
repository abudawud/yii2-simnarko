<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_office".
 *
 * @property int $id
 * @property string|null $office_name Nama Kantor
 * @property int|null $is_active Aktif / Non Aktif
 *
 * @property CaptureData[] $captureDatas
 */
class MsOffice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['office_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office_name' => 'Nama Kantor',
            'is_active' => 'Aktif / Non Aktif',
        ];
    }

    /**
     * Gets query for [[CaptureDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas()
    {
        return $this->hasMany(CaptureData::className(), ['office_id' => 'id']);
    }
}
