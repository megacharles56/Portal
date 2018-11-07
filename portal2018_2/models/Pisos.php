<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pisos".
 *
 * @property int $piso_id
 * @property int $edifi_id
 * @property string $piso_nombre
 *
 * @property Inventario[] $inventarios
 * @property Edificios $edifi
 */
class Pisos extends \yii\db\ActiveRecord
{
     public $prefijo = 'pisos'  ;
     public $id_field = 'piso_id';
      
     public $updateAcc = 'pisos/update';
     public $viewAcc   = 'pisos/view';
     public $deleteAcc = 'pisos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edifi_id', 'piso_nombre'], 'required'],
            [['edifi_id'], 'integer'],
            [['piso_nombre'], 'string', 'max' => 24],
            [['edifi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Edificios::className(), 'targetAttribute' => ['edifi_id' => 'edifi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'piso_id' => '#',
            'edifi_id' => 'Edificio',
            'piso_nombre' => 'Nombre Piso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['inven_piso_id' => 'piso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdifi()
    {
        return $this->hasOne(Edificios::className(), ['edifi_id' => 'edifi_id']);
    }
}
