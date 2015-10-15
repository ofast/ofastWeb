<?php
/**
 * Created by PhpStorm.
 * User: An Khang
 * Date: 10/6/2015
 * Time: 8:22 PM
 */

namespace frontend\controllers;


use common\models\LoginForm;
use yii\web\Controller;

class AppController extends Controller
{
    public function actionLogin(){
        if (!\Yii::$app->user->isGuest) {
            \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $response = ['success'=>'false' , 'message'=>'ban da login roi!!!'];
            return $response;
        }

        $model = new LoginForm();
        if($_POST) {
            if ($model->load(\Yii::$app->request->post()) && $model->login()) {
                \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $response = ['success' => 'true', 'message' => 'Login successful'];
                return $response;
            } else {
                \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $response = ['success'=>'false' , 'message'=>'incorrect account'];
                return $response;
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionIndex(){
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = \common\models\User::find()->all();
        return $user;
    }

}