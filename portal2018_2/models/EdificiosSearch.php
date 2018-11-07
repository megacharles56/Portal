<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Edificios;

/**
 * EdificiosSearch represents the model behind the search form of `app\models\Edificios`.
 */
class EdificiosSearch extends Edificios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edifi_id'], 'integer'],
            [['edifi_nombre'], 'safe'],
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
        $query = Edificios::find();

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
            'edifi_id' => $this->edifi_id,
        ]);

        $query->andFilterWhere(['like', 'upper(edifi_nombre)', strtoupper($this->edifi_nombre)]);

        return $dataProvider;
    }
}
