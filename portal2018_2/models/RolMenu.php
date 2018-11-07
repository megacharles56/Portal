<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_menu".
 *
 * @property int $rolme_id
 * @property int $rol_id
 * @property string $rolme_label
 * @property string $rolme_url
 * @property int $rolme_orden
 * @property string $rolme_tooltip
 * 
 * @property Roles $rol
 */
class RolMenu extends \yii\db\ActiveRecord {

    public $prefijo = 'rolme';
    public $id_field = 'rolme_id';
    public $updateAcc = 'rol-menu/update';
    public $viewAcc = 'rol-menu/view';
    public $deleteAcc = 'rol-menu/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'rol_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['rol_id', 'rolme_orden'], 'integer'],
            [['rolme_label', 'rolme_url'], 'required'],
            [['rolme_tooltip'], 'string', 'max' => 48],
            [['rolme_label', 'rolme_url'], 'string', 'max' => 64],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['rol_id' => 'rol_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'rolme_id' => '#',
            'rol_id' => '# Rol',
            'rolme_label' => 'Label',
            'rolme_url' => 'Url',
            'rolme_tooltip' => 'Tooltip',
            'rolme_orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol() {
        return $this->hasOne(Roles::className(), ['rol_id' => 'rol_id']);
    }

}
