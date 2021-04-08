<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CaptureData;

/**
 * CaptureDataSearch represents the model behind the search form about `app\models\CaptureData`.
 */
class CaptureDataSearch extends CaptureData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capture_id', 'office_id', 'unit_1_reff_id', 'unit_2_reff_id', 'case_reff_id', 'transport_reff_id', 'carier_reff_id', 'mode_id', 'transport_media_id', 'src_city_id', 'dst_city_id', 'disclosure_id', 'user_id'], 'integer'],
            [['location_name', 'capture_date', 'capture_time', 'sbp_no', 'sbp_date', 'mode_detail', 'doc_no', 'doc_date', 'vehicle_no', 'src_address', 'transit', 'dst_address', 'src_info', 'additional_info', 'bast_agency', 'bast_no', 'bast_date', 'bast_input_date', 'sbp_doc_name', 'sbp_doc_file', 'doc_photo_name', 'doc_photo_file'], 'safe'],
            [['count_1', 'count_2'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CaptureData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'capture_id' => $this->capture_id,
            'office_id' => $this->office_id,
            'capture_date' => $this->capture_date,
            'capture_time' => $this->capture_time,
            'sbp_date' => $this->sbp_date,
            'count_1' => $this->count_1,
            'unit_1_reff_id' => $this->unit_1_reff_id,
            'count_2' => $this->count_2,
            'unit_2_reff_id' => $this->unit_2_reff_id,
            'case_reff_id' => $this->case_reff_id,
            'transport_reff_id' => $this->transport_reff_id,
            'carier_reff_id' => $this->carier_reff_id,
            'mode_id' => $this->mode_id,
            'doc_date' => $this->doc_date,
            'transport_media_id' => $this->transport_media_id,
            'src_city_id' => $this->src_city_id,
            'dst_city_id' => $this->dst_city_id,
            'disclosure_id' => $this->disclosure_id,
            'bast_date' => $this->bast_date,
            'bast_input_date' => $this->bast_input_date,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'location_name', $this->location_name])
            ->andFilterWhere(['like', 'sbp_no', $this->sbp_no])
            ->andFilterWhere(['like', 'mode_detail', $this->mode_detail])
            ->andFilterWhere(['like', 'doc_no', $this->doc_no])
            ->andFilterWhere(['like', 'vehicle_no', $this->vehicle_no])
            ->andFilterWhere(['like', 'src_address', $this->src_address])
            ->andFilterWhere(['like', 'transit', $this->transit])
            ->andFilterWhere(['like', 'dst_address', $this->dst_address])
            ->andFilterWhere(['like', 'src_info', $this->src_info])
            ->andFilterWhere(['like', 'additional_info', $this->additional_info])
            ->andFilterWhere(['like', 'bast_agency', $this->bast_agency])
            ->andFilterWhere(['like', 'bast_no', $this->bast_no])
            ->andFilterWhere(['like', 'sbp_doc_name', $this->sbp_doc_name])
            ->andFilterWhere(['like', 'sbp_doc_file', $this->sbp_doc_file])
            ->andFilterWhere(['like', 'doc_photo_name', $this->doc_photo_name])
            ->andFilterWhere(['like', 'doc_photo_file', $this->doc_photo_file]);

        return $dataProvider;
    }
}
