<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veventos".
 *
 * @property int $event_id
 * @property int $autor
 * @property string $modificacion
 * @property int $estad_id
 * @property string $event_evento
 * @property string $event_fecha
 * @property string $event_inicio
 * @property string $event_fin
 * @property string $event_pagado
 * @property int $estor_id
 * @property int $emple_id
 * @property int $salon_id
 * @property string $event_responsable
 * @property string $event_menu
 * @property int $event_pax
 * @property int $event_servicio
 * @property int $event_acomodo
 * @property string $event_observaciones
 * @property string $nombre_autor
 * @property string $estado
 * @property string $estor_nombre_completo
 * @property string $empleado_responsable
 * @property string $salon_nombre
 * @property string $servicio
 * @property string $acomodo
 */
class Veventos extends \yii\db\ActiveRecord
{
     public $prefijo = 'event'  ;
     public $id_field = 'event_id';
      
     public $updateAcc = 'eventos/update';
     public $viewAcc   = 'eventos/view';
     public $deleteAcc = 'eventos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veventos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id'], 'required'],
            [['event_id', 'autor', 'estad_id', 'estor_id', 'emple_id', 'salon_id', 'event_pax', 'event_servicio', 'event_acomodo'], 'integer'],
            [['modificacion'], 'safe'],
            [['event_fecha', 'event_inicio', 'event_fin'], 'string'],
            [['event_evento'], 'string', 'max' => 128],
            [['event_pagado'], 'string', 'max' => 2],
            [['event_responsable'], 'string', 'max' => 48],
            [['event_menu', 'event_observaciones'], 'string', 'max' => 256],
            [['nombre_autor', 'estado', 'estor_nombre_completo', 'empleado_responsable', 'servicio', 'acomodo'], 'string', 'max' => 64],
            [['salon_nombre'], 'string', 'max' => 12],
            [['event_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'autor' => 'Autor',
            'modificacion' => 'Modificacion',
            'estad_id' => 'Estad ID',
            'event_evento' => 'Evento',
            'event_fecha' => 'Fecha',
            'event_inicio' => 'Inicio',
            'event_fin' => 'Fin',
            'event_pagado' => 'Pagado',
            'estor_id' => 'Estor ID',
            'emple_id' => 'Emple ID',
            'salon_id' => 'Salon ID',
            'event_responsable' => 'Responsable',
            'event_menu' => 'Event Menu',
            'event_pax' => 'Event Pax',
            'event_servicio' => 'Event Servicio',
            'event_acomodo' => 'Event Acomodo',
            'event_observaciones' => 'Event Observaciones',
            'nombre_autor' => 'utor',
            'estado' => 'Estado',
            'estor_nombre_completo' => 'área',
            'empleado_responsable' => 'Empleado Responsable',
            'salon_nombre' => 'Salon ',
            'servicio' => 'Servicio',
            'acomodo' => 'Acomodo',
        ];
    }
}
