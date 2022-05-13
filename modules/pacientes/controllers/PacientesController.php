<?php

namespace app\modules\pacientes\controllers;
use app\models\TblPacientes;
use app\modules\pacientes\models\PacientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Tag\Tr;
use app\controllers\CoreController;
use Yii;
use Exception;

/**
 * PacientesController implements the CRUD actions for TblPacientes model.
 */
class PacientesController extends Controller
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
     * Lists all TblPacientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PacientesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPacientes model.
     * @param int $id_paciente Id Paciente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_paciente)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_paciente),
        ]);
    }

    /**
     * Creates a new TblPacientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblPacientes();

        if ($model->load($this->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
                
            try{
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
        return $this->redirect(['view','id_paciente'=> $model->id_paciente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
   

    /**
     * Updates an existing TblPacientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_paciente Id Paciente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_paciente)
    {
        $model = $this->findModel($id_paciente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_paciente' => $model->id_paciente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPacientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_paciente Id Paciente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_paciente)
    {
        $this->findModel($id_paciente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPacientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_paciente Id Paciente
     * @return TblPacientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_paciente)
    {
        if (($model = TblPacientes::findOne(['id_paciente' => $id_paciente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
