<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalonesLigados;

/**
 * SalonesLigadosSearch represents the model behind the search form of `app\models\SalonesLigados`.
 */
class SalonesLigadosSearch extends SalonesLigados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salig_id', 'salon_id'], 'integer'],
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
        $query = SalonesLigados::find();

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
            'salig_id' => $this->salig_id,
            'salon_id' => $this->salon_id,
        ]);

        return $dataProvider;
    }
}
