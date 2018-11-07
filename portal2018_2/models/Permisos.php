<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permisos".
 *
 * @property int $permi_id
 * @property string $permi_metodo
 * @property string $permi_campo
 * @property int $clase_id
 * @property int $permi_nivel
 *
 * @property Clases $clase
 * @property RolPermisos[] $rolPermisos
 */
class Permisos extends \yii\db\ActiveRecord
{
     public $prefijo = 'permi'  ;
     public $id_field = 'permi_id';
      
     public $updateAcc = 'permisos/update';
     public $viewAcc   = 'permisos/view';
     public $deleteAcc = 'permisos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_id'], 'required'],
            [['clase_id', 'permi_nivel'], 'integer'],
            [['permi_metodo', 'permi_campo'], 'string', 'max' => 64],
            [['clase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clases::className(), 'targetAttribute' => ['clase_id' => 'clase_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'permi_id' => '#',
            'permi_metodo' => 'Metodo',
            'permi_campo' => 'Campo',
            'clase_id' => '# Clase',
            'permi_nivel' => 'Nivel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClase()
    {
        return $this->hasOne(Clases::className(), ['clase_id' => 'clase_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolPermisos()
    {
        return $this->hasMany(RolPermisos::className(), ['rolpe_permi_id' => 'permi_id']);
    }
}
