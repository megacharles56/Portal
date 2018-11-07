<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clases".
 *
 * @property int $clase_id
 * @property string $clase_clase
 *
 * @property Permisos[] $permisos
 */
class Clases extends \yii\db\ActiveRecord
{
     public $prefijo = 'clase'  ;
     public $id_field = 'clase_id';
      
     public $updateAcc = 'clases/update';
     public $viewAcc   = 'clases/view';
     public $deleteAcc = 'clases/delete';
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_clase'], 'required'],
            [['clase_clase'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clase_id' => '#',
            'clase_clase' => 'Clase',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permisos::className(), ['clase_id' => 'clase_id']);
    }
}
