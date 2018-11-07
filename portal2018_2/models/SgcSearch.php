<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sgc;

/**
 * SgcSearch represents the model behind the search form of `app\models\Sgc`.
 */
class SgcSearch extends Sgc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sgc_id', 'autor', 'sgc_proceso'], 'integer'],
            [['modificacion', 'sgc_documento', 'sgc_clave', 'sgc_revision', 'sgc_fecha'], 'safe'],
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
        $query = Sgc::find();

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
            'sgc_id' => $this->sgc_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'sgc_proceso' => $this->sgc_proceso,
        ]);

        $query->andFilterWhere(['like', 'upper( sgc_documento)',
            strtoupper( $this->sgc_documento)])
            ->andFilterWhere(['like', 'upper( sgc_clave)', 
                strtoupper($this->sgc_clave)])
            ->andFilterWhere(['like', 'upper(sgc_revision)', 
                strtoupper($this->sgc_revision)])
            ->andFilterWhere(['like', 'sgc_fecha', 
                $this->sgc_fecha]);

        return $dataProvider;
    }
}
