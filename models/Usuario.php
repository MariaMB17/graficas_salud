<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $usuario
 * @property string $clave
 * @property string $cargo
 * @property string $nivel
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'usuario', 'clave', 'cargo', 'nivel'], 'required'],
            [['nombres', 'apellidos', 'usuario', 'clave', 'cargo', 'nivel'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'usuario' => 'Usuario',
            'clave' => 'Clave',
            'cargo' => 'Cargo',
            'nivel' => 'Nivel',
        ];
    }
}
