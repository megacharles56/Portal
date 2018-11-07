<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "importcp".
 *
 * @property int $impcp_id
 * @property string $d_codigo
 * @property string $d_asenta
 * @property string $d_mnpio
 * @property int $c_estado
 * @property int $c_tipo_asenta
 *
 * @property EstadosRepublica $cEstado
 * @property TiposAsentamiento $cTipoAsenta
 * @property Domicilios[] $domicilios
 */
class Importcp extends \yii\db\ActiveRecord {

    public $prefijo = 'impor';
    public $id_field = 'impor_id';
    public $updateAcc = 'importcp/update';
    public $viewAcc = 'importcp/view';
    public $deleteAcc = 'importcp/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'importcp';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['c_estado', 'c_tipo_asenta'], 'integer'],
            [['d_codigo'], 'string', 'max' => 5],
            [['d_asenta', 'd_mnpio'], 'string', 'max' => 64],
            [['d_codigo', 'd_asenta', 'd_mnpio', 'c_estado', 'c_tipo_asenta'], 'unique', 'targetAttribute' => ['d_codigo', 'd_asenta', 'd_mnpio', 'c_estado', 'c_tipo_asenta']],
            [['c_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadosRepublica::className(), 'targetAttribute' => ['c_estado' => 'esrep_id']],
            [['c_tipo_asenta'], 'exist', 'skipOnError' => true, 'targetClass' => TiposAsentamiento::className(), 'targetAttribute' => ['c_tipo_asenta' => 'tasen_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'impcp_id' => '#',
            'd_codigo' => 'Codigo',
            'd_asenta' => '# Asenta',
            'd_mnpio' => '# Mnpio',
            'c_estado' => '# Estado',
            'c_tipo_asenta' => '# Tipo Asenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCEstado() {
        return $this->hasOne(EstadosRepublica::className(), ['esrep_id' => 'c_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCTipoAsenta() {
        return $this->hasOne(TiposAsentamiento::className(), ['tasen_id' => 'c_tipo_asenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios() {
        return $this->hasMany(Domicilios::className(), ['import_id' => 'impcp_id']);
    }

}
