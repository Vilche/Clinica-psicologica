<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_tratamientos".
 *
 * @property int $id_tratamiento
 * @property string $indicador_tratamiento
 * @property string $objetivo_tratamiento
 * @property string $tecnica_tratamiento
 *
 * @property TblConsultas[] $tblConsultas
 */
class TblTratamientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_tratamientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicador_tratamiento', 'objetivo_tratamiento', 'tecnica_tratamiento'], 'required'],
            [['indicador_tratamiento', 'objetivo_tratamiento', 'tecnica_tratamiento'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tratamiento' => 'Id Tratamiento',
            'indicador_tratamiento' => 'Indicador Tratamiento',
            'objetivo_tratamiento' => 'Objetivo Tratamiento',
            'tecnica_tratamiento' => 'Tecnica Tratamiento',
        ];
    }

    /**
     * Gets query for [[TblConsultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblConsultas()
    {
        return $this->hasMany(TblConsultas::className(), ['id_tratamiento' => 'id_tratamiento']);
    }
}
