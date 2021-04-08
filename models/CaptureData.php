<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capture_data".
 *
 * @property int $capture_id ID Tangkapan
 * @property int $office_id Nama Kantor
 * @property string $location_name Nama Lokasi
 * @property string $capture_date Tanggal Kejadian
 * @property string $capture_time Waktu Kejadian
 * @property string $sbp_no Nomor SBP
 * @property string $sbp_date Tanggal SBP
 * @property float|null $count_1 Jumlah 1
 * @property int|null $unit_1_reff_id Satuan 1
 * @property float $count_2 Jumlah 2
 * @property int $unit_2_reff_id Satuan 2
 * @property int $case_reff_id Kasus
 * @property int $transport_reff_id Transportasi
 * @property int $carier_reff_id Kurir
 * @property int $mode_id Modus
 * @property string|null $mode_detail Detail Modus Operandi
 * @property string|null $doc_no No Dokumen Barang
 * @property string|null $doc_date Tanggal Dokumen Barang
 * @property int $transport_media_id Jenis Sarana Pengangkutan
 * @property string $vehicle_no Flight / Voyage / No Polisi
 * @property int|null $src_city_id Asal Kota
 * @property string|null $src_address Alamat Asal
 * @property string|null $transit Transit
 * @property int $dst_city_id Tujuan Kota
 * @property string|null $dst_address Alamat Tujuan
 * @property int $disclosure_id Cara Pengungkapan
 * @property string $src_info Sumber Info
 * @property string|null $additional_info Informasi Tambahan
 * @property string $bast_agency Nama Instansi BAST
 * @property string $bast_no Nomor BAST
 * @property string $bast_date Tanggal BAST
 * @property string $bast_input_date Tanggal dan Waktu Input BAST
 * @property string $sbp_doc_name Nama Dokumen
 * @property string $sbp_doc_file File Dokumen SBP
 * @property string|null $doc_photo_name Foto Dokumen
 * @property string|null $doc_photo_file Foto Dokumen File
 * @property int|null $user_id User Input
 *
 * @property MsOffice $office
 * @property MsMode $mode
 * @property User $user
 * @property MsRefference $carierReff
 * @property MsRefference $caseReff
 * @property MsDisclosure $disclosure
 * @property MsCity $dstCity
 * @property MsCity $srcCity
 * @property MsRefference $transportReff
 * @property MsTransportMedia $transportMedia
 * @property MsRefference $unit1Reff
 * @property MsRefference $unit2Reff
 * @property CdNppType[] $cdNppTypes
 * @property CdSuspect[] $cdSuspects
 */
class CaptureData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'capture_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_id', 'location_name', 'capture_date', 'capture_time', 'sbp_no', 'sbp_date', 'count_2', 'unit_2_reff_id', 'case_reff_id', 'transport_reff_id', 'carier_reff_id', 'mode_id', 'transport_media_id', 'vehicle_no', 'dst_city_id', 'disclosure_id', 'src_info', 'bast_agency', 'bast_no', 'bast_date', 'sbp_doc_name', 'sbp_doc_file'], 'required'],
            [['office_id', 'unit_1_reff_id', 'unit_2_reff_id', 'case_reff_id', 'transport_reff_id', 'carier_reff_id', 'mode_id', 'transport_media_id', 'src_city_id', 'dst_city_id', 'disclosure_id', 'user_id'], 'integer'],
            [['location_name', 'mode_detail', 'src_address', 'dst_address', 'additional_info'], 'string'],
            [['capture_date', 'capture_time', 'sbp_date', 'doc_date', 'bast_date', 'bast_input_date'], 'safe'],
            [['count_1', 'count_2'], 'number'],
            [['sbp_no', 'doc_no'], 'string', 'max' => 255],
            [['vehicle_no', 'transit', 'src_info', 'bast_agency', 'bast_no', 'sbp_doc_name', 'sbp_doc_file', 'doc_photo_name', 'doc_photo_file'], 'string', 'max' => 100],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsOffice::className(), 'targetAttribute' => ['office_id' => 'id']],
            [['mode_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsMode::className(), 'targetAttribute' => ['mode_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['carier_reff_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsRefference::className(), 'targetAttribute' => ['carier_reff_id' => 'id']],
            [['case_reff_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsRefference::className(), 'targetAttribute' => ['case_reff_id' => 'id']],
            [['disclosure_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsDisclosure::className(), 'targetAttribute' => ['disclosure_id' => 'id']],
            [['dst_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsCity::className(), 'targetAttribute' => ['dst_city_id' => 'id']],
            [['src_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsCity::className(), 'targetAttribute' => ['src_city_id' => 'id']],
            [['transport_reff_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsRefference::className(), 'targetAttribute' => ['transport_reff_id' => 'id']],
            [['transport_media_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsTransportMedia::className(), 'targetAttribute' => ['transport_media_id' => 'id']],
            [['unit_1_reff_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsRefference::className(), 'targetAttribute' => ['unit_1_reff_id' => 'id']],
            [['unit_2_reff_id'], 'exist', 'skipOnError' => true, 'targetClass' => MsRefference::className(), 'targetAttribute' => ['unit_2_reff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'capture_id' => 'ID Tangkapan',
            'office_id' => 'Nama Kantor',
            'location_name' => 'Nama Lokasi',
            'capture_date' => 'Tanggal Kejadian',
            'capture_time' => 'Waktu Kejadian',
            'sbp_no' => 'Nomor SBP',
            'sbp_date' => 'Tanggal SBP',
            'count_1' => 'Jumlah 1',
            'unit_1_reff_id' => 'Satuan 1',
            'count_2' => 'Jumlah 2',
            'unit_2_reff_id' => 'Satuan 2',
            'case_reff_id' => 'Kasus',
            'transport_reff_id' => 'Transportasi',
            'carier_reff_id' => 'Kurir',
            'mode_id' => 'Modus',
            'mode_detail' => 'Detail Modus Operandi',
            'doc_no' => 'No Dokumen Barang',
            'doc_date' => 'Tanggal Dokumen Barang',
            'transport_media_id' => 'Jenis Sarana Pengangkutan',
            'vehicle_no' => 'Flight / Voyage / No Polisi',
            'src_city_id' => 'Asal Kota',
            'src_address' => 'Alamat Asal',
            'transit' => 'Transit',
            'dst_city_id' => 'Tujuan Kota',
            'dst_address' => 'Alamat Tujuan',
            'disclosure_id' => 'Cara Pengungkapan',
            'src_info' => 'Sumber Info',
            'additional_info' => 'Informasi Tambahan',
            'bast_agency' => 'Nama Instansi BAST',
            'bast_no' => 'Nomor BAST',
            'bast_date' => 'Tanggal BAST',
            'bast_input_date' => 'Tanggal dan Waktu Input BAST',
            'sbp_doc_name' => 'Nama Dokumen',
            'sbp_doc_file' => 'File Dokumen SBP',
            'doc_photo_name' => 'Foto Dokumen',
            'doc_photo_file' => 'Foto Dokumen File',
            'user_id' => 'User Input',
        ];
    }

    /**
     * Gets query for [[Office]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(MsOffice::className(), ['id' => 'office_id']);
    }

    /**
     * Gets query for [[Mode]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getMode()
    {
        return $this->hasOne(MsMode::className(), ['id' => 'mode_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[CarierReff]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCarierReff()
    {
        return $this->hasOne(MsRefference::className(), ['id' => 'carier_reff_id']);
    }

    /**
     * Gets query for [[CaseReff]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCaseReff()
    {
        return $this->hasOne(MsRefference::className(), ['id' => 'case_reff_id']);
    }

    /**
     * Gets query for [[Disclosure]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getDisclosure()
    {
        return $this->hasOne(MsDisclosure::className(), ['id' => 'disclosure_id']);
    }

    /**
     * Gets query for [[DstCity]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getDstCity()
    {
        return $this->hasOne(MsCity::className(), ['id' => 'dst_city_id']);
    }

    /**
     * Gets query for [[SrcCity]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getSrcCity()
    {
        return $this->hasOne(MsCity::className(), ['id' => 'src_city_id']);
    }

    /**
     * Gets query for [[TransportReff]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTransportReff()
    {
        return $this->hasOne(MsRefference::className(), ['id' => 'transport_reff_id']);
    }

    /**
     * Gets query for [[TransportMedia]].
     *
     * @return \yii\db\ActiveQuery|MsTransportMediaQuery
     */
    public function getTransportMedia()
    {
        return $this->hasOne(MsTransportMedia::className(), ['id' => 'transport_media_id']);
    }

    /**
     * Gets query for [[Unit1Reff]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUnit1Reff()
    {
        return $this->hasOne(MsRefference::className(), ['id' => 'unit_1_reff_id']);
    }

    /**
     * Gets query for [[Unit2Reff]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUnit2Reff()
    {
        return $this->hasOne(MsRefference::className(), ['id' => 'unit_2_reff_id']);
    }

    /**
     * Gets query for [[CdNppTypes]].
     *
     * @return \yii\db\ActiveQuery|CdNppTypeQuery
     */
    public function getCdNppTypes()
    {
        return $this->hasMany(CdNppType::className(), ['capture_id' => 'capture_id']);
    }

    /**
     * Gets query for [[CdSuspects]].
     *
     * @return \yii\db\ActiveQuery|CdSuspectQuery
     */
    public function getCdSuspects()
    {
        return $this->hasMany(CdSuspect::className(), ['capture_id' => 'capture_id']);
    }

    /**
     * {@inheritdoc}
     * @return CaptureDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CaptureDataQuery(get_called_class());
    }
}
