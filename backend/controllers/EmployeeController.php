<?php

namespace backend\controllers;

use Yii;
use app\models\Employee;
use backend\models\EmployeeSearch;
use kartik\mpdf\Pdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
                        'actions' => ['create', 'index', 'update', 'view', 'delete', 'barcode'],
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->can("viewEmployee"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->can("viewEmployee"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionBarcode()
    {
        if (!Yii::$app->user->can("viewEmployee"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = Employee::find()->where(['<>', 'status', '0'])->all();

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            'defaultFontSize' => '20pt',
            // your html content input
            'content' => $this->renderPartial('barcode', ['model' => $model]),
            'options' => [
                // any mpdf options you wish to set
            ],
            'methods' => [
                'SetTitle' => 'พนักงาน ขสมก.',
                'SetSubject' => 'รายชื่อและรหัสพนักงาน ขสมก',
                'SetHeader' => ['รายชื่อพนักงาน||Genarated: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);

        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $pdf->options['fontDir'] = array_merge($fontDirs, [
            Yii::getAlias('@webroot') . '/fonts'
        ]);



        $pdf->options['fontdata'] = $fontData + [
            'thsarabun' => [
                'R' => 'THSarabun.ttf',
            ]
            
        ];
        //'default_font' => 'frutiger'

        $pdf->options['defaultFont'] = 'thsarabun';
        return $pdf->render();
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can("createEmployee"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = new Employee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can("editEmployee"))
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
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can("deleteEmployee"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
