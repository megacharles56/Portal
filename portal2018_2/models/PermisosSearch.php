<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Permisos;

/**
 * PermisosSearch represents the model behind the search form of `app\models\Permisos`.
 */
class PermisosSearch extends Permisos
{
    /**
     * @inheritdoc
     */
    
    public $clase;
    
    public function rules()
    {
        return [
            [['permi_id', 'clase_id', 'permi_nivel'], 'integer'],
            [['permi_metodo', 'permi_campo', 'clase'], 'safe'],
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
        $query = Permisos::find();

        $query->joinWith(['clase']);
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['clase'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['clases.clase_clase' => SORT_ASC],
        'desc' => ['clases.clase_clase' => SORT_DESC],
    ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'permi_id' => $this->permi_id,
            'clase_id' => $this->clase_id,
            'permi_nivel' => $this->permi_nivel,
        ])->andFilterWhere(['like', 'permi_metodo', $this->permi_metodo])
            ->andFilterWhere(['like', 'permi_campo', $this->permi_campo])
    // Here we search the attributes of our relations using our previously configured
    // ones in "TourSearch"
                
    ->andFilterWhere(['like', ' upper(clases.clase_clase)', strtoupper($this->clase)]);

        return $dataProvider;
    }
}
