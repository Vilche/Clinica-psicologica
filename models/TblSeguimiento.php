<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_seguimiento".
 *
 * @property int $id_seguimiento
 * @property string $cod_sesion
 * @property int $id_paciente
 * @property string $fecha_seguimiento
 * @property string $lugar_seguimiento
 * @property int $id_motivo
 * @property string $objetivo_sesion
 * @property string $tecnica_sesion
 * @property string $conclusiones_sesion
 * @property string $recomendaciones_sesion
 * @property int $user_ingreso
 * @property string $fecha_ingreso
 * @property int $user_modifico
 * @property string $fecha_modifico
 * @property int $activo
 *
 * @property TblMotivoConsulta $motivo
 * @property TblPacientes $paciente
 * @property TblExpediente[] $tblExpedientes
 * @property TblUsuarios $userIngreso
 * @property TblUsuarios $userModifico
 */
class TblSeguimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_seguimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_sesion', 'id_paciente', 'fecha_seguimiento', 'lugar_seguimiento', 'id_motivo', 'objetivo_sesion', 'tecnica_sesion', 'conclusiones_sesion', 'recomendaciones_sesion', 'user_ingreso', 'fecha_ingreso', 'user_modifico', 'fecha_modifico', 'activo'], 'required'],
            [['id_paciente', 'id_motivo', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['fecha_seguimiento', 'lugar_seguimiento', 'objetivo_sesion', 'tecnica_sesion', 'conclusiones_sesion', 'recomendaciones_sesion'], 'string'],
            [['fecha_ingreso', 'fecha_modifico'], 'safe'],
            [['cod_sesion'], 'string', 'max' => 255],
            [['id_motivo'], 'exist', 'skipOnError' => true, 'targetClass' => TblMotivoConsulta::className(), 'targetAttribute' => ['id_motivo' => 'id_motivo']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => TblPacientes::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
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
            'id_seguimiento' => 'Id Seguimiento',
            'cod_sesion' => 'Cod Sesion',
            'id_paciente' => 'Id Paciente',
            'fecha_seguimiento' => 'Fecha Seguimiento',
            'lugar_seguimiento' => 'Lugar Seguimiento',
            'id_motivo' => 'Id Motivo',
            'objetivo_sesion' => 'Objetivo Sesion',
            'tecnica_sesion' => 'Tecnica Sesion',
            'conclusiones_sesion' => 'Conclusiones Sesion',
            'recomendaciones_sesion' => 'Recomendaciones Sesion',
            'user_ingreso' => 'User Ingreso',
            'fecha_ingreso' => 'Fecha Ingreso',
            'user_modifico' => 'User Modifico',
            'fecha_modifico' => 'Fecha Modifico',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[Motivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMotivo()
    {
        return $this->hasOne(TblMotivoConsulta::className(), ['id_motivo' => 'id_motivo']);
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
     * Gets query for [[TblExpedientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblExpedientes()
    {
        return $this->hasMany(TblExpediente::className(), ['id_seguimiento' => 'id_seguimiento']);
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
