<?php

namespace app\modules\consulta\controllers;

use app\models\TblPruebas;
use app\modules\consulta\models\PruebasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PruebasController implements the CRUD actions for TblPruebas model.
 */
class PruebasController extends Controller
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
     * Lists all TblPruebas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PruebasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPruebas model.
     * @param int $id_prueba Id Prueba
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_prueba)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_prueba),
        ]);
    }

    /**
     * Creates a new TblPruebas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblPruebas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_prueba' => $model->id_prueba]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPruebas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_prueba Id Prueba
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_prueba)
    {
        $model = $this->findModel($id_prueba);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_prueba' => $model->id_prueba]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPruebas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_prueba Id Prueba
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_prueba)
    {
        $this->findModel($id_prueba)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPruebas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_prueba Id Prueba
     * @return TblPruebas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_prueba)
    {
        if (($model = TblPruebas::findOne(['id_prueba' => $id_prueba])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
