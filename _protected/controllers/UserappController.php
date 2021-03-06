<?php

namespace app\controllers;

use Yii;
use app\models\Userapp;
use app\models\UserappSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class UserappController extends Controller
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
        $searchModel = new UserappSearch();
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

    public function actionCreate()
    {
        $model = new Userapp();
        $post = Yii::$app->request->post('Userapp');
        if (Yii::$app->request->isPost) {
            $model->name = $post['name'];
            $model->vms_type_id = $post['vms_type_id'];
            $model->id_number = $post['id_number'];
            $model->gender = $post['gender'];
            $model->phone = $post['phone'];
            $model->email = $post['email'];
            $model->photo = $post['photo'];
            $model->address = $post['address'];
            $model->username = $post['username'];
            $model->password = $model->setPassword($post['password']);
            $model->authKey = $model->generateAuthKey();
            if($model->validate()){
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->password = '';
        $post = Yii::$app->request->post('Userapp');
        if (Yii::$app->request->isPost) {
            $model->name = $post['name'];
            $model->vms_type_id = $post['vms_type_id'];
            $model->id_number = $post['id_number'];
            $model->gender = $post['gender'];
            $model->phone = $post['phone'];
            $model->email = $post['email'];
            $model->photo = $post['photo'];
            $model->address = $post['address'];
            $model->username = $post['username'];
            $model->password = $model->setPassword($post['password']);
            $model->authKey = $model->generateAuthKey();
            if($model->validate()){
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Userapp::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
