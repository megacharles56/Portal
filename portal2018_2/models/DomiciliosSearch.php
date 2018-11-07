<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Domicilios;

/**
 * DomiciliosSearch represents the model behind the search form of `app\models\Domicilios`.
 */
class DomiciliosSearch extends Domicilios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domic_id', 'import_id'], 'integer'],
            [['domic_calle_numero', 'domic_colonia'], 'safe'],
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
        $query = Domicilios::find();

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
            'domic_id' => $this->domic_id,
            'import_id' => $this->import_id,
        ]);

        $query->andFilterWhere(['like', 'UPPER(domic_calle_numero)', strtoupper($this->domic_calle_numero)])
            ->andFilterWhere(['like', 'upper(domic_colonia)', strtoupper($this->domic_colonia)]);

        return $dataProvider;
    }
}
