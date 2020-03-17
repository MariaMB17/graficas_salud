<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class Sesion extends Model
{
    public $usuario;
    public $clave;

    
    public function rules()
    {
        return [
            // username and password are both required
            [['usuario', 'clave'], 'required'],
            [['usuario','clave'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'usuario' => 'Nombre de Usuario',
            'clave' => 'Contraseña',
        ];
    }

    

    
}