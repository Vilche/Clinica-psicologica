<?php

namespace app\modules\pacientes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPacientes;

/**
 * PacientesSearch represents the model behind the search form of `app\models\TblPacientes`.
 */
class PacientesSearch extends TblPacientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'edad_paciente', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['nombre_paciente', 'apellido_paciente', 'fecha_nacimiento', 'lugar_nacimiento', 'telefono_paciente', 'direccion_paciente', 'profesion_paciente', 'nivel_academico', 'estado_civil', 'fecha_ingreso', 'fecha_modifico'], 'safe'],
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
        $query = TblPacientes::find();

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
            'id_paciente' => $this->id_paciente,
            'edad_paciente' => $this->edad_paciente,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'user_ingreso' => $this->user_ingreso,
            'fecha_ingreso' => $this->fecha_ingreso,
            'user_modifico' => $this->user_modifico,
            'fecha_modifico' => $this->fecha_modifico,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'nombre_paciente', $this->nombre_paciente])
            ->andFilterWhere(['like', 'apellido_paciente', $this->apellido_paciente])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
            ->andFilterWhere(['like', 'telefono_paciente', $this->telefono_paciente])
            ->andFilterWhere(['like', 'direccion_paciente', $this->direccion_paciente])
            ->andFilterWhere(['like', 'profesion_paciente', $this->profesion_paciente])
            ->andFilterWhere(['like', 'nivel_academico', $this->nivel_academico])
            ->andFilterWhere(['like', 'estado_civil', $this->estado_civil]);

        return $dataProvider;
    }
}
