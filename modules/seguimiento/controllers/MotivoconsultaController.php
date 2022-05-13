<?php

namespace app\modules\seguimiento\controllers;

use app\models\TblMotivoconsulta;
use app\modules\seguimiento\models\MotivoconsultaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MotivoconsultaController implements the CRUD actions for TblMotivoconsulta model.
 */
class MotivoconsultaController extends Controller
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
     * Lists all TblMotivoconsulta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MotivoconsultaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblMotivoconsulta model.
     * @param int $id_motivo Id Motivo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_motivo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_motivo),
        ]);
    }

    /**
     * Creates a new TblMotivoconsulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblMotivoconsulta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_motivo' => $model->id_motivo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblMotivoconsulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_motivo Id Motivo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_motivo)
    {
        $model = $this->findModel($id_motivo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_motivo' => $model->id_motivo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblMotivoconsulta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_motivo Id Motivo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_motivo)
    {
        $this->findModel($id_motivo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblMotivoconsulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_motivo Id Motivo
     * @return TblMotivoconsulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_motivo)
    {
        if (($model = TblMotivoconsulta::findOne(['id_motivo' => $id_motivo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
