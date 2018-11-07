<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contadorpagina".
 *
 * @property int $conpa_id
 * @property int $conpa_cantidad
 * @property string $conpa_pagina
 */
class Contadorpagina extends \yii\db\ActiveRecord
{
     public $prefijo = 'conta'  ;
     public $id_field = 'conta_id';
      
     public $updateAcc = 'contadorpagina/update';
     public $viewAcc   = 'contadorpagina/view';
     public $deleteAcc = 'contadorpagina/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contadorpagina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conpa_cantidad'], 'integer'],
            [['conpa_pagina'], 'string', 'max' => 48],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'conpa_id' => 'Conpa ID',
            'conpa_cantidad' => 'Conpa Cantidad',
            'conpa_pagina' => 'Conpa Pagina',
        ];
    }
}
