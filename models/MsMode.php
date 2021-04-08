<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_mode".
 *
 * @property int $id
 * @property string|null $mode_name Nama Modus
 * @property string|null $mode_description Deskripsi Modus
 * @property int|null $is_active Aktif / Non Aktif
 *
 * @property CaptureData[] $captureDatas
 */
class MsMode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ms_mode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mode_description'], 'string'],
            [['is_active'], 'integer'],
            [['mode_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mode_name' => 'Nama Modus',
            'mode_description' => 'Deskripsi Modus',
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
        return $this->hasMany(CaptureData::className(), ['mode_id' => 'id']);
    }
}
