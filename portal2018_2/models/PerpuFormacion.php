<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perpu_formacion".
 *
 * @property int $pform_id
 * @property int $autor
 * @property string $modificacion
 * @property int $perpu_id
 * @property string $pform_curso
 *
 * @property Personas $autor0
 * @property PerfilesPuesto $perpu
 */
class PerpuFormacion extends \yii\db\ActiveRecord
{
     public $prefijo = 'pform'  ;
     public $id_field = 'pform_id';
      
     public $updateAcc = 'perpu-formacion/update';
     public $viewAcc   = 'perpu-formacion/view';
     public $deleteAcc = 'perpu-formacion/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perpu_formacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'perpu_id', 'pform_curso'], 'required'],
            [['autor', 'perpu_id'], 'integer'],
            [['modificacion'], 'safe'],
            [['pform_curso'], 'string', 'max' => 256],
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
            'pform_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificación',
            'perpu_id' => '# perfil de puesto',
            'pform_curso' => 'Curso',
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
