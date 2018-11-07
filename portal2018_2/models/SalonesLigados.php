<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salones_ligados".
 *
 * @property int $salig_id
 * @property int $salon_id
 * @property int $salig_salon_ligado 
 *
 * @property Salones $salon
 * @property Salones $saligSalonLigado 
 *  */
class SalonesLigados extends \yii\db\ActiveRecord {

    public $prefijo = 'salig';
    public $id_field = 'salig_id';
    public $updateAcc = 'salones-ligados/update';
    public $viewAcc = 'salones-ligados/view';
    public $deleteAcc = 'salones-ligados/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'salones_ligados';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['salon_id', 'salig_salon_ligado'], 'required'],
            [['salon_id', 'salig_salon_ligado'], 'integer'],
            [['salon_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Salones::className(),
                'targetAttribute' => ['salon_id' => 'salon_id']],
            [['salig_salon_ligado'], 'exist', 'skipOnError' => true,
                'targetClass' => Salones::className(),
                'targetAttribute' => ['salig_salon_ligado' => 'salon_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'salig_id' => 'Salig ID',
            'salon_id' => 'Salon ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalon() {
        return $this->hasOne(Salones::className(), ['salon_id' => 'salon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getSaligSalonLigado() {
        return $this->hasOne(Salones::className(), ['salon_id' => 'salig_salon_ligado']);
    }

}
