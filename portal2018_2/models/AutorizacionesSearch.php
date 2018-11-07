<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autorizaciones;

/**
 * AutorizacionesSearch represents the model behind the search form of `app\models\Autorizaciones`.
 */
class AutorizacionesSearch extends Autorizaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor_id', 'autor_autoriza', 'perla_id'], 'integer'],
            [['modificacion', 'autor_autorizacion'], 'safe'],
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
        $query = Autorizaciones::find();

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
            'autor_id' => $this->autor_id,
            'autor_autoriza' => $this->autor_autoriza,
            'modificacion' => $this->modificacion,
            'perla_id' => $this->perla_id,
        ]);

        $query->andFilterWhere(['like', 'upper(autor_autorizacion)', strtoupper($this->autor_autorizacion)]);

        return $dataProvider;
    }
}
