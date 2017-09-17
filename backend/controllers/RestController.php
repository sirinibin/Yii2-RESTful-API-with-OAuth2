<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;



class RestController extends Controller
{
    public $api_version;

    public $request;

    public $enableCsrfValidation = false;

    public $headers;


    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                // 'Access-Control-Allow-Origin' => ['*', 'http://haikuwebapp.local.com:81','http://localhost:81'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]

        ];
        return $behaviors;
    }

    public function init()
    {

        $this->api_version = isset($_SERVER['HTTP_X_API_VERSION']) ? $_SERVER['HTTP_X_API_VERSION'] : 1;
        $this->request = json_decode(file_get_contents('php://input'), true);

        if(json_last_error()){
            Yii::$app->api->sendFailedResponse(['Invalid Json']);

        }

    }

}


