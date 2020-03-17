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
class EstudioRealizado extends model
{
    
    public $modalidad;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modalidad'], 'require'],
            [['modalidad'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'modalidad' => 'Modalidad',
            
        ];
    }
}