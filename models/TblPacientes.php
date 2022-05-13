<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_pacientes".
 *
 * @property int $id_paciente
 * @property string $nombre_paciente
 * @property string $apellido_paciente
 * @property int $edad_paciente
 * @property string $fecha_nacimiento
 * @property string $lugar_nacimiento
 * @property string $telefono_paciente
 * @property string $direccion_paciente
 * @property string $profesion_paciente
 * @property string $nivel_academico
 * @property string $estado_civil
 * @property int $user_ingreso
 * @property string $fecha_ingreso
 * @property int $user_modifico
 * @property string $fecha_modifico
 * @property int $activo
 *
 * @property TblConsultas[] $tblConsultas
 * @property TblSeguimiento[] $tblSeguimientos
 * @property TblUsuarios $userIngreso
 * @property TblUsuarios $userModifico
 */
class TblPacientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pacientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_paciente', 'apellido_paciente', 'edad_paciente', 'fecha_nacimiento', 'lugar_nacimiento', 'telefono_paciente', 'direccion_paciente', 'profesion_paciente', 'nivel_academico', 'estado_civil', 'user_ingreso', 'fecha_ingreso', 'user_modifico', 'fecha_modifico', 'activo'], 'required'],
            [['edad_paciente', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['fecha_nacimiento', 'fecha_ingreso', 'fecha_modifico'], 'safe'],
            [['nombre_paciente', 'apellido_paciente', 'lugar_nacimiento', 'direccion_paciente', 'profesion_paciente', 'nivel_academico', 'estado_civil'], 'string', 'max' => 255],
            [['telefono_paciente'], 'string', 'max' => 20],
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
            'id_paciente' => 'Id Paciente',
            'nombre_paciente' => 'Nombre Paciente',
            'apellido_paciente' => 'Apellido Paciente',
            'edad_paciente' => 'Edad Paciente',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'lugar_nacimiento' => 'Lugar Nacimiento',
            'telefono_paciente' => 'Telefono Paciente',
            'direccion_paciente' => 'Direccion Paciente',
            'profesion_paciente' => 'Profesion Paciente',
            'nivel_academico' => 'Nivel Academico',
            'estado_civil' => 'Estado Civil',
            'user_ingreso' => 'User Ingreso',
            'fecha_ingreso' => 'Fecha Ingreso',
            'user_modifico' => 'User Modifico',
            'fecha_modifico' => 'Fecha Modifico',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[TblConsultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblConsultas()
    {
        return $this->hasMany(TblConsultas::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * Gets query for [[TblSeguimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSeguimientos()
    {
        return $this->hasMany(TblSeguimiento::className(), ['id_paciente' => 'id_paciente']);
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
