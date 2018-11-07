<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Variables;

/**
 * VariablesSearch represents the model behind the search form of `app\models\Variables`.
 */
class VariablesSearch extends Variables
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['varia_id'], 'integer'],
            [['modificacion', 'varia_tabla', 'varia_campo', 'varia_cadena', 'varia_extra', 'varia_info', 'varia_fecha'], 'safe'],
            [['varia_numerico'], 'number'],
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
        $query = Variables::find();

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
            'varia_id' => $this->varia_id,
            'modificacion' => $this->modificacion,
            'varia_numerico' => $this->varia_numerico,
        ]);

        $query->andFilterWhere(['like', 'upper(varia_tabla)', 
            $this->varia_tabla])
            ->andFilterWhere(['like', 'upper(varia_campo)', 
                strtoupper($this->varia_campo)])
            ->andFilterWhere(['like', 'upper(varia_cadena)', 
                strtoupper($this->varia_cadena)])
            ->andFilterWhere(['like', 'upper(varia_extra)', 
                strtoupper($this->varia_extra)])
            ->andFilterWhere(['like', 'upper(varia_info)', 
                strtoupper($this->varia_info)])
            ->andFilterWhere(['like', 'varia_fecha', $this->varia_fecha]);

        return $dataProvider;
    }
}
