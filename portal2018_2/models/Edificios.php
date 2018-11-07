<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edificios".
 *
 * @property int $edifi_id
 * @property string $edifi_nombre
 *
 * @property Pisos[] $pisos
 */
class Edificios extends \yii\db\ActiveRecord
{
     public $prefijo = 'edifi'  ;
     public $id_field = 'edifi_id';
      
     public $updateAcc = 'edificios/update';
     public $viewAcc   = 'edificios/view';
     public $deleteAcc = 'edificios/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edificios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edifi_nombre'], 'required'],
            [['edifi_nombre'], 'string', 'max' => 24],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'edifi_id' => '#',
            'edifi_nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPisos()
    {
        return $this->hasMany(Pisos::className(), ['edifi_id' => 'edifi_id']);
    }
}
