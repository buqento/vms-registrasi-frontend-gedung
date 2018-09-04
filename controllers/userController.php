<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UserAdmin;

class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new UserAdmin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = UserApp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}