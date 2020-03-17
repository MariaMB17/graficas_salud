<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Importar extends model{

    public $archivo;
    public $tabla;
    

    public function rules()
    {
        return [
            [['archivo','tabla'], 'required'],
            [['archivo','tabla'],  'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'archivo' => 'Seleccione el Archivo',
            'tabla' => 'Tablas'            
        ];
    }

    

}