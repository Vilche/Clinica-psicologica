<?php

namespace app\modules\consulta\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblConsultas;

/**
 * ConsultasSearch represents the model behind the search form of `app\models\TblConsultas`.
 */
class ConsultasSearch extends TblConsultas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_situacion', 'id_conducta', 'id_paciente', 'id_prueba', 'id_tratamiento', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['motivo_consulta', 'estado_actual', 'institucion_hospitalaria', 'grupos_sociales', 'grupos_familiares', 'habitos_autocuido', 'medico_actual', 'enfermedad_actual', 'medicamento_actual', 'fecha_ingreso', 'fecha_modifico'], 'safe'],
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
        $query = TblConsultas::find();

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
            'id_situacion' => $this->id_situacion,
            'id_paciente' => $this->id_paciente,
            'id_conducta' => $this->id_conducta,
            'id_prueba' => $this->id_prueba,
            'id_tratamiento' => $this->id_tratamiento,
            'user_ingreso' => $this->user_ingreso,
            'fecha_ingreso' => $this->fecha_ingreso,
            'user_modifico' => $this->user_modifico,
            'fecha_modifico' => $this->fecha_modifico,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'motivo_consulta', $this->motivo_consulta])
            ->andFilterWhere(['like', 'estado_actual', $this->estado_actual])
            ->andFilterWhere(['like', 'institucion_hospitalaria', $this->institucion_hospitalaria])
            ->andFilterWhere(['like', 'grupos_sociales', $this->grupos_sociales])
            ->andFilterWhere(['like', 'grupos_familiares', $this->grupos_familiares])
            ->andFilterWhere(['like', 'habitos_autocuido', $this->habitos_autocuido])
            ->andFilterWhere(['like', 'medico_actual', $this->medico_actual])
            ->andFilterWhere(['like', 'enfermedad_actual', $this->enfermedad_actual])
            ->andFilterWhere(['like', 'medicamento_actual', $this->medicamento_actual]);

        return $dataProvider;
    }
}
