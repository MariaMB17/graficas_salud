<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disponibilidad;

/**
 * DisponibilidadSearch represents the model behind the search form about `app\models\Disponibilidad`.
 */
class DisponibilidadSearch extends Disponibilidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['INCIDENCIA', 'INDICADOR', 'TIEMPO_SERVICIOS', 'DESCRIPCION'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Disponibilidad::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'INCIDENCIA' => $this->INCIDENCIA,
        ]);

        $query->andFilterWhere(['like', 'INDICADOR', $this->INDICADOR])
            ->andFilterWhere(['like', 'TIEMPO_SERVICIOS', $this->TIEMPO_SERVICIOS])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION]);

        return $dataProvider;
    }
}
