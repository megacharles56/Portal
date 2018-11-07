<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pisos;

/**
 * PisosSearch represents the model behind the search form of `app\models\Pisos`.
 */
class PisosSearch extends Pisos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['piso_id', 'edifi_id'], 'integer'],
            [['piso_nombre'], 'safe'],
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
        $query = Pisos::find();

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
            'piso_id' => $this->piso_id,
            'edifi_id' => $this->edifi_id,
        ]);

        $query->andFilterWhere(['like', 'upper(piso_nombre)', strtoupper( $this->piso_nombre)]);

        return $dataProvider;
    }
}
