<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perpu_habilidad".
 *
 * @property int $phabi_id
 * @property int $autor
 * @property string $modificacion
 * @property int $perpu_id
 * @property string $phabi_habilidad
 *
 * @property Personas $autor0
 * @property PerfilesPuesto $perpu
 */
class PerpuHabilidad extends \yii\db\ActiveRecord
{
     public $prefijo = 'phabi'  ;
     public $id_field = 'phabi_id';
      
     public $updateAcc = 'perpu-habilidad/update';
     public $viewAcc   = 'perpu-habilidad/view';
     public $deleteAcc = 'perpu-habilidad/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perpu_habilidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'perpu_id'], 'required'],
            [['autor', 'perpu_id'], 'integer'],
            [['modificacion'], 'safe'],
            [['phabi_habilidad'], 'string', 'max' => 256],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['perpu_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilesPuesto::className(), 'targetAttribute' => ['perpu_id' => 'perpu_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phabi_id' => 'Phabi ID',
            'autor' => 'Autor',
            'modificacion' => 'Modificacion',
            'perpu_id' => 'Perpu ID',
            'phabi_habilidad' => 'Habilidad',
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
    public function getPerpu()
    {
        return $this->hasOne(PerfilesPuesto::className(), ['perpu_id' => 'perpu_id']);
    }
}
