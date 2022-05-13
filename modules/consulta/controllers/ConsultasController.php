<?php

namespace app\modules\consulta\controllers;
use app\models\TblConsultas;
use app\modules\consulta\models\ConsultasSearch;
use yii\web\Controller;
use app\models\TblConductas;
use app\models\TblPruebas;
use app\models\TblTratamientos;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\CoreController;
use app\models\TblPacientes;
use Yii;
use Exception;
use Mpdf\Tag\Tr;

/**
 * ConsultasController implements the CRUD actions for TblConsultas model.
 */
class ConsultasController extends Controller
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
     * Lists all TblConsultas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConsultasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblConsultas model.
     * @param int $id_situacion Id Situacion
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_situacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_situacion),
        ]);
    }

    /**
     * Creates a new TblConsultas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblConsultas();
        $model2 = new TblConductas();
        $model3 = new TblPruebas();
        $model4 = new TblTratamientos();
        $model5 = new TblPacientes();
        $PacienteID= null;
        $PruebasID = null;
        $TratamientoID = null;

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

            if ($model3->load($this->request->post())) {
                    $transaction3 = Yii::$app->db->beginTransaction();
                        
                    try{
                        if($model3->save()){
                            $PruebasID = $model3->id_prueba;
                        }else{
                            throw new Exception(implode("<br/> ", \Yii\helpers\ArrayHelper::getColumn
                            ($model->getErrors(), 0, false)));
                        }
                    
                        $transaction3->commit();
                    }catch(Exception $e){
                        $transaction3->rollBack();
                        $controller = Yii::$app->controller->id ."/". Yii::$app->controller->action->id;
                        CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                        return $this->redirect(['index']);
                }
            } 
            if ($model4->load($this->request->post())) {
                $transaction4 = Yii::$app->db->beginTransaction();
                    
                try{
                    if($model4->save()){
                        $TratamientoID = $model4->id_tratamiento;
                    }else{
                        throw new Exception(implode("<br/> ", \Yii\helpers\ArrayHelper::getColumn
                        ($model->getErrors(), 0, false)));
                    }
                
                    $transaction4->commit();
                }catch(Exception $e){
                    $transaction4->rollBack();
                    $controller = Yii::$app->controller->id ."/". Yii::$app->controller->action->id;
                    CoreController::getErrorLog(\Yii::$app->user->identity->id, $e, $controller);
                    return $this->redirect(['index']);
            }
        }        
        

            $transaction = Yii::$app->db->beginTransaction();
                
            try{
                $model->fecha_ingreso = date('Y-m-d H:i:s');
                $model->fecha_modifico = date('Y-m-d H:i:s');
                $model->user_ingreso = \Yii::$app->user->identity->id;
                $model->user_modifico = \Yii::$app->user->identity->id;
                $model->id_prueba = $PruebasID;
                $model->id_tratamiento = $TratamientoID;

                if(!$model->save()){
                    throw new Exception(implode("<br/> ", \Yii\helpers\ArrayHelper::getColumn
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
        return $this->redirect(['view','id_situacion'=> $model->id_situacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
                'model5' => $model5,
            ]);
        }
    }

    /**
     * Updates an existing TblConsultas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_situacion Id Situacion
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_situacion)
    {
        $model = $this->findModel($id_situacion);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_situacion' => $model->id_situacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblConsultas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_situacion Id Situacion
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_situacion)
    {
        $this->findModel($id_situacion)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblConsultas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_situacion Id Situacion
     * @return TblConsultas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_situacion)
    {
        if (($model = TblConsultas::findOne(['id_situacion' => $id_situacion])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
