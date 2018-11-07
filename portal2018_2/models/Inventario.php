<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property int $inven_id
 * @property int $artic_id
 * @property string $inven_descripcion
 * @property string $inven_caracteristica
 * @property int $inven_color
 * @property int $inven_material
 * @property int $inven_marca
 * @property string $inven_modelo
 * @property string $inven_numero_serie
 * @property string $inven_numero_inventario
 * @property int $inven_colocacion
 * @property string $inven_observaciones
 * @property int $inven_estado
 * @property int $inven_piso_id
 * @property int $inven_emple_id
 * @property string $inven_alta
 * @property string $inven_actualizacion
 *
 * @property Articulos $artic
 * @property Variables $invenColor
 * @property Variables $invenMaterial
 * @property Variables $invenMarca
 * @property Variables $invenColocacion
 * @property Variables $invenEstado
 * @property Pisos $invenPiso
 * @property Empleados $invenEmple
 */
class Inventario extends \yii\db\ActiveRecord
{
     public $prefijo = 'inven'  ;
     public $id_field = 'inven_id';
      
     public $updateAcc = 'inventario/update';
     public $viewAcc   = 'inventario/view';
     public $deleteAcc = 'inventario/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artic_id', 'inven_numero_inventario'], 'required'],
            [['artic_id', 'inven_color', 'inven_material', 'inven_marca', 'inven_colocacion', 'inven_estado', 'inven_piso_id', 'inven_emple_id'], 'integer'],
            [['inven_alta', 'inven_actualizacion'], 'string'],
            [['inven_descripcion', 'inven_observaciones'], 'string', 'max' => 128],
            [['inven_caracteristica'], 'string', 'max' => 48],
            [['inven_modelo', 'inven_numero_serie', 'inven_numero_inventario'], 'string', 'max' => 24],
            [['artic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articulos::className(), 'targetAttribute' => ['artic_id' => 'artic_id']],
            [['inven_color'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['inven_color' => 'varia_id']],
            [['inven_material'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['inven_material' => 'varia_id']],
            [['inven_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['inven_marca' => 'varia_id']],
            [['inven_colocacion'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['inven_colocacion' => 'varia_id']],
            [['inven_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Variables::className(), 'targetAttribute' => ['inven_estado' => 'varia_id']],
            [['inven_piso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pisos::className(), 'targetAttribute' => ['inven_piso_id' => 'piso_id']],
            [['inven_emple_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['inven_emple_id' => 'emple_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inven_id' => '#',
            'artic_id' => 'Artículo',
            'inven_descripcion' => 'Descripción',
            'inven_caracteristica' => 'Característica',
            'inven_color' => 'Color',
            'inven_material' => 'Material',
            'inven_marca' => 'Marca',
            'inven_modelo' => 'Modelo',
            'inven_numero_serie' => 'Número de Serie',
            'inven_numero_inventario' => 'Número Inventario',
            'inven_colocacion' => 'Colocación',
            'inven_observaciones' => 'Observaciones',
            'inven_estado' => 'Estado',
            'inven_piso_id' => 'Piso',
            'inven_emple_id' => 'Empleado',
            'inven_alta' => 'Alta',
            'inven_actualizacion' => 'Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtic()
    {
        return $this->hasOne(Articulos::className(), ['artic_id' => 'artic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenColor()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'inven_color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenMaterial()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'inven_material']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenMarca()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'inven_marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenColocacion()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'inven_colocacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenEstado()
    {
        return $this->hasOne(Variables::className(), ['varia_id' => 'inven_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenPiso()
    {
        return $this->hasOne(Pisos::className(), ['piso_id' => 'inven_piso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvenEmple()
    {
        return $this->hasOne(Empleados::className(), ['emple_id' => 'inven_emple_id']);
    }
}
