<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MySolicitud;

/**
 * MySolicitudSearch represents the model behind the search form of `app\models\MySolicitud`.
 */
class MySolicitudSearch extends MySolicitud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_emp'], 'integer'],
            [['fecha_my_solicitud', 'nombre', 'dias', 'mes', 'mes2', 'hora', 'hora1', 'total', 'asunto', 'obs', 'direccion', 'autoriza', 'status'], 'safe'],
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
        $query = MySolicitud::find();

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
            'id' => $this->id,
            'no_emp' => $this->no_emp,
        ]);

        $query->andFilterWhere(['like', 'fecha_my_solicitud', $this->fecha_my_solicitud])
            ->andFilterWhere(['like', 'upper(nombre)', strtoupper($this->nombre)])
            ->andFilterWhere(['like', 'dias', $this->dias])
            ->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'mes2', $this->mes2])
            ->andFilterWhere(['like', 'hora', $this->hora])
            ->andFilterWhere(['like', 'hora1', $this->hora1])
            ->andFilterWhere(['like', 'total', $this->total])
            ->andFilterWhere(['like', 'upper( asunto=', strtoupper( $this->asunto)])
            ->andFilterWhere(['like', 'obs', $this->obs])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'autoriza', $this->autoriza])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
