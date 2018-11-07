<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_solicitud".
 *
 * @property int $id
 * @property string $fecha_my_solicitud
 * @property int $no_emp
 * @property string $nombre
 * @property string $dias
 * @property string $mes
 * @property string $mes2
 * @property string $hora
 * @property string $hora1
 * @property string $total
 * @property string $asunto
 * @property string $obs
 * @property string $direccion
 * @property string $autoriza
 * @property string $status
 */
class MySolicitud extends \yii\db\ActiveRecord
{
     public $prefijo = 'mysol'  ;
     public $id_field = 'id';
      
     public $updateAcc = 'mysolicitud/update';
     public $viewAcc   = 'mysolicitud/view';
     public $deleteAcc = 'mysolicitud/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'no_emp'], 'integer'],
            [['fecha_my_solicitud'], 'string'],
            [['nombre'], 'string', 'max' => 35],
            [['dias', 'autoriza'], 'string', 'max' => 60],
            [['mes', 'mes2'], 'string', 'max' => 30],
            [['hora', 'hora1', 'total'], 'string', 'max' => 10],
            [['asunto'], 'string', 'max' => 20],
            [['obs'], 'string', 'max' => 1024],
            [['direccion'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 15],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_my_solicitud' => 'Fecha My Solicitud',
            'no_emp' => 'No Emp',
            'nombre' => 'Nombre',
            'dias' => 'Dias',
            'mes' => 'Mes',
            'mes2' => 'Mes2',
            'hora' => 'Hora',
            'hora1' => 'Hora1',
            'total' => 'Total',
            'asunto' => 'Asunto',
            'obs' => 'Obs',
            'direccion' => 'Direccion',
            'autoriza' => 'Autoriza',
            'status' => 'Status',
        ];
    }
}
