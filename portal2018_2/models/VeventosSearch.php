<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Veventos;

/**
 * VeventosSearch represents the model behind the search form of `app\models\Veventos`.
 */
class VeventosSearch extends Veventos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'estor_id', 'emple_id', 'salon_id', 'event_pax', 'event_servicio', 'event_acomodo', 'estad_id'], 'integer'],
            [['event_evento', 'event_fecha', 'event_inicio', 'event_fin', 'event_pagado', 'event_responsable', 'event_menu', 'perso_nombre', 'estructura_organica_c', 'salon_nombre', 'servicio', 'acomodo', 'estado'], 'safe'],
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
        $query = Veventos::find();

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
            'event_id' => $this->event_id,
            'estor_id' => $this->estor_id,
            'emple_id' => $this->emple_id,
            'salon_id' => $this->salon_id,
            'event_pax' => $this->event_pax,
            'event_servicio' => $this->event_servicio,
            'event_acomodo' => $this->event_acomodo,
            'estad_id' => $this->estad_id,
        ]);

        $query->andFilterWhere(['like', 'event_evento', $this->event_evento])
            ->andFilterWhere(['like', 'event_fecha', $this->event_fecha])
            ->andFilterWhere(['like', 'event_inicio', $this->event_inicio])
            ->andFilterWhere(['like', 'event_fin', $this->event_fin])
            ->andFilterWhere(['like', 'event_pagado', $this->event_pagado])
            ->andFilterWhere(['like', 'event_responsable', $this->event_responsable])
            ->andFilterWhere(['like', 'event_menu', $this->event_menu])
            ->andFilterWhere(['like', 'empleado_responsable', $this->empleado_responsable])
            ->andFilterWhere(['like', 'estor_nombre_completo', $this->estor_nombre_completo])
            ->andFilterWhere(['like', 'salon_nombre', $this->salon_nombre])
            ->andFilterWhere(['like', 'servicio', $this->servicio])
            ->andFilterWhere(['like', 'acomodo', $this->acomodo])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
