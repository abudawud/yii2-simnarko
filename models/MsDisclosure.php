<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_disclosure".
 *
 * @property int $id
 * @property string|null $disclosure_code Kode Pengungkapan
 * @property string|null $disclosure_name Nama Pengungkapan
 * @property int|null $is_active Aktif / Non Aktif
 *
 * @property CaptureData[] $captureDatas
 */
class MsDisclosure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_disclosure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['disclosure_code'], 'string', 'max' => 10],
            [['disclosure_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'disclosure_code' => 'Kode Pengungkapan',
            'disclosure_name' => 'Nama Pengungkapan',
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
        return $this->hasMany(CaptureData::className(), ['disclosure_id' => 'id']);
    }
}
