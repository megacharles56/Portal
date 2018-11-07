<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permiso_laboral".
 *
 * @property int $perla_id
 * @property int $autor
 * @property string $modificacion
 * @property int $estad_id
 * @property string $perla_dia_inicial
 * @property string $perla_hora_inicial
 * @property string $perla_hora_final
 * @property string $perla_dia_final
 * @property int $perla_asunto
 * @property string $perla_observaciones
 * @property int $emple_id
 * @property string $perla_tipo 
 * @property Empleados $emple
 * @property Usuarios $perlaFirmante1
 * @property Usuarios $perlaFirmante2 
 * 
 * 
 * 
 * @property Autorizaciones[] $autorizaciones
 * @property Personas $autor0
 * @property Variables $estad
 * @property Variables $perlaAsunto
 * @property Empleados $emple 
 */
class PermisoLaboral extends \yii\db\ActiveRecord {

    public $prefijo = 'perla';
    public $id_field = 'perla_id';
    public $dia1 ;
    public $dia2;
    public $updateAcc = 'permiso-laboral/update';
    public $viewAcc = 'permiso-laboral/view';
    public $deleteAcc = 'permiso-laboral/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'permiso_laboral';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['autor', 'estad_id',  'perla_asunto', 'perla_tipo', 'emple_id'], 'required'],
            [['autor', 'estad_id', 'perla_asunto', 'emple_id',
            'perla_firmante_1', 'perla_firmante_2'], 'integer'],
            [['modificacion'], 'safe'],
            [['perla_dia_inicial', 'perla_hora_inicial', 'perla_hora_final', 'perla_dia_final', 'dia1', 'dia2'], 'string', 'max'=>12],
            [['perla_observaciones'], 'string', 'max' => 256],
            [['perla_tipo'], 'string', 'max' => 12],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
            [['perla_asunto'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['perla_asunto' => 'varia_id']],
            [['emple_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['emple_id' => 'emple_id']],
            [['perla_firmante_1'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['perla_firmante_1' => 'usuar_id']],
            [['perla_firmante_2'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['perla_firmante_2' => 'usuar_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'perla_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificacion',
            'estad_id' => '# estado',
            'perla_dia_inicial' => 'El día',
            'perla_hora_inicial' => 'Hora Inicial',
            'perla_hora_final' => 'Hora Final',
            'perla_dia_final' => 'Dia Final',
            'perla_asunto' => 'Asunto',
            'perla_observaciones' => 'Observaciones',
            'perla_tipo' => 'Tipo de permiso',
            'emple_id' => '#Empleado',
            'dia1' => 'Del día',
            'dia2' => 'al día',
            'estad' => 'Estado',
            'perla_firmante_1' => 'Firmante 1',
            'perla_firmante_2' => 'Firmante 2',];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorizaciones() {
        return $this->hasMany(Autorizaciones::className(), ['perla_id' => 'perla_id']);
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
    public function getPerlaAsunto() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'perla_asunto']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEmple() {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'emple_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerlaFirmante1() {
        return $this->hasOne(Usuarios::className(), ['usuar_id' => 'perla_firmante_1']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerlaFirmante2() {
        return $this->hasOne(Usuarios::className(), ['usuar_id' => 'perla_firmante_2']);
    }

}
