<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pp_relaciones_ext".
 *
 * @property int $prele_id
 * @property int $autor
 * @property string $modificacion
 * @property int $perpu_id
 * @property string $prele_relacion
 *
 * @property Personas $autor0
 * @property PerfilesPuesto $perpu
 */
class PpRelacionesExt extends \yii\db\ActiveRecord
{
     public $prefijo = 'prele'  ;
     public $id_field = 'prele_id';
      
     public $updateAcc = 'pp-relaciones-ext/update';
     public $viewAcc   = 'pp-relaciones-ext/view';
     public $deleteAcc = 'pp-relaciones-ext/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pp_relaciones_ext';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'perpu_id', 'prele_relacion'], 'required'],
            [['autor', 'perpu_id'], 'integer'],
            [['modificacion'], 'safe'],
            [['prele_relacion'], 'string', 'max' => 256],
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
            'prele_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificación',
            'perpu_id' => '# Pefil de puesto',
            'prele_relacion' => 'Relación',
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
