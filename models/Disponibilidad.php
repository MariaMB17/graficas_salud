<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disponibilidad".
 *
 * @property integer $ID
 * @property string $INCIDENCIA
 * @property string $INDICADOR
 * @property string $TIEMPO_SERVICIOS
 * @property string $DESCRIPCION
 */
class Disponibilidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disponibilidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidencia', 'indicador', 'tiempo_servicios', 'descripcion'], 'required'],
            [['incidencia'], 'safe'],
            [['descripcion'], 'string'],
            [['indicador'], 'string', 'max' => 5],
            [['tiempo_servicios'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'incidencia' => 'Incidencia',
            'indicador' => 'Indicador',
            'tiempo_servicios' => 'Tiempo fuera de servicio',
            'descripcion' => 'Descripción',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $INCIDENCIA = \DateTime::createFromFormat('j/m/Y', $this->INCIDENCIA);
            $this->INCIDENCIA = $INCIDENCIA->format('Y-m-d');
            return true;
        } else {
            return false;
        }
    }
}
