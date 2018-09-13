<?php

namespace app\controllers;

use Yii;
use app\models\Visitunregister;
use app\models\ViewDetailVisitunregister;
use app\models\VisitunregisterSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;
/**
 * VisitunregisterController implements the CRUD actions for Visitunregister model.
 */
class VisitunregisterController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new VisitunregisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewdetailvisit($code)
    {
        return $this->render('viewdetailvisitunregister', [
            'model' => $this->findModelview($code),
        ]);
    }

    public function actionCreate($id)
    {
        $model = new Visitunregister();

        $model->code = $this->createRandom(6);
        $model->destination_id = $id;

        $post = Yii::$app->request->post('VisitUnregister'); //Model ClassName
        if (Yii::$app->request->isPost) {
            $model->guest_name = $post['guest_name'];
            $model->id_type = $post['id_type'];
            $model->id_number = $post['id_number'];
            $model->phone_number = $post['phone_number'];
            $model->address = $post['address'];
            $model->email = $post['email'];
            $model->dt_visit = $post['dt_visit'];
            $model->long_visit = $post['long_visit'];
            $model->additional_info = $post['additional_info'];
            $model->photo = UploadedFile::getInstance($model, 'photo');  
            if($model->save() && $model->upload()){
                // return $this->redirect(['view', 'id' => $model->id]);   
                return $this->render('view', ['model' => $this->findModelview($model->code)]);          
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Visitunregister::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelview($code)
    {
        if (($model = ViewDetailVisitunregister::find($code)
            ->where(['code' => $code])
            ->one()
        ) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function createRandom($length)
    {
        $data = '0123456789';
        $string = '';
        for($i = 0; $i < $length; $i++) {
            $pos = rand(0, strlen($data)-1);
            $string .= $data{$pos};
        }
        return $string;
    }

    public function actionReport() {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('privacy');
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_DOWNLOAD, 
            // your html content input
            'content' => $content,  

            'filename' => 'visit_' . time() . '.pdf',
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Visitor Management System'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Visitor Management System'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
}
