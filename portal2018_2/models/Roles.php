<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $rol_id
 * @property string $rol_nombre

 * @property RolMenu[] $rolMenus 
 * @property UsuarRol[] $usuarRols 
 * @property RolPermisos[] $rolPermisos 
 */
class Roles extends \yii\db\ActiveRecord {

    public $prefijo = 'rol';
    public $id_field = 'rol_id';
    public $updateAcc = 'roles/update';
    public $viewAcc = 'roles/view';
    public $deleteAcc = 'roles/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['rol_nombre'], 'required'],
            [['rol_nombre'], 'string', 'max' => 48],
            [['rol_nombre'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'rol_id' => '#',
            'rol_nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getRolMenus() {
        return $this->hasMany(RolMenu::className(), ['rol_id' => 'rol_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getUsuarRols() {
        return $this->hasMany(UsuarRol::className(), ['rol_id' => 'rol_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getRolPermisos() {
        return $this->hasMany(RolPermisos::className(), ['rol_id' => 'rol_id']);
    }

}
