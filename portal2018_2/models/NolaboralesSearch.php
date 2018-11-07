<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nolaborales;

/**
 * NolaboralesSearch represents the model behind the search form of `app\models\Nolaborales`.
 */
class NolaboralesSearch extends Nolaborales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nolab_id'], 'integer'],
            [['nolab_dia', 'nolab_motivo'], 'safe'],
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
        $query = Nolaborales::find();

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
            'nolab_id' => $this->nolab_id,
        ]);

        $query->andFilterWhere(['like', 'nolab_dia', $this->nolab_dia])
            ->andFilterWhere(['like', 'nolab_motivo', $this->nolab_motivo]);

        return $dataProvider;
    }
}
