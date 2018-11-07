<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vempleados;

/**
 * VempleadosSearch represents the model behind the search form of `app\models\Vempleados`.
 */
class VempleadosSearch extends Vempleados {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['emple_id', 'autor', 'estad_id', 'perso_id', 'emple_num_nomina', 'perpu_id', 'emple_cantidad_dias', 'emple_antiguedad', 'piso_id', 'peestadoid', 'peautor', 'estor_id', 'jfeempl_id'], 'integer'],
            [['historia', 'modificacion', 'emple_horario', 'emple_jornada_laboral', 'emple_descanso_semanal', 'emple_terminacion_contrato', 'emple_usuario',
                'emple_clave_sistemas', 'emple_ingreso', 'emple_nss', 'usuar_tel_1', 'usuar_tel_2', 'emple_correo_1', 'emple_correo_2', 'piso_nombre', 'edifi_nombre', 'pemodificacion', 'pehistoria', 'perso_nombre1', 'perso_nombre2', 'perso_nombre3', 'perso_paterno', 'perso_materno', 'perso_titulo', 'perso_sobrenombre', 'perso_rfc', 'perso_curp', 'perso_nombre', 'perso_nacionalidad', 'perso_fecha_nacimiento', 'perso_sexo', 'peestado', 'penombre_autor', 'iniciales',
                'perpu_nombre_completo', 'estor_nombre_completo', 'estor_superior', 'estor_sup_nombre_completo', 'jfenombre', 'estado', 'nombre_autor'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Vempleados::find();

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
            'emple_id' => $this->emple_id,
            'autor' => $this->autor,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'perso_id' => $this->perso_id,
            'emple_num_nomina' => $this->emple_num_nomina,
            'perpu_id' => $this->perpu_id,
            'emple_cantidad_dias' => $this->emple_cantidad_dias,
            'emple_antiguedad' => $this->emple_antiguedad,
            'pemodificacion' => $this->pemodificacion,
            'peestadoid' => $this->peestadoid,
            'peautor' => $this->peautor,
            'estor_id' => $this->estor_id,
            'jfeempl_id' => $this->jfeempl_id,
        ]);

        $query->andFilterWhere(['like', 'historia', $this->historia])
                ->andFilterWhere(['like', 'emple_horario', $this->emple_horario])
                ->andFilterWhere(['like', 'emple_jornada_laboral', $this->emple_jornada_laboral])
                ->andFilterWhere(['like', 'emple_descanso_semanal', $this->emple_descanso_semanal])
                ->andFilterWhere(['like', 'emple_terminacion_contrato', $this->emple_terminacion_contrato])
                ->andFilterWhere(['like', 'emple_usuario', $this->emple_usuario])
                ->andFilterWhere(['like', 'emple_clave_sistemas', $this->emple_clave_sistemas])
                ->andFilterWhere(['like', 'emple_ingreso', $this->emple_ingreso])
                ->andFilterWhere(['like', 'emple_nss', $this->emple_nss])
                ->andFilterWhere(['like', 'usuar_tel_1', $this->usuar_tel_1])
                ->andFilterWhere(['like', 'usuar_tel_2', $this->usuar_tel_2])
                ->andFilterWhere(['like', 'usuar_correo_1', $this->usuar_correo_1])
                ->andFilterWhere(['like', 'usuar_correo_2', $this->usuar_correo_2])
                ->andFilterWhere(['like', 'piso_nombre', $this->piso_nombre])
                ->andFilterWhere(['like', 'edifi_nombre', $this->edifi_nombre])
                ->andFilterWhere(['like', 'pehistoria', $this->pehistoria])
                ->andFilterWhere(['like', 'perso_nombre1', $this->perso_nombre1])
                ->andFilterWhere(['like', 'perso_nombre2', $this->perso_nombre2])
                ->andFilterWhere(['like', 'perso_nombre3', $this->perso_nombre3])
                ->andFilterWhere(['like', 'perso_paterno', $this->perso_paterno])
                ->andFilterWhere(['like', 'perso_materno', $this->perso_materno])
                ->andFilterWhere(['like', 'perso_titulo', $this->perso_titulo])
                ->andFilterWhere(['like', 'perso_sobrenombre', $this->perso_sobrenombre])
                ->andFilterWhere(['like', 'perso_rfc', $this->perso_rfc])
                ->andFilterWhere(['like', 'perso_curp', $this->perso_curp])
                ->andFilterWhere(['like', 'perso_nombre',   strtoupper(   $this->perso_nombre)] )
                ->andFilterWhere(['like', 'perso_nacionalidad', $this->perso_nacionalidad])
                ->andFilterWhere(['like', 'perso_fecha_nacimiento', $this->perso_fecha_nacimiento])
                ->andFilterWhere(['like', 'perso_sexo', $this->perso_sexo])
                ->andFilterWhere(['like', 'peestado', $this->peestado])
                ->andFilterWhere(['like', 'penombre_autor', $this->penombre_autor])
                ->andFilterWhere(['like', 'iniciales', $this->iniciales])
                ->andFilterWhere(['like', 'perpu_nombre_completo', $this->perpu_nombre_completo])
                ->andFilterWhere(['like', 'estor_nombre_completo', $this->estor_nombre_completo])
                ->andFilterWhere(['like', 'estor_superior', $this->estor_superior])
                ->andFilterWhere(['like', 'estor_sup_nombre_completo', $this->estor_sup_nombre_completo])
                ->andFilterWhere(['like', 'jfenombre', $this->jfenombre])
                ->andFilterWhere(['like', 'estado', $this->estado])
                ->andFilterWhere(['like', 'nombre_autor', $this->nombre_autor]);

        return $dataProvider;
    }

}
