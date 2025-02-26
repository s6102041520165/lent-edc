<?php

namespace backend\controllers;

use Yii;
use app\models\Edc;
use backend\models\EdcSearch;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * EdcController implements the CRUD actions for Edc model.
 */
class EdcController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'index', 'update', 'view', 'print', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Edc models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->can("viewEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $searchModel = new EdcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Edc model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->can("viewEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Edc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can("createEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = new Edc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Edc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can("editEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Edc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can("deleteEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }


    public function actionPrint()
    {
        $model = Edc::find()->all();

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('_print', ['model' => $model]),
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'Privacy Policy - Krajee.com',
                'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                'SetHeader' => ['Krajee Privacy Policy||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
                'SetAuthor' => 'Kartik Visweswaran',
                'SetCreator' => 'Kartik Visweswaran',
                'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);
        return $pdf->render();
    }

    /**
     * Finds the Edc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Edc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Edc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
