<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfiles_puesto".
 *
 * @property int $perpu_id
 * @property int $reporta_a
 * @property int $autor
 * @property string $historia
 * @property string $modificacion
 * @property int $estad_id
 * @property string $perpu_nombre
 * @property string $perpu_complemento
 * @property int $estor_id
 * @property int $perpu_genero
 * @property int $perpu_estado_civil
 * @property int $perpu_edad_minima
 * @property int $perpu_edad_maxima
 * @property string $perpu_expe_interna
 * @property string $perpu_expe_externa
 * @property string $perpu_expe_especialidad
 * @property int $perpu_escolaridad
 * @property string $perpu_objetivo
 * @property string $perpu_nombre_completo
 *
 * @property PerfilesPuesto $reportaA
 * @property PerfilesPuesto[] $perfilesPuestos
 * @property Personas $autor0
 * @property Variables $estad
 * @property EstructuraOrganica $estor
 * @property Variables $perpuGenero
 * @property Variables $perpuEstadoCivil
 * @property Variables $perpuEscolaridad
 * @property string $perpu_escolaridad_especialidad
 *  
 * @property Empleados[] $empleados 
 * @property PerpuHabilidad[] $perpuHabilidads 
 * @property PerpuFunciones[] $perpuFunciones 
 * @property PpRelacionesExt[] $ppRelacionesExts 
 * @property PerpuFormacion[] $perpuFormacions 
 * 
 */
class PerfilesPuesto extends \yii\db\ActiveRecord {

    public $prefijo = 'perpu';
    public $id_field = 'perpu_id';
    public $updateAcc = 'perfilespuesto/update';
    public $viewAcc = 'perfilespuesto/view';
    public $deleteAcc = 'perfilespuesto/delete';
    public $_tipoEstructura;  /*campo auxiliar para facilitar captura*/
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'perfiles_puesto';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['reporta_a', 'autor', 'estad_id', 'estor_id', 'perpu_genero', 'perpu_estado_civil', 'perpu_edad_minima', 'perpu_edad_maxima', 'perpu_escolaridad'], 'integer'],
            [['autor', 'estad_id', 'perpu_nombre', 'estor_id', 'perpu_genero', 'perpu_estado_civil', 'perpu_edad_minima', 'perpu_edad_maxima'], 'required'],
            [['historia'], 'string'],
            [['modificacion'], 'safe'],
            [['perpu_nombre', 'perpu_complemento', ], 'string', 'max' => 48],
            [['perpu_nombre', 'perpu_complemento', 'perpu_escolaridad_especialidad'], 'string', 'max' => 64],
            [['perpu_expe_interna', 'perpu_expe_externa'], 'string', 'max' => 24],
            [['perpu_objetivo'], 'string', 'max' => 2048],
            [['perpu_nombre', 'perpu_complemento'], 'unique', 'targetAttribute' => ['perpu_nombre', 'perpu_complemento']],
            [['reporta_a'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilesPuesto::className(), 'targetAttribute' => ['reporta_a' => 'perpu_id']],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['perpu_expe_especialidad'], 'string', 'max' => 64],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
            [['estor_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstructuraOrganica::className(), 'targetAttribute' => ['estor_id' => 'estor_id']],
            [['perpu_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['perpu_genero' => 'varia_id']],
            [['perpu_estado_civil'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['perpu_estado_civil' => 'varia_id']],
            [['perpu_escolaridad'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['perpu_escolaridad' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'perpu_id' => '#',
            'reporta_a' => '# Reporta ',
            'autor' => 'Autor',
            'historia' => 'Historia',
            'modificacion' => 'Modificacion',
            'estad_id' => '# estado',
            'perpu_nombre' => 'Nombre',
            'perpu_complemento' => 'Complemento',
            'estor_id' => '# Estructura Orgánica',
            'perpu_genero' => 'Genero',
            'perpu_estado_civil' => 'Estado Civil',
            'perpu_edad_minima' => 'Edad Minima',
            'perpu_edad_maxima' => 'Edad Maxima',
            'perpu_expe_interna' => 'Experiencia Interna',
            'perpu_expe_externa' => 'Experiencia Externa',
            'perpu_expe_especialidad' => 'Experiencia en Especialidad',
            'perpu_escolaridad' => 'Escolaridad',
            'perpu_objetivo' => 'Objetivo',
            'perpu_nombre_completo' => 'Nombre Completo',
            'perpu_escolaridad_especialidad'=>'Epecialidad Escolar'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportaA() {
        return $this->hasOne(PerfilesPuesto::className(), ['perpu_id' => 'reporta_a']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilesPuestos() {
        return $this->hasMany(PerfilesPuesto::className(), ['reporta_a' => 'perpu_id']);
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
    public function getEstor() {
        return $this->hasOne(EstructuraOrganica::className(), ['estor_id' => 'estor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerpuGenero() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'perpu_genero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerpuEstadoCivil() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'perpu_estado_civil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerpuEscolaridad() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'perpu_escolaridad']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getEmpleados() {
        return $this->hasMany(Empleados::className(), ['perpu_id' => 'perpu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerpuHabilidads() {
        return $this->hasMany(PerpuHabilidad::className(), ['perpu_id' => 'perpu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerpuFunciones() {
        return $this->hasMany(PerpuFunciones::className(), ['perpu_id' => 'perpu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPpRelacionesExts() {
        return $this->hasMany(PpRelacionesExt::className(), ['perpu_id' => 'perpu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getPerpuFormacions() {
        return $this->hasMany(PerpuFormacion::className(), ['perpu_id' => 'perpu_id']);
    }

}
