<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vperfiles_puesto".
 *
 * @property int $perpu_id
 * @property int $reporta_a
 * @property int $autor
 * @property string $historia
 * @property string $modificacion
 * @property int $estad_id
 * @property string $perpu_nombre
 * @property string $perpu_complemento
 * @property int $estor_id
 * @property int $perpu_genero
 * @property int $perpu_estado_civil
 * @property int $perpu_edad_minima
 * @property int $perpu_edad_maxima
 * @property string $perpu_expe_interna
 * @property string $perpu_expe_externa
 * @property string $perpu_expe_especialidad
 * @property int $perpu_escolaridad
 * @property string $perpu_objetivo
 * @property string $perpu_nombre_completo
 * @property string $estado
 * @property string $nombre_autor
 * @property string $nombreperfl_superior
 * @property string $estor_nombre_completo
 * @property string $estor_superior
 * @property string $estor_sup_nombre_completo
 * @property string $genero
 * @property string $estado_civil
 * @property string $escolaridad
 */
class VperfilesPuesto extends \yii\db\ActiveRecord
{
     public $prefijo = 'vperf'  ;
     public $id_field = 'vperf_id';
      
     public $updateAcc = 'vperfilespuesto/update';
     public $viewAcc   = 'vperfilespuesto/view';
     public $deleteAcc = 'vperfilespuesto/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vperfiles_puesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perpu_id', 'reporta_a', 'autor', 'estad_id', 'estor_id', 'perpu_genero', 'perpu_estado_civil', 'perpu_edad_minima', 'perpu_edad_maxima', 'perpu_escolaridad'], 'integer'],
            [['historia', 'perpu_nombre_completo', 'nombre_autor', 'nombreperfl_superior', 'estor_nombre_completo', 'estor_superior', 'estor_sup_nombre_completo', 'genero', 'estado_civil', 'escolaridad'], 'string'],
            [['modificacion'], 'safe'],
            [['perpu_nombre', 'perpu_complemento', 'perpu_expe_especialidad'], 'string', 'max' => 48],
            [['perpu_expe_interna', 'perpu_expe_externa'], 'string', 'max' => 24],
            [['perpu_objetivo'], 'string', 'max' => 2048],
            [['estado'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perpu_id' => 'Perpu ID',
            'reporta_a' => 'Reporta A',
            'autor' => 'Autor',
            'historia' => 'Historia',
            'modificacion' => 'Modificacion',
            'estad_id' => 'Estad ID',
            'perpu_nombre' => 'Perpu Nombre',
            'perpu_complemento' => 'Perpu Complemento',
            'estor_id' => 'Estor ID',
            'perpu_genero' => 'Perpu Genero',
            'perpu_estado_civil' => 'Perpu Estado Civil',
            'perpu_edad_minima' => 'Perpu Edad Minima',
            'perpu_edad_maxima' => 'Perpu Edad Maxima',
            'perpu_expe_interna' => 'Perpu Expe Interna',
            'perpu_expe_externa' => 'Perpu Expe Externa',
            'perpu_expe_especialidad' => 'Perpu Expe Especialidad',
            'perpu_escolaridad' => 'Perpu Escolaridad',
            'perpu_objetivo' => 'Perpu Objetivo',
            'perpu_nombre_completo' => 'Perpu Nombre Completo',
            'estado' => 'Estado',
            'nombre_autor' => 'Nombre Autor',
            'nombreperfl_superior' => 'Nombreperfl Superior',
            'estor_nombre_completo' => 'Estor Nombre Completo',
            'estor_superior' => 'Estor Superior',
            'estor_sup_nombre_completo' => 'Estor Sup Nombre Completo',
            'genero' => 'Genero',
            'estado_civil' => 'Estado Civil',
            'escolaridad' => 'Escolaridad',
        ];
    }
}
