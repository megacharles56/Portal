<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Importcp;

/**
 * ImportcpSearch represents the model behind the search form of `app\models\Importcp`.
 */
class ImportcpSearch extends Importcp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['impcp_id', 'c_estado', 'c_tipo_asenta'], 'integer'],
            [['d_codigo', 'd_asenta', 'd_mnpio'], 'safe'],
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
        $query = Importcp::find();

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
            'impcp_id' => $this->impcp_id,
            'c_estado' => $this->c_estado,
            'c_tipo_asenta' => $this->c_tipo_asenta,
        ]);

        $query->andFilterWhere(['like', 'd_codigo', $this->d_codigo])
            ->andFilterWhere(['like', 'd_asenta', $this->d_asenta])
            ->andFilterWhere(['like', 'd_mnpio', $this->d_mnpio]);

        return $dataProvider;
    }
}
