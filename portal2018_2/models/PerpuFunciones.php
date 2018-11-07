<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perpu_funciones".
 *
 * @property int $pfunc_id
 * @property int $autor
 * @property string $modificacion
 * @property int $perpu_id
 * @property string $pfunc_funcion
 *
 * @property Personas $autor0
 * @property PerfilesPuesto $perpu
 */
class PerpuFunciones extends \yii\db\ActiveRecord
{
     public $prefijo = 'pfunc'  ;
     public $id_field = 'pfunc_id';
      
     public $updateAcc = 'perpu-funciones/update';
     public $viewAcc   = 'perpu-funciones/view';
     public $deleteAcc = 'perpu-funciones/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perpu_funciones';
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
            [['pfunc_funcion'], 'string', 'max' => 256],
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
            'pfunc_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificación',
            'perpu_id' => '# perfil funciones',
            'pfunc_funcion' => 'Función',
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
