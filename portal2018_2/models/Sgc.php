<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgc".
 *
 * @property int $sgc_id
 * @property int $autor
 * @property string $modificacion
 * @property string $sgc_documento
 * @property string $sgc_clave
 * @property string $sgc_revision
 * @property string $sgc_fecha
 * @property int $sgc_proceso
 *
 * @property Personas $autor0
 * @property Variables $sgcProceso
 */
class Sgc extends \yii\db\ActiveRecord
{
     public $prefijo = 'sgc'  ;
     public $id_field = 'sgc_id';
      
     public $updateAcc = 'sgc/update';
     public $viewAcc   = 'sgc/view';
     public $deleteAcc = 'sgc/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'sgc_documento', 'sgc_clave', 'sgc_revision', 'sgc_proceso'], 'required'],
            [['autor', 'sgc_proceso'], 'integer'],
            [['modificacion'], 'safe'],
            [['sgc_fecha'], 'string'],
            [['sgc_documento', 'sgc_clave', 'sgc_revision'], 'string', 'max' => 48],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['sgc_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['sgc_proceso' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sgc_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificación',
            'sgc_documento' => 'Documento',
            'sgc_clave' => 'Clave',
            'sgc_revision' => 'Revision',
            'sgc_fecha' => 'Fecha',
            'sgc_proceso' => 'Proceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(Personas::className(), ['perso_id' => 'autor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSgcProceso()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'sgc_proceso']);
    }
}
