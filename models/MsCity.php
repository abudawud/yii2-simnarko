<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_city".
 *
 * @property int $id
 * @property string|null $city_code Kode Kota
 * @property string|null $city_name Nama Kota
 * @property int|null $is_active Aktif / Non Aktif
 * @property int $country_id Negara
 *
 * @property CaptureData[] $captureDatas
 * @property CaptureData[] $captureDatas0
 * @property MsCountry $country
 */
class MsCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'country_id'], 'integer'],
            [['country_id'], 'required'],
            [['city_code'], 'string', 'max' => 10],
            [['city_name'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsCountry::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_code' => 'Kode Kota',
            'city_name' => 'Nama Kota',
            'is_active' => 'Aktif / Non Aktif',
            'country_id' => 'Negara',
        ];
    }

    /**
     * Gets query for [[CaptureDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas()
    {
        return $this->hasMany(CaptureData::className(), ['dst_city_id' => 'id']);
    }

    /**
     * Gets query for [[CaptureDatas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas0()
    {
        return $this->hasMany(CaptureData::className(), ['src_city_id' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(MsCountry::className(), ['id' => 'country_id']);
    }
}
