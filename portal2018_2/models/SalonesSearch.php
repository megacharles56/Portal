<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salones;

/**
 * SalonesSearch represents the model behind the search form of `app\models\Salones`.
 */
class SalonesSearch extends Salones {

    public $salonUbicacion;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['salon_id', 'salon_ubicacion'], 'integer'],
            [['salon_nombre', 'salonUbicacion'], 'safe'],
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
        $query = Salones::find();
        $query->joinWith(['salonUbicacion']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['salonUbicacion'] = [
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
            'salon_id' => $this->salon_id,
            'salon_ubicacion' => $this->salon_ubicacion,
        ]);

        $query->andFilterWhere(['like', 'upper( variables.varia_cadena)', 
            strtoupper($this->salon_nombre)]);
        $query->andFilterWhere(['like', 'upper( variables.varia_cadena)', 
            strtoupper($this->salonUbicacion)]);

        return $dataProvider;
    }

    public function attributeLabels() {
        return [
            'salonUbicacion' => 'Ubicación',
        ];
    }

}
