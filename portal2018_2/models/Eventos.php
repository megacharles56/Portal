<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventos".
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
 *
 * @property Personas $autor0
 * @property Variables $estad
 * @property EstructuraOrganica $estor
 * @property Empleados $emple
 * @property Salones $salon
 * @property Variables $eventServicio
 * @property Variables $eventAcomodo
 * 
 * @property Variables $horario 
 */
class Eventos extends \yii\db\ActiveRecord
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
        return 'eventos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'estad_id', 'event_evento', 'event_fecha', 'event_inicio', 'event_fin','salon_id'], 'required'],
            [['autor', 'estad_id', 'estor_id', 'emple_id', 'salon_id', 'event_pax', 'event_servicio', 'event_acomodo'], 'integer'],
            [['modificacion'], 'safe'],
            [['event_fecha', 'event_inicio', 'event_fin'], 'string'],
            [['event_evento'], 'string', 'max' => 128],
            [['event_pagado'], 'string', 'max' => 2],
            [['event_responsable'], 'string', 'max' => 48],
            [['event_menu', 'event_observaciones'], 'string', 'max' => 256],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
            [['estor_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstructuraOrganica::className(), 'targetAttribute' => ['estor_id' => 'estor_id']],
            [['emple_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['emple_id' => 'emple_id']],
            [['salon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salones::className(), 'targetAttribute' => ['salon_id' => 'salon_id']],
            [['event_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['event_servicio' => 'varia_id']],
            [['event_acomodo'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['event_acomodo' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificacion',
            'estad_id' => 'Estado',
            'event_id' => 'Event ID',
            'event_evento' => 'Evento',
            'event_fecha' => 'Fecha',
            'event_inicio' => 'Inicio',
            'event_fin' => 'Fin',
            'event_pagado' => 'Pagado',
            'estor_id' => 'Estructura',
            'emple_id' => 'Responsable',
            'salon_id' => 'Salon',
            'event_responsable' => 'Responsable externo',
            'event_menu' => 'Menu',
            'event_pax' => 'Pax',
            'event_servicio' => 'Servicio',
            'event_acomodo' => 'Acomodo',
            'event_estado' => 'Estado',
            'event_observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(Personas::className(), ['perso_id' => 'autor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstad()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'estad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstor()
    {
        return $this->hasOne(EstructuraOrganica::className(), ['estor_id' => 'estor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmple()
    {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'emple_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalon()
    {
        return $this->hasOne(Salones::className(), ['salon_id' => 'salon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventServicio()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'event_servicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventAcomodo()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'event_acomodo']);
    }
    
    public function getHorario(){
    $i = substr($this->event_inicio, 0,5);
    $f = substr($this->event_fin, 0,5);
    return $i.'-'.$f;
}

}
