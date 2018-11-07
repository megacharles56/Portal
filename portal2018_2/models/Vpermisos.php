<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vpermisos".
 *
 * @property int $permi_id
 * @property int $usuar_id
 * @property string $rol_nombre
 * @property string $permi_clase
 * @property string $metodo
 * @property string $campo
 * @property int $nivel
 */
class Vpermisos extends \yii\db\ActiveRecord
{
     public $prefijo = 'vperm'  ;
     public $id_field = 'vperm_id';
      
     public $updateAcc = 'vpermisos/update';
     public $viewAcc   = 'vpermisos/view';
     public $deleteAcc = 'vpermisos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'VPermisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuar_id', 'permi_nivel'], 'integer'],
            [['rol_nombre'], 'string', 'max' => 48],
            [['permi_clase', 'permi_metodo', 'permi_campo'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'permi_id' => 'Permi ID',
            'usuar_id' => 'Usuar ID',
            'rol_nombre' => 'Rol Nombre',
            'permi_clase' => 'Permi Clase',
            'metodo' => 'Metodo',
            'permi_campo' => 'Campo',
            'permi_nivel' => 'Nivel',
        ];
    }
    
}
