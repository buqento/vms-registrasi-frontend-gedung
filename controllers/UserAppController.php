<?php

namespace app\controllers;

use Yii;
use app\models\Userapp;
use app\models\UserappSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * UserappController implements the CRUD actions for Userapp model.
 */
class UserappController extends Controller
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

    /**
     * Lists all Userapp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserappSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userapp model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Userapp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userapp();
        $model->authKey = sha1(rand(10,1000));

        $post = Yii::$app->request->post('UserApp'); //Model ClassName
        if (Yii::$app->request->isPost) {
            $model->guest_name = $post['guest_name'];
            $model->id_type = $post['id_type'];
            $model->id_number = $post['id_number'];
            $model->gender = $post['gender'];
            $model->phone_number = $post['phone_number'];
            $model->address = $post['address'];
            $model->email = $post['email'];
            $model->username = $post['username'];
            $model->password = $post['password'];
            $model->photo = UploadedFile::getInstance($model, 'photo');  
            if($model->save() && $model->upload()){
                return $this->redirect(['/site/login']);             
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userapp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->authKey = sha1(rand(10,1000));

        $post = Yii::$app->request->post('UserApp'); //Model ClassName
        if (Yii::$app->request->isPost) {
            $model->guest_name = $post['guest_name'];
            $model->id_type = $post['id_type'];
            $model->id_number = $post['id_number'];
            $model->phone_number = $post['phone_number'];
            $model->address = $post['address'];
            $model->email = $post['email'];
            $model->username = $post['username'];
            $model->password = $post['password'];
            $model->photo = UploadedFile::getInstance($model, 'photo');  
            if($model->save() && $model->upload()){
                // return $this->redirect(['/site/login']);
                return $this->redirect(['view', 'id' => $model->id]);             
            }
        }
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userapp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userapp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Userapp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userapp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
