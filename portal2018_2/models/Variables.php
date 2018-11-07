<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variables".
 *
 * @property int $varia_id
 * @property string $modificacion
 * @property string $varia_tabla
 * @property string $varia_campo
 * @property string $varia_cadena
 * @property string $varia_extra
 * @property string $varia_info
 * @property string $varia_numerico
 * @property string $varia_fecha
 *
 * @property Personas[] $personas
 */
class Variables extends \yii\db\ActiveRecord
{
     public $prefijo = 'varia'  ;
     public $id_field = 'varia_id';
      
     public $updateAcc = 'variables/update';
     public $viewAcc   = 'variables/view';
     public $deleteAcc = 'variables/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modificacion'], 'safe'],
            [['varia_numerico'], 'number'],
            [['varia_fecha'], 'string'],
            [['varia_tabla', 'varia_campo'], 'string', 'max' => 24],
            [['varia_cadena', 'varia_extra', 'varia_info'], 'string', 'max' => 64],
            [['varia_tabla', 'varia_campo', 'varia_cadena', 'varia_numerico', 'varia_fecha'], 'unique', 'targetAttribute' => ['varia_tabla', 'varia_campo', 'varia_cadena', 'varia_numerico', 'varia_fecha']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'varia_id' => 'Varia ID',
            'modificacion' => 'Modificacion',
            'varia_tabla' => 'Tabla',
            'varia_campo' => 'Campo',
            'varia_cadena' => 'Valor Cadena',
            'varia_extra' => 'Extra',
            'varia_info' => 'Info',
            'varia_numerico' => 'Valor Numérico',
            'varia_fecha' => 'Valor Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['estad_id' => 'varia_id']);
    }
}
