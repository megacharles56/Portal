<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_articulo".
 *
 * @property int $tiart_id
 * @property string $tiart_nombre
 *
 * @property Articulos[] $articulos
 */
class TiposArticulo extends \yii\db\ActiveRecord
{
     public $prefijo = 'tipos'  ;
     public $id_field = 'tipos_id';
      
     public $updateAcc = 'tiposarticulo/update';
     public $viewAcc   = 'tiposarticulo/view';
     public $deleteAcc = 'tiposarticulo/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_articulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tiart_nombre'], 'required'],
            [['tiart_nombre'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tiart_id' => 'Tiart ID',
            'tiart_nombre' => 'Nombre de tipo de artículo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulos::className(), ['tiart_id' => 'tiart_id']);
    }
}
