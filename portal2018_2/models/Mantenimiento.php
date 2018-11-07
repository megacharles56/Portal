<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mantenimiento".
 *
 * @property int $manto_id
 * @property int $manto_folio_s
 * @property int $manto_folio_m
 * @property int $manto_folio_e
 * @property int $autor
 * @property string $modificacion
 * @property string $manto_falla
 * @property string $manto_observaciones
 * @property string $manto_f_solicitud
 * @property string $manto_h_solicitud
 * @property int $manto_responsable
 * @property int $manto_inven_id
 * @property string $manto_f_inicio
 * @property string $manto_h_inicio
 * @property string $manto_diagnostico
 * @property string $manto_acciones
 * @property string $manto_observaciones_m
 * @property string $manto_f_entrega
 * @property string $manto_h_entrega
 * @property string $manto_f_recepcion
 * @property string $manto_h_recepcion
 * @property int $manto_califiacion
 * @property int $manto_estado
 * @property int $manto_tipo_manto
 * @property string $manto_f_preferente
 * @property string $manto_h_preferente
 *
 * @property Personas $autor0
 * @property Empleados $mantoResponsable
 * @property Inventario $mantoInven
 * @property Variables $mantoCalifiacion
 * @property Variables $mantoEstado
 * @property Variables $mantoTipoManto
 */
class Mantenimiento extends \yii\db\ActiveRecord
{
     public $prefijo = 'mante'  ;
     public $id_field = 'mante_id';
      
     public $updateAcc = 'mantenimiento/update';
     public $viewAcc   = 'mantenimiento/view';
     public $deleteAcc = 'mantenimiento/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mantenimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manto_folio_s', 'manto_folio_m', 'manto_folio_e', 'autor', 'manto_responsable', 'manto_inven_id', 'manto_califiacion', 'manto_estado', 'manto_tipo_manto'], 'integer'],
            [['autor', 'manto_falla', 'manto_f_solicitud', 'manto_h_solicitud', 'manto_estado'], 'required'],
            [['modificacion'], 'safe'],
            [['manto_f_solicitud', 'manto_h_solicitud', 'manto_f_inicio', 'manto_h_inicio', 'manto_f_entrega', 'manto_h_entrega', 'manto_f_recepcion', 'manto_h_recepcion'], 'string'],
            [['manto_falla', 'manto_diagnostico', 'manto_f_preferente', 'manto_h_preferente'], 'string', 'max' => 48],
            [['manto_observaciones', 'manto_acciones', 'manto_observaciones_m'], 'string', 'max' => 512],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['manto_responsable'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['manto_responsable' => 'emple_id']],
            [['manto_inven_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventario::className(), 'targetAttribute' => ['manto_inven_id' => 'inven_id']],
            [['manto_califiacion'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['manto_califiacion' => 'varia_id']],
            [['manto_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['manto_estado' => 'varia_id']],
            [['manto_tipo_manto'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['manto_tipo_manto' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manto_id' => '#',
            'manto_folio_s' => 'Folio',
            'manto_folio_m' => 'Folio',
            'manto_folio_e' => 'Folio',
            'autor' => 'Autor',
            'modificacion' => 'Modificación',
            'manto_falla' => 'Falla',
            'manto_observaciones' => 'Observaciones',
            'manto_f_solicitud' => 'F Solicitud',
            'manto_h_solicitud' => 'H Solicitud',
            'manto_responsable' => 'Responsable',
            'manto_inven_id' => 'Inventario',
            'manto_f_inicio' => 'F Inicio',
            'manto_h_inicio' => 'H Inicio',
            'manto_diagnostico' => 'Diagnóstico',
            'manto_acciones' => 'Acciones',
            'manto_observaciones_m' => 'Observaciones Mantenimiento',
            'manto_f_entrega' => 'F Entrega',
            'manto_h_entrega' => 'H Entrega',
            'manto_f_recepcion' => 'F Recepcion',
            'manto_h_recepcion' => 'H Recepcion',
            'manto_califiacion' => 'Califiación',
            'manto_estado' => 'Estado',
            'manto_tipo_manto' => 'Tipo de Mantenimiento',
            'manto_f_preferente' => 'F Preferente',
            'manto_h_preferente' => 'H Preferente',
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
    public function getMantoResponsable()
    {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'manto_responsable']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantoInven()
    {
        return $this->hasOne(Inventario::className(), ['inven_id' => 'manto_inven_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantoCalifiacion()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'manto_califiacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantoEstado()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'manto_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantoTipoManto()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'manto_tipo_manto']);
    }
}
