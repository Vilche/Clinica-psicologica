<?php

namespace app\modules\consulta\controllers;

use app\models\TblTratamientos;
use app\modules\consulta\models\TratamientosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TratamientosController implements the CRUD actions for TblTratamientos model.
 */
class TratamientosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TblTratamientos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TratamientosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblTratamientos model.
     * @param int $id_tratamiento Id Tratamiento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tratamiento)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tratamiento),
        ]);
    }

    /**
     * Creates a new TblTratamientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblTratamientos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tratamiento' => $model->id_tratamiento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblTratamientos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tratamiento Id Tratamiento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tratamiento)
    {
        $model = $this->findModel($id_tratamiento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tratamiento' => $model->id_tratamiento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblTratamientos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tratamiento Id Tratamiento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tratamiento)
    {
        $this->findModel($id_tratamiento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblTratamientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tratamiento Id Tratamiento
     * @return TblTratamientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tratamiento)
    {
        if (($model = TblTratamientos::findOne(['id_tratamiento' => $id_tratamiento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
