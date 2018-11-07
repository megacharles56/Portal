<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;


use yii\base\Model;

class CalendarioEventos extends Model
{
    public $fecha;
    public $ubicacion;


    public function attributeLabels()
    {
        return [
            'fecha'          => 'Fecha',
            'ubicacion' => 'Ubicación',
        ];
    }
}