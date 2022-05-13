<?php

namespace app\modules\seguimiento\controllers;

use app\controllers\CoreController;
use app\models\TblPacientes;
use app\models\TblSeguimiento;
use app\modules\seguimiento\models\SeguimientoSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeguimientoController implements the CRUD actions for TblSeguimiento model.
 */
class SeguimientoController extends Controller
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
     * Lists all TblSeguimiento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SeguimientoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSeguimiento model.
     * @param int $id_seguimiento Id Seguimiento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_seguimiento)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_seguimiento),
        ]);
    }

    /**
     * Creates a new TblSeguimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblSeguimiento();
        $model5 = new TblPacientes();

        if ($model->load($this->request->post())) {
            if ($model5->load($this->request->post())) {
                $transaction5 = Yii::$app->db->beginTransaction();
                    
                try{
                    if($model5->save()){
                        $PacienteID = $model5->id_paciente;
                    }else{
                        throw new Exception(implode("<br/> ", \Yii\helpers\ArrayHelper::getColumn
                        ($model->getErrors(), 0, false)));
                    }
                
                    $transaction5->commit();
                }catch(Exception $e){
                    $transaction5->rollBack();
                    $controller = Yii::$app->controller->id ."/". Yii::$app->controller->action->id;
                    CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                    return $this->redirect(['index']);
            }
        }

            $transaction = Yii::$app->db->beginTransaction();
                
            try{
                $model->fecha_seguimiento = date('Y-m-d H:i:s');
                $model->fecha_ingreso = date('Y-m-d H:i:s');
                $model->fecha_modifico = date('Y-m-d H:i:s');
                $model->user_ingreso = \Yii::$app->user->identity->id;
                $model->user_modifico = \Yii::$app->user->identity->id;

                if(!$model->save()){
                    throw new Exception(implode("<br /> ", \Yii\helpers\ArrayHelper::getColumn
                    ($model->getErrors(), 0, false)));
                }
            
                $transaction->commit();
            }catch(Exception $e){
                $transaction->rollBack();
                $controller = Yii::$app->controller->id ."/". Yii::$app->controller->action->id;
                CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                return $this->redirect(['index']);
        }
        Yii::$app->session->setFlash('success',"el registro se guardo exitosamente");
        return $this->redirect(['view','id_seguimiento'=> $model->id_seguimiento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblSeguimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_seguimiento Id Seguimiento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_seguimiento)
    {
        $model = $this->findModel($id_seguimiento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_seguimiento' => $model->id_seguimiento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblSeguimiento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_seguimiento Id Seguimiento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_seguimiento)
    {
        $this->findModel($id_seguimiento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblSeguimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_seguimiento Id Seguimiento
     * @return TblSeguimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_seguimiento)
    {
        if (($model = TblSeguimiento::findOne(['id_seguimiento' => $id_seguimiento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
