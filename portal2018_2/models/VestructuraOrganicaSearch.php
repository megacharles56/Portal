<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VestructuraOrganica;

/**
 * VestructuraOrganicaSearch represents the model behind the search form of `app\models\VestructuraOrganica`.
 */
class VestructuraOrganicaSearch extends VestructuraOrganica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estor_id', 'autor', 'estad_id', 'estor_tipo_estructura', 'estco_id'], 'integer'],
            [['modificacion', 'estor_nombre', 'estor_superior', 'tipo_estructura', 'estado', 'nombre_autor', 'estructura_contable', 'estor_nombre_completo', 'estor_sup_nombre_completo'], 'safe'],
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
        $query = VestructuraOrganica::find();

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
            'estor_id' => $this->estor_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'estor_tipo_estructura' => $this->estor_tipo_estructura,
            'estco_id' => $this->estco_id,
        ]);

        $query->andFilterWhere(['like', 'estor_nombre', strtoupper( $this->estor_nombre)])
            ->andFilterWhere(['like', 'estor_superior', $this->estor_superior])
            ->andFilterWhere(['like', 'tipo_estructura',strtoupper( $this->tipo_estructura)])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'nombre_autor', $this->nombre_autor])
            ->andFilterWhere(['like', 'estructura_contable', $this->estructura_contable])
            ->andFilterWhere(['like', 'estor_nombre_completo', strtoupper($this->estor_nombre_completo)])
            ->andFilterWhere(['like', 'estor_sup_nombre_completo', $this->estor_sup_nombre_completo]);

        return $dataProvider;
    }
}
