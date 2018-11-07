<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mantenimiento;

/**
 * MantenimientoSearch represents the model behind the search form of `app\models\Mantenimiento`.
 */
class MantenimientoSearch extends Mantenimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manto_id', 'manto_folio_s', 'manto_folio_m', 'manto_folio_e', 'autor', 'manto_responsable', 'manto_inven_id', 'manto_califiacion', 'manto_estado', 'manto_tipo_manto'], 'integer'],
            [['modificacion', 'manto_falla', 'manto_observaciones', 'manto_f_solicitud', 'manto_h_solicitud', 'manto_f_inicio', 'manto_h_inicio', 'manto_diagnostico', 'manto_acciones', 'manto_observaciones_m', 'manto_f_entrega', 'manto_h_entrega', 'manto_f_recepcion', 'manto_h_recepcion', 'manto_f_preferente', 'manto_h_preferente'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Mantenimiento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'manto_id' => $this->manto_id,
            'manto_folio_s' => $this->manto_folio_s,
            'manto_folio_m' => $this->manto_folio_m,
            'manto_folio_e' => $this->manto_folio_e,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'manto_responsable' => $this->manto_responsable,
            'manto_inven_id' => $this->manto_inven_id,
            'manto_califiacion' => $this->manto_califiacion,
            'manto_estado' => $this->manto_estado,
            'manto_tipo_manto' => $this->manto_tipo_manto,
        ]);

        $query->andFilterWhere(['like', 'upper(manto_falla)', upper($this->manto_falla)])
            ->andFilterWhere(['like', 'manto_observaciones', $this->manto_observaciones])
            ->andFilterWhere(['like', 'manto_f_solicitud', $this->manto_f_solicitud])
            ->andFilterWhere(['like', 'manto_h_solicitud', $this->manto_h_solicitud])
            ->andFilterWhere(['like', 'manto_f_inicio', $this->manto_f_inicio])
            ->andFilterWhere(['like', 'manto_h_inicio', $this->manto_h_inicio])
            ->andFilterWhere(['like', 'manto_diagnostico', $this->manto_diagnostico])
            ->andFilterWhere(['like', 'manto_acciones', $this->manto_acciones])
            ->andFilterWhere(['like', 'manto_observaciones_m', $this->manto_observaciones_m])
            ->andFilterWhere(['like', 'manto_f_entrega', $this->manto_f_entrega])
            ->andFilterWhere(['like', 'manto_h_entrega', $this->manto_h_entrega])
            ->andFilterWhere(['like', 'manto_f_recepcion', $this->manto_f_recepcion])
            ->andFilterWhere(['like', 'manto_h_recepcion', $this->manto_h_recepcion])
            ->andFilterWhere(['like', 'manto_f_preferente', $this->manto_f_preferente])
            ->andFilterWhere(['like', 'manto_h_preferente', $this->manto_h_preferente]);

        return $dataProvider;
    }
}
