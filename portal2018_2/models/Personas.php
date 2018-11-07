<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property int $perso_id
 * @property string $modificacion
 * @property int $estad_id
 * @property int $autor
 * @property string $historia
 * @property string $perso_nombre1
 * @property string $perso_nombre2
 * @property string $perso_nombre3
 * @property string $perso_paterno
 * @property string $perso_materno
 * @property string $perso_titulo
 * @property string $perso_sobrenombre
 * @property string $perso_rfc
 * @property string $perso_curp
  //* @property string $perso_nombre
 * @property string $perso_nacionalidad
 * @property string $perso_fecha_nacimiento
 * @property string $perso_sexo
 * @property int $domic_id
 * @property int $perso_estado_civil 
 * @property string $perso_email 
 * @property string $perso_telefono 
 * @property string $perso_lugar_nacimiento 
 * 
 * @property Variables $estad
 * @property Personas $autor0
 * @property Personas[] $personas
 * @property Domicilios $domic
 * 
 * @property EstructuraOrganica[] $estructuraOrganicas 
 * @property EstructuraContab[] $estructuraContabs 
 * @property PerfilesPuesto[] $perfilesPuestos 
 * @property Empleados[] $empleados 
 * @property Empleados $empleados0 
 * @property PerpuHabilidad[] $perpuHabilidads 
 * @property PerpuFunciones[] $perpuFunciones 
 * @property PpRelacionesExt[] $ppRelacionesExts 
 * @property PerpuFormacion[] $perpuFormacions 
 * @property PermisoLaboral[] $permisoLaborals 
 * @property int $perso_estado_civil
 * 
 */
class Personas extends \yii\db\ActiveRecord {

    public $prefijo = 'perso';
    public $id_field = 'perso_id';
    public $updateAcc = 'personas/update';
    public $viewAcc = 'personas/view';
    public $deleteAcc = 'personas/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['modificacion'], 'safe'],
            [['estad_id', 'perso_nombre1', 'perso_paterno'], 'required'],
            [['estad_id', 'autor', 'domic_id', 'perso_estado_civil'], 'integer'],
            [['historia', 'perso_fecha_nacimiento'], 'string'],
            [['perso_nombre1', 'perso_nombre2', 'perso_nombre3', 'perso_paterno', 'perso_materno', 'perso_titulo', 'perso_sobrenombre', 'perso_nacionalidad'], 'string', 'max' => 24],
            [['perso_rfc'], 'string', 'max' => 13],
            [['perso_curp'], 'string', 'max' => 18],
            [['perso_sexo', 'perso_telefono'], 'string', 'max' => 12],
            [['perso_lugar_nacimiento'], 'string', 'max' => 24],
            [['perso_email'], 'string', 'max' => 48],
            [['perso_rfc'], 'unique'],
            [['perso_curp'], 'unique'],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['perso_estado_civil' => 'varia_id']],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['domic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Domicilios::className(), 'targetAttribute' => ['domic_id' => 'domic_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'perso_id' => 'Perso ID',
            'modificacion' => 'Modificacion',
            'estad_id' => 'Estad ID',
            'autor' => 'Autor',
            'historia' => 'Historia',
            'perso_nombre1' => 'Nombre1',
            'perso_nombre2' => 'Nombre2',
            'perso_nombre3' => 'Nombre3',
            'perso_paterno' => 'Paterno',
            'perso_materno' => 'Materno',
            'perso_titulo' => 'Titulo',
            'perso_sobrenombre' => 'Sobrenombre',
            'perso_rfc' => 'RFC',
            'perso_curp' => 'CURP',
            'perso_nombre' => 'Nombre',
            'perso_nacionalidad' => 'Nacionalidad',
            'perso_fecha_nacimiento' => 'Fecha de Nacimiento',
            'perso_sexo' => 'Sexo',
            'domic_id' => '# domicilio',
            'perso_estado_civil' => 'Estado Civil',
            'perso_email' => 'Email',
            'perso_telefono' => 'Telefono',
            'perso_lugar_nacimiento' => 'Lugar Nacimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getpersoEstadoCivil() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'estad_id']);
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
    public function getAutor0() {
        return $this->hasOne(Personas::className(), ['perso_id' => 'autor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas() {
        return $this->hasMany(Personas::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomic() {
        return $this->hasOne(Domicilios::className(), ['domic_id' => 'domic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEstructuraOrganicas() {
        return $this->hasMany(EstructuraOrganica::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEstructuraContabs() {
        return $this->hasMany(EstructuraContab::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerfilesPuestos() {
        return $this->hasMany(PerfilesPuesto::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEmpleados() {
        return $this->hasMany(Empleados::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEmpleados0() {
        return $this->hasOne(Empleados::className(), ['perso_id' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerpuHabilidads() {
        return $this->hasMany(PerpuHabilidad::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerpuFunciones() {
        return $this->hasMany(PerpuFunciones::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPpRelacionesExts() {
        return $this->hasMany(PpRelacionesExt::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerpuFormacions() {
        return $this->hasMany(PerpuFormacion::className(), ['autor' => 'perso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPermisoLaborals() {
        return $this->hasMany(PermisoLaboral::className(), ['autor' => 'perso_id']);
    }

}
