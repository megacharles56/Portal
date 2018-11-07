<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulos".
 *
 * @property int $artic_id
 * @property string $artic_nombre
 * @property int $tiart_id
 *
 * @property Inventario[] $inventarios
 * @property TiposArticulo $tiart
 */
class Articulos extends \yii\db\ActiveRecord
{
     public $prefijo = 'artic'  ;
     public $id_field = 'artic_id';
      
     public $updateAcc = 'articulos/update';
     public $viewAcc   = 'articulos/view';
     public $deleteAcc = 'articulos/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artic_nombre', 'tiart_id'], 'required'],
            [['tiart_id'], 'integer'],
            [['artic_nombre'], 'string', 'max' => 64],
            [['tiart_id'], 'exist', 'skipOnError' => true, 'targetClass' => TiposArticulo::className(), 'targetAttribute' => ['tiart_id' => 'tiart_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'artic_id' => '#',
            'artic_nombre' => 'Nombre',
            'tiart_id' => 'Tipo Artículo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['artic_id' => 'artic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiart()
    {
        return $this->hasOne(TiposArticulo::className(), ['tiart_id' => 'tiart_id']);
    }
}
