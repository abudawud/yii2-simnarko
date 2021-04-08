<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_refference".
 *
 * @property int $id
 * @property int $reff_cat_id Kategori Refrensi
 * @property string|null $reff_code Kode Refrensi
 * @property string|null $reff_name Nama Referensi
 * @property int|null $is_active Aktif / Non-Aktif
 *
 * @property CaptureData[] $captureDatas
 * @property CaptureData[] $captureDatas0
 * @property CaptureData[] $captureDatas1
 * @property CaptureData[] $captureDatas2
 * @property CaptureData[] $captureDatas3
 * @property CdSuspect[] $cdSuspects
 * @property MsCatReff $reffCat
 */
class MsRefference extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_refference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reff_cat_id'], 'required'],
            [['reff_cat_id', 'is_active'], 'integer'],
            [['reff_code'], 'string', 'max' => 10],
            [['reff_name'], 'string', 'max' => 100],
            [['reff_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsCatReff::className(), 'targetAttribute' => ['reff_cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reff_cat_id' => 'Kategori Refrensi',
            'reff_code' => 'Kode Refrensi',
            'reff_name' => 'Nama Referensi',
            'is_active' => 'Aktif / Non-Aktif',
        ];
    }

    /**
     * Gets query for [[CaptureDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas()
    {
        return $this->hasMany(CaptureData::className(), ['carier_reff_id' => 'id']);
    }

    /**
     * Gets query for [[CaptureDatas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas0()
    {
        return $this->hasMany(CaptureData::className(), ['case_reff_id' => 'id']);
    }

    /**
     * Gets query for [[CaptureDatas1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas1()
    {
        return $this->hasMany(CaptureData::className(), ['transport_reff_id' => 'id']);
    }

    /**
     * Gets query for [[CaptureDatas2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas2()
    {
        return $this->hasMany(CaptureData::className(), ['unit_1_reff_id' => 'id']);
    }

    /**
     * Gets query for [[CaptureDatas3]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaptureDatas3()
    {
        return $this->hasMany(CaptureData::className(), ['unit_2_reff_id' => 'id']);
    }

    /**
     * Gets query for [[CdSuspects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCdSuspects()
    {
        return $this->hasMany(CdSuspect::className(), ['suspect_sex_reff_id' => 'id']);
    }

    /**
     * Gets query for [[ReffCat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReffCat()
    {
        return $this->hasOne(MsCatReff::className(), ['id' => 'reff_cat_id']);
    }
}
