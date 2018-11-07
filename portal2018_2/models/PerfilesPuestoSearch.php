<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PerfilesPuesto;

/**
 * PerfilesPuestoSearch represents the model behind the search form of `app\models\PerfilesPuesto`.
 */
class PerfilesPuestoSearch extends PerfilesPuesto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perpu_id', 'reporta_a', 'autor', 'estad_id', 'estor_id', 'perpu_genero', 'perpu_estado_civil', 'perpu_edad_minima', 'perpu_edad_maxima', 'perpu_escolaridad'], 'integer'],
            [['historia', 'modificacion', 'perpu_nombre', 'perpu_complemento', 'perpu_expe_interna', 'perpu_expe_externa', 'perpu_expe_especialidad', 'perpu_objetivo', 'perpu_nombre_completo'], 'safe'],
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
        $query = PerfilesPuesto::find();

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
            'perpu_id' => $this->perpu_id,
            'reporta_a' => $this->reporta_a,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'estor_id' => $this->estor_id,
            'perpu_genero' => $this->perpu_genero,
            'perpu_estado_civil' => $this->perpu_estado_civil,
            'perpu_edad_minima' => $this->perpu_edad_minima,
            'perpu_edad_maxima' => $this->perpu_edad_maxima,
            'perpu_escolaridad' => $this->perpu_escolaridad,
        ]);

        $query->andFilterWhere(['like', 'historia', $this->historia])
            ->andFilterWhere(['like', 'upper( perpu_nombre)', strtoupper( $this->perpu_nombre)])
            ->andFilterWhere(['like', 'upper( perpu_complemento)', strtoupper( $this->perpu_complemento)])
            ->andFilterWhere(['like', 'perpu_expe_interna', $this->perpu_expe_interna])
            ->andFilterWhere(['like', 'perpu_expe_externa', $this->perpu_expe_externa])
            ->andFilterWhere(['like', 'perpu_expe_especialidad', $this->perpu_expe_especialidad])
            ->andFilterWhere(['like', 'perpu_objetivo', $this->perpu_objetivo])
            ->andFilterWhere(['like', 'upper(perpu_nombre_completo)', strtoupper( $this->perpu_nombre_completo)]);

        return $dataProvider;
    }
}
