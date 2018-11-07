<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Eventos;

/**
 * EventosSearch represents the model behind the search form of `app\models\Eventos`.
 */
class EventosSearch extends Eventos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'autor', 'estad_id', 'estor_id', 'emple_id', 'salon_id', 'event_pax', 'event_servicio', 'event_acomodo'], 'integer'],
            [['modificacion', 'event_evento', 'event_fecha', 'event_inicio', 'event_fin', 'event_pagado', 'event_responsable', 'event_menu', 'event_observaciones'], 'safe'],
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
        $query = Eventos::find();

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
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'estor_id' => $this->estor_id,
            'emple_id' => $this->emple_id,
            'salon_id' => $this->salon_id,
            'event_pax' => $this->event_pax,
            'event_servicio' => $this->event_servicio,
            'event_acomodo' => $this->event_acomodo,
        ]);

        $query->andFilterWhere(['like', 'upper( event_evento)', strtoupper( $this->event_evento)])
            ->andFilterWhere(['like', 'event_fecha', $this->event_fecha])
            ->andFilterWhere(['like', 'event_inicio', $this->event_inicio])
            ->andFilterWhere(['like', 'event_fin', $this->event_fin])
            ->andFilterWhere(['like', 'upper(event_pagado)',strtoupper( $this->event_pagado)])
            ->andFilterWhere(['like', 'upper( event_responsable)',strtoupper( $this->event_responsable)])
            ->andFilterWhere(['like', 'event_menu', $this->event_menu])
            ->andFilterWhere(['like', 'event_observaciones', $this->event_observaciones]);

        return $dataProvider;
    }
}
