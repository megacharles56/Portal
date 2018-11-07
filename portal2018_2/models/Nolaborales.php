<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nolaborales".
 *
 * @property int $nolab_id
 * @property string $nolab_dia
 * @property string $nolab_motivo
 */
class Nolaborales extends \yii\db\ActiveRecord
{
     public $prefijo = 'nolab'  ;
     public $id_field = 'nolab_id';
      
     public $updateAcc = 'nolaborales/update';
     public $viewAcc   = 'nolaborales/view';
     public $deleteAcc = 'nolaborales/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nolaborales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nolab_dia'], 'required'],
            [['nolab_dia'], 'string'],
            [['nolab_motivo'], 'string', 'max' => 24],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nolab_id' => '#ID',
            'nolab_dia' => 'Día',
            'nolab_motivo' => 'Motivo',
        ];
    }
}
