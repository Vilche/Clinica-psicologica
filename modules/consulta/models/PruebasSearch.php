<?php

namespace app\modules\consulta\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPruebas;

/**
 * PruebasSearch represents the model behind the search form of `app\models\TblPruebas`.
 */
class PruebasSearch extends TblPruebas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prueba'], 'integer'],
            [['pruebas_psicologicas', 'resultados_obtenidos', 'impresion_diagnostica', 'pronostico_esperado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TblPruebas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_prueba' => $this->id_prueba,
        ]);

        $query->andFilterWhere(['like', 'pruebas_psicologicas', $this->pruebas_psicologicas])
            ->andFilterWhere(['like', 'resultados_obtenidos', $this->resultados_obtenidos])
            ->andFilterWhere(['like', 'impresion_diagnostica', $this->impresion_diagnostica])
            ->andFilterWhere(['like', 'pronostico_esperado', $this->pronostico_esperado]);

        return $dataProvider;
    }
}
