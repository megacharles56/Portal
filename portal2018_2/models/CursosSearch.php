<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursos;

/**
 * CursosSearch represents the model behind the search form of `app\models\Cursos`.
 */
class CursosSearch extends Cursos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso_id', 'estad_id', 'curso_duracion'], 'integer'],
            [['curso_nombre', 'curso_fecha_inicio', 'curso_fecha_fin', 'curso_facilitador', 'curso_empresa'], 'safe'],
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
        $query = Cursos::find();

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
            'curso_id' => $this->curso_id,
            'estad_id' => $this->estad_id,
            'curso_duracion' => $this->curso_duracion,
        ]);

        $query->andFilterWhere(['like', 'upper(curso_nombre)', strtoupper($this->curso_nombre)])
            ->andFilterWhere(['like', 'curso_fecha_inicio', strtoupper( $this->curso_fecha_inicio)])
            ->andFilterWhere(['like', 'curso_fecha_fin', $this->curso_fecha_fin])
            ->andFilterWhere(['like', 'upper(curso_facilitador)', strtoupper( $this->curso_facilitador)])
            ->andFilterWhere(['like', 'upper(curso_empresa)',  strtoupper($this->curso_empresa)]);

        return $dataProvider;
    }
}
