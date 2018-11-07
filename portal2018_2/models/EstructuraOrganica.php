<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estructura_organica".
 *
 * @property int $estor_id
 * @property int $autor
 * @property string $modificacion
 * @property int $estad_id
 * @property string $estor_nombre
 * @property string $estor_objetivo
 * @property int $estor_tipo_estructura
 * @property int $estco_id
 * @property int $estor_superior
 *
 * @property Personas $autor0
 * @property Variables $estad
 * @property Variables $estorTipoEstructura
 * @property EstructuraContab $estco
 * @property EstructuraOrganica $estorSuperior
 * @property EstructuraOrganica[] $estructuraOrganicas
 */
class EstructuraOrganica extends \yii\db\ActiveRecord
{
     public $prefijo = 'estru'  ;
     public $id_field = 'estor_id';
     public $completo;
      
     public $updateAcc = 'estructuraorganica/update';
     public $viewAcc   = 'estructuraorganica/view';
     public $deleteAcc = 'estructuraorganica/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estructura_organica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'estad_id', 'estor_nombre', 'estor_tipo_estructura', 'estco_id'], 'required'],
            [['autor', 'estad_id', 'estor_tipo_estructura', 'estco_id', 'estor_superior'], 'integer'],
            [['modificacion'], 'safe'],
            [['estor_nombre'], 'string', 'max' => 48],
            [['estor_objetivo'], 'string', 'max' => 512],
            [['estor_nombre', 'estor_tipo_estructura', 'estor_superior'], 'unique', 'targetAttribute' => ['estor_nombre', 'estor_tipo_estructura', 'estor_superior']],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
            [['estor_tipo_estructura'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estor_tipo_estructura' => 'varia_id']],
            [['estco_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstructuraContab::className(), 'targetAttribute' => ['estco_id' => 'estco_id']],
            [['estor_superior'], 'exist', 'skipOnError' => true, 'targetClass' => EstructuraOrganica::className(), 'targetAttribute' => ['estor_superior' => 'estor_id']],
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
            'estad_id' => '# Estado',
            'estor_nombre' => 'Nombre',
            'estor_objetivo' => 'Objetivo',
            'estor_tipo_estructura' => 'Tipo Estructura',
            'estco_id' => '# Estructura Contable',
            'estor_superior' => 'Estructura Superior',
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
    public function getEstorTipoEstructura()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'estor_tipo_estructura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstco()
    {
        return $this->hasOne(EstructuraContab::className(), ['estco_id' => 'estco_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstorSuperior()
    {
        return $this->hasOne(EstructuraOrganica::className(), ['estor_id' => 'estor_superior']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstructuraOrganicas()
    {
        return $this->hasMany(EstructuraOrganica::className(), ['estor_superior' => 'estor_id']);
    }
    
    public function getCompleto() {
         return $this->estorTipoEstructura->varia_cadena;
    }
    
}
