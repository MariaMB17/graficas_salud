<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * This is the model class for table "configuracion".
 *
 * @property integer $ID
 * @property string $SERVIDOR
 * @property string $BASE_DATOS
 * @property string $USUARIO
 * @property string $CLAVE
 */
class Configuracion extends model
{
    
    public $SERVIDOR;
    public $BASE_DATOS;
    public $USUARIO;
    public $CLAVE;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'SERVIDOR', 'BASE_DATOS', 'USUARIO','CLAVE'], 'required'],
            [['ID'], 'integer'],
            [['SERVIDOR', 'BASE_DATOS', 'USUARIO', 'CLAVE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'SERVIDOR' => 'Servidor',
            'BASE_DATOS' => 'Base de Datos',
            'USUARIO' => 'Usuario',
            'CLAVE' => 'Clave',
        ];
    }
}
