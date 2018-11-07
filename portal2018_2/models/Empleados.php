<?php

namespace app\models;

use Yii;
use app\models\DaysAYear;
use yii\web\NotFoundHttpException;

function dias_pasados($fecha_inicial, $fecha_final) {
    $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
    $dias = abs($dias / 365.25);
    $dias = floor($dias);
    return $dias;
}

/**
 * This is the model class for table "empleados".
 *
 * @property int $emple_id
 * @property int $autor
 * @property string $historia
 * @property string $modificacion
 * @property int $estad_id
 * @property int $perso_id
 * @property int $emple_num_nomina
 * @property int $perpu_id
 * @property string $emple_horario
 * @property string $emple_jornada_laboral
 * @property string $emple_descanso_semanal
 * @property string $emple_nss
 * @property string $emple_terminacion_contrato
 * @property int $emple_jefe
 * @property string $emple_usuario
 * @property string $emple_clave_sistemas
 * @property string $emple_ingreso 
 * @property int $emple_cantidad_dias 
 * @property int $emple_antiguedad 
 * @property string $emple_tel_1
 * @property string $emple_tel_2
 * @property string $emple_correo_1
 * @property string $emple_correo_2
 * @property int $piso_id
 *  
 * @property Variables $estad
 * @property Personas $perso
 * @property PerfilesPuesto $perpu
 * @property Empleados $empleJefe
 * @property Empleados[] $empleados
 *
 * @property Eventos[] $eventos
 * @property Autorizaciones[] $autorizaciones 
 * @property Pisos $piso
 * @property PermisoLaboral[] $permisoLaborals
 * @property Inventario[] $inventarios
 * @property Mantenimiento[] $mantenimientos
 * 
 *  */
class Empleados extends \yii\db\ActiveRecord {

    public $prefijo = 'emple';
    public $id_field = 'emple_id';
    public $updateAcc = 'empleados/update';
    public $viewAcc = 'empleados/view';
    public $deleteAcc = 'empleados/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['autor', 'estad_id', 'perso_id', 'emple_num_nomina', 'perpu_id',
            'emple_horario', 'emple_usuario', 'emple_clave_sistemas'], 'required'],
            [['autor', 'estad_id', 'perso_id', 'emple_num_nomina', 'perpu_id', 'emple_jefe',
            'emple_cantidad_dias', 'emple_antiguedad'], 'integer'],
            [['historia', 'emple_terminacion_contrato', 'emple_ingreso'], 'string'],
            [['modificacion'], 'safe'],
            [['emple_horario', 'emple_jornada_laboral', 'emple_descanso_semanal'], 'string', 'max' => 48],
            [['emple_usuario', 'emple_clave_sistemas', 'emple_tel_1', 'emple_tel_2'], 'string', 'max' => 24],
            [['emple_usuario', 'emple_nss'], 'string', 'max' => 12],
            [['emple_num_nomina'], 'unique'],
            [['perso_id'], 'unique'],
            [['emple_usuario'], 'unique'],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
            [['perso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['perso_id' => 'perso_id']],
            [['perpu_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilesPuesto::className(), 'targetAttribute' => ['perpu_id' => 'perpu_id']],
            [['emple_jefe'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['emple_jefe' => 'emple_id']],
            [['piso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pisos::className(), 'targetAttribute' => ['piso_id' => 'piso_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'emple_id' => '#',
            'autor' => 'Autor',
            'historia' => 'Historia',
            'modificacion' => 'Modificacion',
            'estad_id' => '# Estado',
            'perso_id' => '# Persona',
            'emple_num_nomina' => 'Num Nomina',
            'emple_nss' => 'NSS',
            'perpu_id' => '# Perfil de puesto',
            'emple_horario' => 'Horario',
            'emple_jornada_laboral' => 'Jornada Laboral',
            'emple_descanso_semanal' => 'Descanso Semanal',
            'emple_terminacion_contrato' => 'Terminacion Contrato',
            'emple_jefe' => '# Jefe',
            'emple_usuario' => 'Usuario',
            'emple_clave_sistemas' => 'Clave Sistemas',
            'emple_ingreso' => 'Fecha de Ingreso',
            'emple_cantidad_dias' => 'Cantidad de Dias',
            'emple_antiguedad' => 'Antiguedad',
            'emple_tel_1' => 'Tel 1',
            'emple_tel_2' => 'Tel 2',
            'emple_correo_1' => '1',
            'emple_correo_2' => '2',
            'piso_id' => 'Piso ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0() {
        return $this->hasOne(Personas::className(), ['perso_id' => 'autor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstad() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'estad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerso() {
        return $this->hasOne(Personas::className(), ['perso_id' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerpu() {
        return $this->hasOne(PerfilesPuesto::className(), ['perpu_id' => 'perpu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleJefe() {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'emple_jefe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados() {
        return $this->hasMany(Empleados::className(), ['emple_jefe' => 'emple_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getAutorizaciones() {
        return $this->hasMany(Autorizaciones::className(), ['autor_autoriza' => 'emple_id']);
    }

    public function getPermisoLaborals() {
        return $this->hasMany(PermisoLaboral::className(), ['emple_id' => 'emple_id']);
    }

    /* @return \yii\db\ActiveQuery
     */

    public function getPiso() {
        return $this->hasOne(Pisos::className(), ['piso_id' => 'piso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos() {
        return $this->hasMany(Eventos::className(), ['emple_id' => 'emple_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios() {
        return $this->hasMany(Inventario::className(), ['inven_emple_id' => 'emple_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientos() {
        return $this->hasMany(Mantenimiento::className(), ['manto_responsable' => 'emple_id']);
    }

    public function revisaAntiguedad() {
        // $model = $this->findModel($id);
        $hoy = date("Y/m/d");
        if (isset($this->emple_antiguedad)) {
            $diferencia = dias_pasados($hoy, $this->emple_ingreso);
            if ($diferencia > $this->emple_antiguedad) {
                $this->emple_antiguedad = $diferencia;
                $dias = DaysAYear::findOne(["dayea_year" => $diferencia])->dayea_days;
                $this->emple_cantidad_dias = $this->emple_cantidad_dias + $dias;
                $this->save();
            } else {
//                throw new NotFoundHttpException('aun no es el año');
            }
        } else {
            $diferencia = dias_pasados($hoy, $this->emple_ingreso);
            $this->emple_antiguedad = $diferencia;
            $dias = DaysAYear::findOne(["dayea_year" => $diferencia])->dayea_days;
            $this->emple_cantidad_dias = $this->emple_cantidad_dias + $dias;
            $this->save();
        }
    }

}
