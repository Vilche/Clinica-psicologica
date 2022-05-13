<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_situacion_actual".
 *
 * @property int $id_situacion
 * @property string $motivo_consulta
 * @property string $estado_actual
 * @property string|null $institucion_hospitalaria
 * @property string|null $grupos_sociales
 * @property string|null $grupos_familiares
 * @property string|null $habitos_autocuido
 * @property string|null $medico_actual
 * @property string|null $enfermedad_actual
 * @property string|null $medicamento_actual
 * @property int $id_conducta
 * @property int $id_prueba
 * @property int $id_tratamiento
 * @property int $user_ingreso
 * @property string $fecha_ingreso
 * @property int $user_modifico
 * @property string $fecha_modifico
 * @property int $activo
 *
 * @property TblConductas $conducta
 * @property TblPruebas $prueba
 * @property TblExpediente[] $tblExpedientes
 * @property TblTratamientos $tratamiento
 * @property TblUsuarios $userIngreso
 * @property TblUsuarios $userModifico
 */
class TblSituacionActual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_situacion_actual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['motivo_consulta', 'estado_actual', 'id_conducta', 'id_prueba', 'id_tratamiento', 'user_ingreso', 'fecha_ingreso', 'user_modifico', 'fecha_modifico', 'activo'], 'required'],
            [['motivo_consulta', 'estado_actual', 'institucion_hospitalaria', 'grupos_sociales', 'grupos_familiares', 'habitos_autocuido', 'medico_actual', 'enfermedad_actual', 'medicamento_actual'], 'string'],
            [['id_conducta', 'id_prueba', 'id_tratamiento', 'user_ingreso', 'user_modifico', 'activo'], 'integer'],
            [['fecha_ingreso', 'fecha_modifico'], 'safe'],
            [['id_prueba'], 'exist', 'skipOnError' => true, 'targetClass' => TblPruebas::className(), 'targetAttribute' => ['id_prueba' => 'id_prueba']],
            [['id_tratamiento'], 'exist', 'skipOnError' => true, 'targetClass' => TblTratamientos::className(), 'targetAttribute' => ['id_tratamiento' => 'id_tratamiento']],
            [['user_ingreso'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::className(), 'targetAttribute' => ['user_ingreso' => 'id_usuario']],
            [['user_modifico'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::className(), 'targetAttribute' => ['user_modifico' => 'id_usuario']],
            [['id_conducta'], 'exist', 'skipOnError' => true, 'targetClass' => TblConductas::className(), 'targetAttribute' => ['id_conducta' => 'id_conducta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_situacion' => 'Id Situacion',
            'motivo_consulta' => 'Motivo Consulta',
            'estado_actual' => 'Estado Actual',
            'institucion_hospitalaria' => 'Institucion Hospitalaria',
            'grupos_sociales' => 'Grupos Sociales',
            'grupos_familiares' => 'Grupos Familiares',
            'habitos_autocuido' => 'Habitos Autocuido',
            'medico_actual' => 'Medico Actual',
            'enfermedad_actual' => 'Enfermedad Actual',
            'medicamento_actual' => 'Medicamento Actual',
            'id_conducta' => 'Id Conducta',
            'id_prueba' => 'Id Prueba',
            'id_tratamiento' => 'Id Tratamiento',
            'user_ingreso' => 'User Ingreso',
            'fecha_ingreso' => 'Fecha Ingreso',
            'user_modifico' => 'User Modifico',
            'fecha_modifico' => 'Fecha Modifico',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[Conducta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConducta()
    {
        return $this->hasOne(TblConductas::className(), ['id_conducta' => 'id_conducta']);
    }

    /**
     * Gets query for [[Prueba]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrueba()
    {
        return $this->hasOne(TblPruebas::className(), ['id_prueba' => 'id_prueba']);
    }

    /**
     * Gets query for [[TblExpedientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblExpedientes()
    {
        return $this->hasMany(TblExpediente::className(), ['id_situacion' => 'id_situacion']);
    }

    /**
     * Gets query for [[Tratamiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTratamiento()
    {
        return $this->hasOne(TblTratamientos::className(), ['id_tratamiento' => 'id_tratamiento']);
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
