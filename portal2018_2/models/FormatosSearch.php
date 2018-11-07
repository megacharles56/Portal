<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formatos;

/**
 * FormatosSearch represents the model behind the search form of `app\models\Formatos`.
 */
class FormatosSearch extends Formatos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forma_id'], 'integer'],
            [['forma_nombre', 'forma_url'], 'safe'],
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
        $query = Formatos::find();

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
            'forma_id' => $this->forma_id,
        ]);

        $query->andFilterWhere(['like', 'upper( forma_nombre)', strtoupper( $this->forma_nombre)])
            ->andFilterWhere(['like', 'forma_url', $this->forma_url]);

        return $dataProvider;
    }
}
