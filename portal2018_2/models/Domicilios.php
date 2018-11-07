<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domicilios".
 *
 * @property int $domic_id
 * @property string $domic_calle_numero
 * @property string $domic_colonia
 * @property int $import_id
 * @property int $domic_cp
 *
 * @property Importcp $import
 * @property Personas[] $personas
 */
class Domicilios extends \yii\db\ActiveRecord
{
     public $prefijo = 'domic'  ;
     public $id_field = 'domic_id';
      
     public $updateAcc = 'domicilios/update';
     public $viewAcc   = 'domicilios/view';
     public $deleteAcc = 'domicilios/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domicilios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domic_calle_numero', 'domic_colonia', 'import_id'], 'required'],
            [['import_id'], 'integer'],
            [['domic_calle_numero'], 'string', 'max' => 128],
            [['domic_cp'], 'string', 'max' => 12],            
            [['domic_colonia'], 'string', 'max' => 64],
            [['import_id'], 'exist', 'skipOnError' => true, 'targetClass' => Importcp::className(), 'targetAttribute' => ['import_id' => 'impcp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'domic_id' => '#',
            'domic_calle_numero' => 'Calle Numero',
            'domic_colonia' => 'Colonia',
            'domic_cp'=>'C.P.',
            'import_id' => '# CP',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImport()
    {
        return $this->hasOne(Importcp::className(), ['impcp_id' => 'import_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['domic_id' => 'domic_id']);
    }
}
