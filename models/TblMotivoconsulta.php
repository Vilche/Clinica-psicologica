<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_motivoconsulta".
 *
 * @property int $id_motivo
 * @property string $tipo_motivo
 *
 * @property TblSeguimiento[] $tblSeguimientos
 */
class TblMotivoconsulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_motivoconsulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_motivo'], 'required'],
            [['tipo_motivo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_motivo' => 'Id Motivo',
            'tipo_motivo' => 'Tipo Motivo',
        ];
    }

    /**
     * Gets query for [[TblSeguimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSeguimientos()
    {
        return $this->hasMany(TblSeguimiento::className(), ['id_motivo' => 'id_motivo']);
    }
}
