<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "veventos".
 *
 * @property int $event_id
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
 * @property int $event_estado
 * @property string $perso_nombre
 * @property string $estructura_organica_c
 * @property string $salon_nombre
 * @property string $servicio
 * @property string $acomodo
 * @property string $estado
 */
class Veventos extends \yii\db\ActiveRecord {

    public $prefijo = 'event';
    public $id_field = 'event_id';
    public $updateAcc = 'eventos/update';
    public $viewAcc = 'eventos/view';
    public $deleteAcc = 'eventos/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'veventos';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['event_id'], 'required'],
            [['event_id', 'estor_id', 'emple_id', 'salon_id', 'event_pax', 'event_servicio', 'event_acomodo', 'event_estado'], 'integer'],
            [['event_fecha', 'event_inicio', 'event_fin'], 'string'],
            [['event_evento'], 'string', 'max' => 128],
            [['event_pagado'], 'string', 'max' => 2],
            [['event_responsable'], 'string', 'max' => 48],
            [['event_menu'], 'string', 'max' => 256],
            [['perso_nombre', 'estructura_organica_c', 'servicio', 'acomodo', 'estado'], 'string', 'max' => 64],
            [['salon_nombre'], 'string', 'max' => 12],
            [['event_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'event_id' => '#',
            'event_evento' => 'Evento',
            'event_fecha' => 'Fecha',
            'event_inicio' => 'Inicio',
            'event_fin' => 'Fin',
            'event_pagado' => 'Pagado',
            'estor_id' => '#Estor',
            'emple_id' => '#Emple',
            'salon_id' => '#Salon ',
            'event_responsable' => 'Responsable',
            'event_menu' => 'Menu',
            'event_pax' => 'Pax',
            'event_servicio' => 'Servicio',
            'event_acomodo' => 'Acomodo',
            'event_estado' => 'Estado',
            'perso_nombre' => 'empleado',
            'estructura_organica_c' => 'Estructura Orgánica',
            'salon_nombre' => 'Salón',
            'servicio' => 'Servicio',
            'acomodo' => 'Acomodo',
            'estado' => 'Estado',
        ];
    }

}
