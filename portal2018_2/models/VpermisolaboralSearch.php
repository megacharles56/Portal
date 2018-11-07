<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vpermisolaboral;

/**
 * VpermisolaboralSearch represents the model behind the search form of `app\models\Vpermisolaboral`.
 */
class VpermisolaboralSearch extends Vpermisolaboral
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perla_id'], 'integer'],
            [['modificacion', 'perla_dia_inicial', 'perla_hora_inicial', 'perla_hora_final', 'perla_dia_final', 'perla_observaciones', 'estado', 'asunto', 'solicitante', 'firmante1', 'firmante2'], 'safe'],
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
        $query = Vpermisolaboral::find();

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
            'perla_id' => $this->perla_id,
            'modificacion' => $this->modificacion,
        ]);

        $query->andFilterWhere(['like', 'perla_dia_inicial', $this->perla_dia_inicial])
            ->andFilterWhere(['like', 'perla_hora_inicial', $this->perla_hora_inicial])
            ->andFilterWhere(['like', 'perla_hora_final', $this->perla_hora_final])
            ->andFilterWhere(['like', 'perla_dia_final', $this->perla_dia_final])
            ->andFilterWhere(['like', 'perla_observaciones', $this->perla_observaciones])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'solicitante', $this->solicitante])
            ->andFilterWhere(['like', 'firmante1', $this->firmante1])
            ->andFilterWhere(['like', 'firmante2', $this->firmante2]);

        return $dataProvider;
    }
}
