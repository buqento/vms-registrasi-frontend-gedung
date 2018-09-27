<?php

namespace app\controllers;

use Yii;
use app\models\Visited;
use app\models\VisitedSearch;
use app\models\UserApp;
use app\models\Dcldestination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;

/**
 * VisitedController implements the CRUD actions for Visited model.
 */
class VisitedController extends Controller
{
    /**
     * {@inheritdoc}
     */

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
        $searchModel = new VisitedSearch();
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

    public function actionCreate($id)
    {
        $model = new Visited();
        $model->visit_code = $this->createRandom(6);
        $model->destination = $this->getTenant($id);

        $post = Yii::$app->request->post('Visited'); //Model ClassName
        if(Yii::$app->user->isGuest){
            $model->guest_name = $post['guest_name'];
            $model->id_type = $post['id_type'];
            $model->id_number = $post['id_number'];
            $model->gender = $post['gender'];
            $model->phone_number = $post['phone_number'];
            $model->email = $post['email'];            
            $model->address = $post['address'];    
            $model->photo = $post['photo'];    
        }else{
            $user_identity = UserApp::find()
                    ->where(['id' => Yii::$app->user->identity->id])
                    ->one();
            $model->guest_name = $user_identity->username;
            $model->id_type = $user_identity->id_type;
            $model->id_number = $user_identity->id_number;
            $model->gender = $user_identity->gender;
            $model->phone_number = $user_identity->phone_number;
            $model->email = $user_identity->email;
            $model->address = $user_identity->address;
            $model->photo = $user_identity->photo;
        }

        if (Yii::$app->request->isPost) {

            $model->dt_visit = $post['dt_visit'];
            $model->long_visit = $post['long_visit'];
            $model->additional_info = $post['additional_info']; 

            $model->save();    
            return $this->redirect(['view', 
                'id' => $model->id
            ]);         
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
        if (($model = Visited::findOne($id)) !== null) {
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

    public function getTenant($id)
    {
        $destination = Dcldestination::findOne(['id' => $id]);
        return $destination->company_name;
    }

    public function actionExport($visit_code) {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('exportpdf');
        
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

            'filename' => 'vms_'.$visit_code.'-' . time() . '.pdf',
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
