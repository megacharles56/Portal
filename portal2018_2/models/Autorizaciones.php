<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autorizaciones".
 *
 * @property int $autor_id
 * @property int $autor_autoriza
 * @property string $modificacion
 * @property int $perla_id
 * @property string $autor_autorizacion
 *
 * @property Usuarios $autorAutoriza
 * @property PermisoLaboral $perla
 */
class Autorizaciones extends \yii\db\ActiveRecord {

    public $prefijo = 'autor';
    public $id_field = 'autor_id';
    public $perla_asunto;
    public $updateAcc = 'autorizaciones/update';
    public $viewAcc = 'autorizaciones/view';
    public $deleteAcc = 'autorizaciones/delete';
    public $autorizaAcc = 'autorizaciones/autoriza';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'autorizaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['autor_autoriza', 'perla_id', 'perla_asunto'], 'integer'],
            [['modificacion'], 'safe'],
            [['perla_id'], 'required'],
            [['autor_autorizacion'], 'string', 'max' => 2],
            [['autor_autoriza'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['autor_autoriza' => 'usuar_id']],
            [['perla_id'], 'exist', 'skipOnError' => true, 'targetClass' => PermisoLaboral::className(), 'targetAttribute' => ['perla_id' => 'perla_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'autor_id' => '# autorizacion',
            'autor_autoriza' => '# usuario Autoriza',
            'modificacion' => 'Modificacion',
            'perla_id' => '# permiso laboral',
            'autor_autorizacion' => 'Autorizacion',
            'perla_asunto'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorAutoriza() {
        return $this->hasOne(Usuarios::className(), ['usuar_id' => 'autor_autoriza']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerla() {
        return $this->hasOne(PermisoLaboral::className(), ['perla_id' => 'perla_id']);
    }

}
