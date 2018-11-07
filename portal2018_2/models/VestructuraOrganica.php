<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vestructura_organica".
 *
 * @property int $estor_id
 * @property int $autor
 * @property string $modificacion
 * @property int $estad_id
 * @property string $estor_nombre
 * @property int $estor_tipo_estructura
 * @property int $estco_id
 * @property string $estor_superior
 * @property string $tipo_estructura
 * @property string $estado
 * @property string $nombre_autor
 * @property string $estructura_contable
 * @property string $estor_nombre_completo
 * @property string $estor_sup_nombre_completo
 */
class VestructuraOrganica extends \yii\db\ActiveRecord
{
     public $prefijo = 'vestr'  ;
     public $id_field = 'vestr_id';
      
     public $updateAcc = 'vestructuraorganica/update';
     public $viewAcc   = 'vestructuraorganica/view';
     public $deleteAcc = 'vestructuraorganica/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vestructura_organica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estor_id', 'autor', 'estad_id', 'estor_tipo_estructura', 'estco_id'], 'integer'],
            [['modificacion'], 'safe'],
            [['estor_superior', 'nombre_autor', 'estor_nombre_completo', 'estor_sup_nombre_completo'], 'string'],
            [['estor_nombre', 'estructura_contable'], 'string', 'max' => 48],
            [['tipo_estructura', 'estado'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estor_id' => 'Estor ID',
            'autor' => 'Autor',
            'modificacion' => 'Modificacion',
            'estad_id' => 'Estad ID',
            'estor_nombre' => 'Estor Nombre',
            'estor_tipo_estructura' => 'Estor Tipo Estructura',
            'estco_id' => 'Estco ID',
            'estor_superior' => 'Estor Superior',
            'tipo_estructura' => 'Tipo Estructura',
            'estado' => 'Estado',
            'nombre_autor' => 'Nombre Autor',
            'estructura_contable' => 'Estructura Contable',
            'estor_nombre_completo' => 'Estor Nombre Completo',
            'estor_sup_nombre_completo' => 'Estor Sup Nombre Completo',
        ];
    }
    
    
    public static function primaryKey()
    {
        return ["estor_id"];
    }    
    
}
