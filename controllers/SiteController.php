<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\NumberSertificat;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\VarDumper;
use yii\rest\ActiveController;

class SiteController extends ActiveController
{

    public $modelClass = '';
    public $enableCsrfValidation = '';


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => [isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : 'http://' . $_SERVER['REMOTE_ADDR']],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
            'actions' => []
        ];

        $auth = [
            'class' => HttpBearerAuth::class,
            'only' => ['logout'], // только те action, для которых будет применяться аутентификация
        ];

        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     * 
     */

    public function actionCertificate()
    {
         $model = new NumberSertificat();
        $model->clientId = Yii::$app->request->headers['clientId'];
        if ($model->load([ ...Yii::$app->request->post(), 'clientId' => Yii::$app->request->headers['clientId']], '') && $model->validate()) {
            $before_model = NumberSertificat::findOne(['course_id' => $model->course_id, 'student_id' => $model->student_id]);
            if ($before_model) {
                $model->number = $before_model->number;
            } else {
                $model->number = Yii::$app->security->generateRandomString(6);
                $model->save();
            }
            return $this->asJson([
                'course_number' => $model->number,
            ]);
        } else {
            VarDumper::dump($model->attributes, 10, false);
            return $this->asJson([
                'errors' => $model->errors,
            ]);
        }
    }
}
