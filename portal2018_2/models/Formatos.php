<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formatos".
 *
 * @property int $forma_id
 * @property string $forma_nombre
 * @property string $forma_url
 */
class Formatos extends \yii\db\ActiveRecord
{
     public $prefijo = 'forma'  ;
     public $id_field = 'forma_id';
      
     public $updateAcc = 'formatos/update';
     public $viewAcc   = 'formatos/view';
     public $deleteAcc = 'formatos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formatos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['forma_nombre'], 'required'],
            [['forma_nombre', 'forma_url'], 'string', 'max' => 48],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'forma_id' => '#',
            'forma_nombre' => 'Formato',
            'forma_url' => 'Url',
        ];
    }
}
