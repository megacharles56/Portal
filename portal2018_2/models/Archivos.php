<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivos".
 *
 * @property int $archi_id
 * @property int $autor
 * @property int $emple_id
 * @property string $modificacion
 * @property string $archi_archivo
 * @property string $archi_nombre
 * @property int $archi_destinatario
 *
 * @property Personas $autor0
 * @property Empleados $emple
 * @property Empleados $archiDestinatario
 */
class Archivos extends \yii\db\ActiveRecord {

    public $prefijo = 'archi';
    public $id_field = 'archi_id';
    public $updateAcc = 'archivos/update';
    public $viewAcc = 'archivos/view';
    public $deleteAcc = 'archivos/delete';
    public $_archivo;
    public $_estructura;
    public $_empleado;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'archivos';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['autor', 'emple_id', 'archi_destinatario'], 'required'],
            [['autor', 'emple_id', 'archi_destinatario'], 'integer'],
            [['_archivo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf'],
            [['modificacion'], 'safe'],
            [['archi_archivo', 'archi_nombre'], 'string', 'max' => 24],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['emple_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['emple_id' => 'emple_id']],
            [['archi_destinatario'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['archi_destinatario' => 'emple_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'archi_id' => '#',
            'autor' => '# Autor',
            'emple_id' => '# Emple',
            'modificacion' => 'Modificacion',
            'archi_archivo' => 'Archivo',
            'archi_nombre' => 'Nombre',
            'archi_destinatario' => '# Destinatario',
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
    public function getEmple() {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'emple_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchiDestinatario() {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'archi_destinatario']);
    }

}
