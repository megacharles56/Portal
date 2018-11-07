<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Almacen;

/**
 * AlmacenSearch represents the model behind the search form of `app\models\Almacen`.
 */
class AlmacenSearch extends Almacen {

    
     public $almacSeccion;
    /**
     * @inheritdoc
     */
    //public $seccion;
    public function rules() {
        return [
            [['almac_id', 'almac_clave', 'almac_seccion'], 'integer'],
            [['almac_producto', 'almacSeccion'], 'safe'],
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
        $query = Almacen::find();
        $query->joinWith(['almacSeccion']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['almacSeccion'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['variables.varia_cadena' => SORT_ASC],
            'desc' => ['variables.varia_cadena' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'almac_id' => $this->almac_id,
            'almac_clave' => $this->almac_clave,
            'almac_seccion' => $this->almac_seccion,
        ]);

        $query->andFilterWhere(['like', 'upper( almac_producto)', strtoupper( $this->almac_producto)]);
        $query->andFilterWhere(['like', 'varia_cadena', strtoupper($this->almacSeccion)]);


        return $dataProvider;
    }

}
