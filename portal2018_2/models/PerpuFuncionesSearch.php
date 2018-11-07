<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PerpuFunciones;

/**
 * PerpuFuncionesSearch represents the model behind the search form of `app\models\PerpuFunciones`.
 */
class PerpuFuncionesSearch extends PerpuFunciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pfunc_id', 'autor', 'perpu_id'], 'integer'],
            [['modificacion', 'pfunc_funcion'], 'safe'],
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
        $query = PerpuFunciones::find();

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
            'pfunc_id' => $this->pfunc_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'perpu_id' => $this->perpu_id,
        ]);

        $query->andFilterWhere(['like', 'upper( pfunc_funcion)', strtoupper( $this->pfunc_funcion)]);

        return $dataProvider;
    }
}
