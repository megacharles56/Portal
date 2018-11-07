<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vpermisolaboral".
 *
 * @property int $perla_id
 * @property string $modificacion
 * @property string $perla_dia_inicial
 * @property string $perla_hora_inicial
 * @property string $perla_hora_final
 * @property string $perla_dia_final
 * @property string $perla_observaciones
 * @property string $estado
 * @property string $asunto
 * @property string $solicitante
 * @property string $firmante1
 * @property string $firmante2
 */
class Vpermisolaboral extends \yii\db\ActiveRecord
{
     public $prefijo = 'vperm'  ;
     public $id_field = 'perla_id';
      
    public $updateAcc = 'permiso-laboral/update';
    public $viewAcc = 'permiso-laboral/view';
    public $deleteAcc = 'permiso-laboral/delete';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vpermisolaboral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perla_id'], 'required'],
            [['perla_id'], 'integer'],
            [['modificacion'], 'safe'],
            [['perla_dia_inicial', 'perla_hora_inicial', 'perla_hora_final', 'perla_dia_final'], 'string'],
            [['perla_observaciones'], 'string', 'max' => 256],
            [['estado', 'asunto'], 'string', 'max' => 64],
            [['solicitante', 'firmante1', 'firmante2'], 'string', 'max' => 128],
            [['perla_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perla_id' => '#',
            'modificacion' => 'Modificación',
            'perla_dia_inicial' => 'Dia Inicial',
            'perla_hora_inicial' => 'Hora Inicial',
            'perla_hora_final' => 'Hora Final',
            'perla_dia_final' => 'Dia Final',
            'perla_observaciones' => 'Observaciones',
            'estado' => 'Estado',
            'asunto' => 'Asunto',
            'solicitante' => 'Solicitante',
            'firmante1' => 'Firmante 1',
            'firmante2' => 'Firmante 2',
        ];
    }
}
