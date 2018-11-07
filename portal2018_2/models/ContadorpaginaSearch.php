<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contadorpagina;

/**
 * ContadorpaginaSearch represents the model behind the search form of `app\models\Contadorpagina`.
 */
class ContadorpaginaSearch extends Contadorpagina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conpa_id', 'conpa_cantidad'], 'integer'],
            [['conpa_pagina'], 'safe'],
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
        $query = Contadorpagina::find();

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
            'conpa_id' => $this->conpa_id,
            'conpa_cantidad' => $this->conpa_cantidad,
        ]);

        $query->andFilterWhere(['like', 'conpa_pagina', $this->conpa_pagina]);

        return $dataProvider;
    }
}
