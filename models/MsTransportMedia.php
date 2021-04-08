<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_transport_media".
 *
 * @property int $id
 * @property string|null $tm_code Kode Media Transportasi
 * @property string|null $tm_name Nama Medis Transportasi
 * @property int|null $is_active Aktif / Non Aktif
 *
 * @property CaptureData[] $captureDatas
 */
class MsTransportMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_transport_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['tm_code'], 'string', 'max' => 10],
            [['tm_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tm_code' => 'Kode Media Transportasi',
            'tm_name' => 'Nama Medis Transportasi',
            'is_active' => 'Aktif / Non Aktif',
        ];
    }

    /**
     * Gets query for [[CaptureDatas]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCaptureDatas()
    {
        return $this->hasMany(CaptureData::className(), ['transport_media_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MsTransportMediaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MsTransportMediaQuery(get_called_class());
    }
}
