<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RolMenu;

/**
 * RolMenuSearch represents the model behind the search form of `app\models\RolMenu`.
 */
class RolMenuSearch extends RolMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolme_id', 'rol_id', 'rolme_orden'], 'integer'],
            [['rolme_label', 'rolme_url', 'rolme_tooltip'], 'safe'],
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
        $query = RolMenu::find();

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
            'rolme_id' => $this->rolme_id,
            'rol_id' => $this->rol_id,
            'rolme_orden' => $this->rolme_orden,
        ]);

        $query->andFilterWhere(['like', 'upper( rolme_label)', strtoupper(  $this->rolme_label)])
            ->andFilterWhere(['like', 'upper(rolme_url)', strtoupper($this->rolme_url)])
            ->andFilterWhere(['like', 'upper(rolme_tooltip)', strtoupper($this->rolme_tooltip)]);

        return $dataProvider;
    }
}
