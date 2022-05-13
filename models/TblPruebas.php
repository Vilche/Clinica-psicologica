<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_pruebas".
 *
 * @property int $id_prueba
 * @property string $pruebas_psicologicas
 * @property string $resultados_obtenidos
 * @property string $impresion_diagnostica
 * @property string $pronostico_esperado
 *
 * @property TblConsultas[] $tblConsultas
 */
class TblPruebas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pruebas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pruebas_psicologicas', 'resultados_obtenidos', 'impresion_diagnostica', 'pronostico_esperado'], 'required'],
            [['pruebas_psicologicas', 'resultados_obtenidos', 'impresion_diagnostica', 'pronostico_esperado'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prueba' => 'Id Prueba',
            'pruebas_psicologicas' => 'Pruebas Psicologicas',
            'resultados_obtenidos' => 'Resultados Obtenidos',
            'impresion_diagnostica' => 'Impresion Diagnostica',
            'pronostico_esperado' => 'Pronostico Esperado',
        ];
    }

    /**
     * Gets query for [[TblConsultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblConsultas()
    {
        return $this->hasMany(TblConsultas::className(), ['id_prueba' => 'id_prueba']);
    }
}
