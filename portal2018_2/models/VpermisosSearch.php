<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vpermisos;

/**
 * VpermisosSearch represents the model behind the search form of `app\models\Vpermisos`.
 */
class VpermisosSearch extends Vpermisos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permi_id', 'usuar_id', 'permi_nivel'], 'integer'],
            [['rol_nombre', 'permi_clase', 'permi_metodo', 'permi_campo'], 'safe'],
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
        $query = Vpermisos::find();

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
            'permi_id' => $this->permi_id,
            'usuar_id' => $this->usuar_id,
            'nivel' => $this->permi_nivel,
        ]);

        $query->andFilterWhere(['like', 'rol_nombre', $this->rol_nombre])
            ->andFilterWhere(['like', 'permi_clase', $this->permi_clase])
            ->andFilterWhere(['like', 'permi_metodo', $this->permi_metodo])
            ->andFilterWhere(['like', 'permi_campo', $this->permi_campo]);

        return $dataProvider;
    }
}
