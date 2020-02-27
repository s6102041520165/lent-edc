<?php

namespace backend\controllers;

use app\models\Edc;
use Yii;
use app\models\Lent;
use app\models\LentSave;
use backend\models\LentSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use kartik\mpdf\Pdf;

/**
 * LentController implements the CRUD actions for Lent model.
 */
class LentController extends Controller
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
                        'actions' => ['create', 'index', 'update', 'delete', 'view', 'summary', 'return'],
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
     * Lists all Lent models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $searchModel = new LentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSummary()
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        // จำนวนที่ยืม
        $modelEDC = (new \yii\db\Query())->from('edc')->where('status=1');
        $sumEDC = $modelEDC->count('*');

        $modelLent = (new \yii\db\Query())->from('lent')->where('status=1');
        $sumLent = $modelLent->count('*');

        // จำนวนพนักงาน
        $employee = (new \yii\db\Query())->from('employee');
        $total_employee = $employee->count('*');

        // จำนวนเครื่อง EDC
        $modelEDC = (new \yii\db\Query())->from('edc')->where('status=2');
        $total_Edc_fix = $modelEDC->count('*'); //จำนวนเครื่องที่ส่งซ่อม

        // จำนวนเครื่องที่ยืมยังไม่คืน
        $modelLent = (new \yii\db\Query())->from('lent')->where('status=2');
        $total_rent = $modelLent->count('*');

        // จำนวนเขต
        $modelLent = (new \yii\db\Query())->from('district');
        $total_district = $modelLent->count('*');

        // จำนวนเครื่อง EDC
        $modelLent = (new \yii\db\Query())->from('edc');
        $total_edc = $modelLent->count('*');

        return $this->render('summary', [
            'lent' => $sumLent,
            'active' => $sumEDC,
            'total_employee' => $total_employee,
            'total_fix' => $total_Edc_fix,
            'total_rent' => $total_rent,
            'total_district' => $total_district,
            'total_edc' => $total_edc
        ]);
    }

    /*   public function dashboardEmployee()
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");
    } */

    /**
     * Displays a single Lent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = new LentSave();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save())
                return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionReturn()
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $modelReturn = new Lent();

        //$modelReturn = $this->findmodelReturn($id);

        if ($modelReturn->load(Yii::$app->request->post())) {
            $searchModelReturn = Lent::findOne(['edc_id' => $modelReturn->edc_id, 'status' => 1]);
            $id = $searchModelReturn->id;
            //var_dump($id);

            $model = $this->findReturn($id);

            $model->setAttribute('return_date', time());
            $model->setAttribute('status', 2);
            //var_dump($model);
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('return', [
            'modelReturn' => $modelReturn,
        ]);
    }


    /*public function validateInput($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
            }
        }
    }*/

    /**
     * Deletes an existing Lent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can("lentEdc"))
            throw new ForbiddenHttpException("ไม่มีสิทธิ์เข้าถึงข้อมูล");

        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LentSave::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findReturn($id)
    {
        if (($model = Lent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
