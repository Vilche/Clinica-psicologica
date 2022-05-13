<?php

namespace app\modules\seguimiento\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblSeguimiento;

/**
 * SeguimientoSearch represents the model behind the search form of `app\models\TblSeguimiento`.
 */
class SeguimientoSearch extends TblSeguimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_seguimiento', 'id_paciente', 'id_motivo', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['cod_sesion', 'fecha_seguimiento', 'lugar_seguimiento', 'objetivo_sesion', 'tecnica_sesion', 'conclusiones_sesion', 'recomendaciones_sesion', 'fecha_ingreso', 'fecha_modifico'], 'safe'],
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
        $query = TblSeguimiento::find();

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
            'id_seguimiento' => $this->id_seguimiento,
            'id_paciente' => $this->id_paciente,
            'id_motivo' => $this->id_motivo,
            'user_ingreso' => $this->user_ingreso,
            'fecha_ingreso' => $this->fecha_ingreso,
            'user_modifico' => $this->user_modifico,
            'fecha_modifico' => $this->fecha_modifico,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'cod_sesion', $this->cod_sesion])
            ->andFilterWhere(['like', 'fecha_seguimiento', $this->fecha_seguimiento])
            ->andFilterWhere(['like', 'lugar_seguimiento', $this->lugar_seguimiento])
            ->andFilterWhere(['like', 'objetivo_sesion', $this->objetivo_sesion])
            ->andFilterWhere(['like', 'tecnica_sesion', $this->tecnica_sesion])
            ->andFilterWhere(['like', 'conclusiones_sesion', $this->conclusiones_sesion])
            ->andFilterWhere(['like', 'recomendaciones_sesion', $this->recomendaciones_sesion]);

        return $dataProvider;
    }
}
