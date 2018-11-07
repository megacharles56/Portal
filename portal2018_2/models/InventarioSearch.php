<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventario;

/**
 * InventarioSearch represents the model behind the search form of `app\models\Inventario`.
 */
class InventarioSearch extends Inventario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inven_id', 'artic_id', 'inven_color', 'inven_material', 'inven_marca', 'inven_colocacion', 'inven_estado', 'inven_piso_id', 'inven_emple_id'], 'integer'],
            [['inven_descripcion', 'inven_caracteristica', 'inven_modelo', 'inven_numero_serie', 'inven_numero_inventario', 'inven_observaciones', 'inven_alta', 'inven_actualizacion'], 'safe'],
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
        $query = Inventario::find();

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
            'inven_id' => $this->inven_id,
            'artic_id' => $this->artic_id,
            'inven_color' => $this->inven_color,
            'inven_material' => $this->inven_material,
            'inven_marca' => $this->inven_marca,
            'inven_colocacion' => $this->inven_colocacion,
            'inven_estado' => $this->inven_estado,
            'inven_piso_id' => $this->inven_piso_id,
            'inven_emple_id' => $this->inven_emple_id,
        ]);

        $query->andFilterWhere(['like', 'upper(inven_descripcion)', strtoupper($this->inven_descripcion)])
            ->andFilterWhere(['like', 'upper(inven_caracteristica)',strtoupper( $this->inven_caracteristica)])
            ->andFilterWhere(['like', 'upper(inven_modelo)', strtoupper($this->inven_modelo)])
            ->andFilterWhere(['like', 'upper(inven_numero_serie)',strtoupper( $this->inven_numero_serie)])
            ->andFilterWhere(['like', 'upper(inven_numero_inventario)', strtoupper($this->inven_numero_inventario)])
            ->andFilterWhere(['like', 'inven_observaciones', $this->inven_observaciones])
            ->andFilterWhere(['like', 'inven_alta', $this->inven_alta])
            ->andFilterWhere(['like', 'inven_actualizacion', $this->inven_actualizacion]);

        return $dataProvider;
    }
}
