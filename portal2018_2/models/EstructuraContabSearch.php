<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstructuraContab;

/**
 * EstructuraContabSearch represents the model behind the search form of `app\models\EstructuraContab`.
 */
class EstructuraContabSearch extends EstructuraContab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estco_id', 'autor', 'estad_id', 'estco_numero'], 'integer'],
            [['modificacion', 'estco_nombre'], 'safe'],
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
        $query = EstructuraContab::find();

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
            'estco_id' => $this->estco_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'estco_numero' => $this->estco_numero,
        ]);
        $query->andFilterWhere(['like', 'upper(estco_nombre)', strtoupper(  $this->estco_nombre)]);
        return $dataProvider;
    }
}
