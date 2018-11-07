<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuar_rol".
 *
 * @property int $usrol_id
 * @property int $usuar_id
 * @property int $rol_id
 *
 * @property Usuarios $usuar
 * @property Roles $rol
 */
class UsuarRol extends \yii\db\ActiveRecord
{
     public $prefijo = 'usrol'  ;
     public $id_field = 'usrol_id';
      
     public $updateAcc = 'usuarrol/update';
     public $viewAcc   = 'usuarrol/view';
     public $deleteAcc = 'usuarrol/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuar_rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuar_id', 'rol_id'], 'required'],
            [['usuar_id', 'rol_id'], 'integer'],
            [['usuar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuar_id' => 'usuar_id']],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['rol_id' => 'rol_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usrol_id' => '#',
            'usuar_id' => '# usuario',
            'rol_id' => '# rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuar()
    {
        return $this->hasOne(Usuarios::className(), ['usuar_id' => 'usuar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Roles::className(), ['rol_id' => 'rol_id']);
    }
}
