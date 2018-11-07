<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_permisos".
 *
 * @property int $rolpe_id
 * @property int $rol_id
 * @property int $permi_id
 *
 * @property Roles $rolpeRol
 * @property Permisos $rolpePermi
 */
class RolPermisos extends \yii\db\ActiveRecord
{
     public $prefijo = 'rolpe'  ;
     public $id_field = 'rolpe_id';
      
     public $updateAcc = 'rolpermisos/update';
     public $viewAcc   = 'rolpermisos/view';
     public $deleteAcc = 'rolpermisos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_permisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_id', 'permi_id'], 'required'],
            [['rol_id', 'permi_id'], 'integer'],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['rol_id' => 'rol_id']],
            [['permi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permisos::className(), 'targetAttribute' => ['permi_id' => 'permi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rolpe_id' => '#',
            'rol_id' => '# Rol',
            'permi_id' => '# permiso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolpeRol()
    {
        return $this->hasOne(Roles::className(), ['rol_id' => 'rol_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolpePermi()
    {
        return $this->hasOne(Permisos::className(), ['permi_id' => 'permi_id']);
    }
}
