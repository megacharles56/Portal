<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados_republica".
 *
 * @property int $esrep_id
 * @property string $esrep_estado
 *
 * @property Importcp[] $importcps
 */
class EstadosRepublica extends \yii\db\ActiveRecord
{
     public $prefijo = 'estad'  ;
     public $id_field = 'estad_id';
      
     public $updateAcc = 'estadosrepublica/update';
     public $viewAcc   = 'estadosrepublica/view';
     public $deleteAcc = 'estadosrepublica/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estados_republica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['esrep_estado'], 'required'],
            [['esrep_estado'], 'string', 'max' => 48],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'esrep_id' => '#',
            'esrep_estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImportcps()
    {
        return $this->hasMany(Importcp::className(), ['c_estado' => 'esrep_id']);
    }
}
