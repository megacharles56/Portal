<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estructura_contab".
 *
 * @property int $estco_id
 * @property int $autor
 * @property string $modificacion
 * @property int $estad_id
 * @property string $estco_nombre
 * @property int $estco_numero
 *
 * @property Personas $autor0
 * @property Variables $estad
 */
class EstructuraContab extends \yii\db\ActiveRecord
{
     public $prefijo  = 'estru'  ;
     public $id_field = 'estco_id';
      
     public $updateAcc = 'estructuracontab/update';
     public $viewAcc   = 'estructuracontab/view';
     public $deleteAcc = 'estructuracontab/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estructura_contab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['autor', 'estad_id', 'estco_nombre', 'estco_numero'], 'required'],
            [['autor', 'estad_id', 'estco_numero'], 'integer'],
            [['modificacion'], 'safe'],
            [['estco_nombre'], 'string', 'max' => 48],
            [['estco_nombre'], 'unique'],
            [['estco_numero'], 'unique'],
            [['estco_nombre', 'estco_numero'], 'unique', 'targetAttribute' => ['estco_nombre', 'estco_numero']],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['autor' => 'perso_id']],
            [['estad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['estad_id' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estco_id' => '#',
            'autor' => 'Autor',
            'modificacion' => 'Modificacion',
            'estad_id' => '# Estado',
            'estco_nombre' => 'Nombre',
            'estco_numero' => 'Número',
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
}
