<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property int $curso_id
 * @property int $estad_id
 * @property string $curso_nombre
 * @property string $curso_fecha_inicio
 * @property string $curso_fecha_fin
 * @property int $curso_duracion
 * @property string $curso_facilitador
 * @property string $curso_empresa
 *
 * @property Variables $estad
 */
class Cursos extends \yii\db\ActiveRecord
{
     public $prefijo = 'curso'  ;
     public $id_field = 'curso_id';
      
     public $updateAcc = 'cursos/update';
     public $viewAcc   = 'cursos/view';
     public $deleteAcc = 'cursos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estad_id', 'curso_nombre', 'curso_fecha_inicio', 'curso_fecha_fin'], 'required'],
            [['estad_id', 'curso_duracion'], 'integer'],
            [['curso_fecha_inicio', 'curso_fecha_fin'], 'string'],
            [['curso_nombre', 'curso_facilitador', 'curso_empresa'], 'string', 'max' => 48],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'curso_id' => '#',
            'estad_id' => '# Estado',
            'curso_nombre' => 'Nombre',
            'curso_fecha_inicio' => 'Fecha Inicio',
            'curso_fecha_fin' => 'Fecha Fin',
            'curso_duracion' => 'Duración',
            'curso_facilitador' => 'Facilitador',
            'curso_empresa' => 'Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstad()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'estad_id']);
    }
}
