<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_conductas".
 *
 * @property int $id_conducta
 * @property string $conducta
 *
 * @property TblConsultas[] $tblConsultas
 */
class TblConsulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_conductas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conducta'], 'required'],
            [['conducta'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_conducta' => 'Id Conducta',
            'conducta' => 'Conducta',
        ];
    }

    /**
     * Gets query for [[TblConsultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblConsultas()
    {
        return $this->hasMany(TblConsultas::className(), ['id_conducta' => 'id_conducta']);
    }
}
