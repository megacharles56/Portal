<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salones".
 *
 * @property int $salon_id
 * @property string $salon_nombre
 * @property int $salon_ubicacion
 *
 * @property Variables $salonUbicacion
 * @property SalonesLigados[] $salonesLigados
 * @property SalonesLigados[] $salonesLigados0 
 * @property Eventos[] $eventos
 */
class Salones extends \yii\db\ActiveRecord {

    public $prefijo = 'salon';
    public $id_field = 'salon_id';
    public $updateAcc = 'salones/update';
    public $viewAcc = 'salones/view';
    public $deleteAcc = 'salones/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'salones';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['salon_nombre', 'salon_ubicacion'], 'required'],
            [['salon_ubicacion'], 'integer'],
            [['salon_nombre'], 'string', 'max' => 24],
            [['salon_ubicacion'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['salon_ubicacion' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'salon_id' => '#',
            'salon_nombre' => 'Nombre',
            'salon_ubicacion' => 'Ubicación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalonUbicacion() {
        return $this->hasOne(Variables::className(), ['varia_id' => 'salon_ubicacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalonesLigados() {
        return $this->hasMany(SalonesLigados::className(), ['salon_id' => 'salon_id']);
    }

    public function getSalonesLigados0() {
        return $this->hasMany(SalonesLigados::className(), ['salig_salon_ligado' => 'salon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos() {
        return $this->hasMany(Eventos::className(), ['salon_id' => 'salon_id']);
    }

}
