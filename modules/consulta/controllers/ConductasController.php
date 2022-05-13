<?php

namespace app\modules\consulta\controllers;

use app\models\TblConductas;
use app\modules\consulta\models\ConductasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConductasController implements the CRUD actions for TblConductas model.
 */
class ConductasController extends Controller
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
     * Lists all TblConductas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConductasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblConductas model.
     * @param int $id_conducta Id Conducta
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_conducta)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_conducta),
        ]);
    }

    /**
     * Creates a new TblConductas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblConductas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_conducta' => $model->id_conducta]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblConductas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_conducta Id Conducta
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_conducta)
    {
        $model = $this->findModel($id_conducta);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_conducta' => $model->id_conducta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblConductas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_conducta Id Conducta
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_conducta)
    {
        $this->findModel($id_conducta)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblConductas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_conducta Id Conducta
     * @return TblConductas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_conducta)
    {
        if (($model = TblConductas::findOne(['id_conducta' => $id_conducta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
