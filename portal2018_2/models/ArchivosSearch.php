<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Archivos;

/**
 * ArchivosSearch represents the model behind the search form of `app\models\Archivos`.
 */
class ArchivosSearch extends Archivos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['archi_id', 'autor', 'emple_id'], 'integer'],
            [['modificacion', 'archi_archivo'], 'safe'],
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
        $query = Archivos::find();

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
            'archi_id' => $this->archi_id,
            'autor' => $this->autor,
            'emple_id' => $this->emple_id,
            'modificacion' => $this->modificacion,
        ]);

        $query->andFilterWhere(['like', 'upper(archi_archivo)', strtoupper(  $this->archi_archivo)]);

        return $dataProvider;
    }
}
