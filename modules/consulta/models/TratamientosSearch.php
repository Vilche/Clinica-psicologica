<?php

namespace app\modules\consulta\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblTratamientos;

/**
 * TratamientosSearch represents the model behind the search form of `app\models\TblTratamientos`.
 */
class TratamientosSearch extends TblTratamientos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tratamiento'], 'integer'],
            [['indicador_tratamiento', 'objetivo_tratamiento', 'tecnica_tratamiento'], 'safe'],
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
        $query = TblTratamientos::find();

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
            'id_tratamiento' => $this->id_tratamiento,
        ]);

        $query->andFilterWhere(['like', 'indicador_tratamiento', $this->indicador_tratamiento])
            ->andFilterWhere(['like', 'objetivo_tratamiento', $this->objetivo_tratamiento])
            ->andFilterWhere(['like', 'tecnica_tratamiento', $this->tecnica_tratamiento]);

        return $dataProvider;
    }
}
