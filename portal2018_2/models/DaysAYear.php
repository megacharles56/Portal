<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "days_a_year".
 *
 * @property int $dayea_id
 * @property int $dayea_year
 * @property int $dayea_days
 */
class DaysAYear extends \yii\db\ActiveRecord {

    public $prefijo = 'deyea';
    public $id_field = 'deyea_id';
    public $updateAcc = 'daysayear/update';
    public $viewAcc = 'daysayear/view';
    public $deleteAcc = 'daysayear/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'days_a_year';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['dayea_year', 'dayea_days'], 'required'],
            [['dayea_year', 'dayea_days'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'dayea_id' => 'Dayea ID',
            'dayea_year' => 'Año',
            'dayea_days' => 'Dás de vacaciones',
        ];
    }

}
