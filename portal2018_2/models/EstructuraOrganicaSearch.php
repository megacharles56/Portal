<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstructuraOrganica;

/**
 * EstructuraOrganicaSearch represents the model behind the search form of `app\models\EstructuraOrganica`.
 */
class EstructuraOrganicaSearch extends EstructuraOrganica {

    public $autor0,
            $estad,
            $estorTipoEstructura,
            $estco,
            $estorSuperior;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['estor_id', 'autor', 'estad_id', 'estor_tipo_estructura', 'estco_id', 'estor_superior'], 'integer'],
            [['modificacion', 'estor_nombre', 'estor_objetivo', 'autor0', 'estad',
            'estorTipoEstructura',
            'estco',
            'estorSuperior'
                ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = EstructuraOrganica::find();

        $query->joinWith(['estad']);
        $query->joinWith(['autor0']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['estad'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['variables.varia_cadena' => SORT_ASC],
            'desc' => ['variables.varia_cadena' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['autor0'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['personas.perso_nombre' => SORT_ASC],
            'desc' => ['personas.perso_nombre' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'estor_id' => $this->estor_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'upper( estor_tipo_estructura)' => strtoupper( $this->estor_tipo_estructura),
            'estco_id' => $this->estco_id,
            'estor_superior' => $this->estor_superior,
        ]);

        $query->andFilterWhere(['like', 'upper( estor_nombre)', strtoupper($this->estor_nombre)])
                ->andFilterWhere(['like', 'upper(estor_objetivo)', 
                strtoupper($this->estor_objetivo)])
                ->andFilterWhere(['like', 'upper(variables.varia_cadena)', 
                strtoupper($this->estad)])
                ->andFilterWhere(['like', 'upper(personas.perso_nombre)', 
                 strtoupper(   $this->autor0)]);

        return $dataProvider;
    }

}
