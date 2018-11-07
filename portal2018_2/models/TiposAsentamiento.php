<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_asentamiento".
 *
 * @property int $tasen_id
 * @property string $tasen_nombre
 *
 * @property Importcp[] $importcps
 */
class TiposAsentamiento extends \yii\db\ActiveRecord
{
     public $prefijo = 'tipos'  ;
     public $id_field = 'tipos_id';
      
     public $updateAcc = 'tiposasentamiento/update';
     public $viewAcc   = 'tiposasentamiento/view';
     public $deleteAcc = 'tiposasentamiento/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_asentamiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tasen_nombre'], 'required'],
            [['tasen_nombre'], 'string', 'max' => 48],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tasen_id' => '#',
            'tasen_nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImportcps()
    {
        return $this->hasMany(Importcp::className(), ['c_tipo_asenta' => 'tasen_id']);
    }
}
