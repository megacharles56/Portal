<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "almacen".
 *
 * @property int $almac_id
 * @property string $almac_producto
 * @property int $almac_clave
 * @property int $almac_seccion
 *
 * @property Variables $almacSeccion
 */
class Almacen extends \yii\db\ActiveRecord
{
     public $prefijo = 'almac'  ;
     public $id_field = 'almac_id';
      
     public $updateAcc = 'almacen/update';
     public $viewAcc   = 'almacen/view';
     public $deleteAcc = 'almacen/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'almacen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['almac_producto', 'almac_seccion'], 'required'],
            [['almac_clave', 'almac_seccion'], 'integer'],
            [['almac_producto'], 'string', 'max' => 128],
            [['almac_seccion'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['almac_seccion' => 'varia_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'almac_id' => '#',
            'almac_producto' => 'Producto',
            'almac_clave' => 'Clave',
            'almac_seccion' => '# seccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlmacSeccion()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'almac_seccion']);
    }
}
