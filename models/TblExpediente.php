<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_expediente".
 *
 * @property int $id_expediente
 * @property int $id_paciente
 * @property int $id_situacion
 * @property int $id_seguimiento
 * @property int $user_ingreso
 * @property string $fecha_ingreso
 * @property int $user_modifico
 * @property string $fecha_modifico
 * @property int $activo
 *
 * @property TblPacientes $paciente
 * @property TblSeguimiento $seguimiento
 * @property TblSituacionActual $situacion
 * @property TblUsuarios $userIngreso
 * @property TblUsuarios $userModifico
 */
class TblExpediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_expediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'id_situacion', 'id_seguimiento', 'user_ingreso', 'fecha_ingreso', 'user_modifico', 'fecha_modifico', 'activo'], 'required'],
            [['id_paciente', 'id_situacion', 'id_seguimiento', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['fecha_ingreso', 'fecha_modifico'], 'safe'],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => TblPacientes::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
            [['id_seguimiento'], 'exist', 'skipOnError' => true, 'targetClass' => TblSeguimiento::className(), 'targetAttribute' => ['id_seguimiento' => 'id_seguimiento']],
            [['id_situacion'], 'exist', 'skipOnError' => true, 'targetClass' => TblSituacionActual::className(), 'targetAttribute' => ['id_situacion' => 'id_situacion']],
            [['user_ingreso'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::className(), 'targetAttribute' => ['user_ingreso' => 'id_usuario']],
            [['user_modifico'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::className(), 'targetAttribute' => ['user_modifico' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_expediente' => 'Id Expediente',
            'id_paciente' => 'Id Paciente',
            'id_situacion' => 'Id Situacion',
            'id_seguimiento' => 'Id Seguimiento',
            'user_ingreso' => 'User Ingreso',
            'fecha_ingreso' => 'Fecha Ingreso',
            'user_modifico' => 'User Modifico',
            'fecha_modifico' => 'Fecha Modifico',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(TblPacientes::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * Gets query for [[Seguimiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimiento()
    {
        return $this->hasOne(TblSeguimiento::className(), ['id_seguimiento' => 'id_seguimiento']);
    }

    /**
     * Gets query for [[Situacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSituacion()
    {
        return $this->hasOne(TblSituacionActual::className(), ['id_situacion' => 'id_situacion']);
    }

    /**
     * Gets query for [[UserIngreso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserIngreso()
    {
        return $this->hasOne(TblUsuarios::className(), ['id_usuario' => 'user_ingreso']);
    }

    /**
     * Gets query for [[UserModifico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserModifico()
    {
        return $this->hasOne(TblUsuarios::className(), ['id_usuario' => 'user_modifico']);
    }
}
