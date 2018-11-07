<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleados;

/**
 * EmpleadosSearch represents the model behind the search form of `app\models\Empleados`.
 */
class EmpleadosSearch extends Empleados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emple_id', 'autor', 'estad_id', 'perso_id', 'emple_num_nomina', 
                'perpu_id', 'emple_jefe', 'emple_cantidad_dias','emple_antiguedad'], 'integer'],
            [['historia', 'modificacion', 'emple_horario', 'emple_jornada_laboral', 
                'emple_descanso_semanal', 
                'emple_terminacion_contrato', 'emple_usuario', 'emple_clave_sistemas', 'emple_ingreso'], 'safe'],
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
        $query = Empleados::find();

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

        
        $activo =   Variables::findOne(['varia_tabla' => '*', 
            'varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->varia_id;  
        
        // grid filtering conditions
        $query->andFilterWhere([
            'emple_id' => $this->emple_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $activo,
            'perso_id' => $this->perso_id,
            'emple_num_nomina' => $this->emple_num_nomina,
            'perpu_id' => $this->perpu_id,
            'emple_jefe' => $this->emple_jefe,
            'emple_cantidad_dias' => $this->emple_cantidad_dias,
            'emple_antiguedad' => $this->emple_antiguedad, 
        ]);

        $query->andFilterWhere(['like', 'historia', $this->historia])
            ->andFilterWhere(['like', 'emple_horario', $this->emple_horario])
            ->andFilterWhere(['like', 'upper(  emple_jornada_laboral)', strtoupper( $this->emple_jornada_laboral)])
            ->andFilterWhere(['like', 'upper(emple_descanso_semanal)', strtoupper( $this->emple_descanso_semanal)])
            //->andFilterWhere(['like', 'emple_lugar_trabajo', $this->emple_lugar_trabajo])
            ->andFilterWhere(['like', 'emple_terminacion_contrato', $this->emple_terminacion_contrato])
            ->andFilterWhere(['like', 'upper(emple_usuario)', strtoupper($this->emple_usuario)])
            ->andFilterWhere(['like', 'upper(emple_clave_sistemas)',strtoupper( $this->emple_clave_sistemas)])
            ->andFilterWhere(['like', 'emple_ingreso', $this->emple_ingreso]);

        return $dataProvider;
    }
}
