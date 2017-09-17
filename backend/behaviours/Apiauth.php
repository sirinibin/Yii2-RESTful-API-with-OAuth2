<?php
namespace backend\behaviours;
    /**
     * @link http://www.yiiframework.com/
     * @copyright Copyright (c) 2008 Yii Software LLC
     * @license http://www.yiiframework.com/license/
     */

//namespace yii\filters\auth;
use Yii;
use yii\filters\auth\AuthMethod;
use common\models\HaikuApps;

/**
 * QueryParamAuth is an action filter that supports the authentication based on the access token passed through a query parameter.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Apiauth extends AuthMethod
{
    /**
     * @var string the parameter name for passing the access token
     */
    public $tokenParam = 'access-token';

    public $exclude = [];
    public $callback = [];


    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
        $headers = Yii::$app->getRequest()->getHeaders();

        $accessToken=NULL;
        if(isset($_GET['access_token'])){
            $accessToken=$_GET['access_token'];
        }else {
            $accessToken = $headers->get('x-access_token');
        }

        if(empty($accessToken)){

            if(isset($_GET['access-token'])){
                $accessToken=$_GET['access-token'];
            }else {
                $accessToken = $headers->get('x-access-token');
            }
        }

       // $accessToken = $request->get($this->tokenParam);

             /*
              if(isset($_POST['access-token'])) {

                  $accessToken = $_POST['access-token'];
                  //echo $accessToken;
                  //exit;
              }
             */

        //echo $accessToken;
        //exit;



        /*
        if(isset($_SERVER['HTTP_X_ACCESS_TOKEN'])) {

            $accessToken=$_SERVER['HTTP_X_ACCESS_TOKEN'];
        }
        */
        //echo "AT:".$accessToken;
        //  exit;
        if (is_string($accessToken)) {
            $identity = $user->loginByAccessToken($accessToken, get_class($this));
            if ($identity !== null) {
                return $identity;
            }
        }
        if ($accessToken !== null) {

            Yii::$app->api->sendFailedResponse('Invalid Access token');

            // $this->handleFailure($response);
        }


        return null;
    }

    public function beforeAction($action)
    {
        //echo "okk";
        //exit;


        if (in_array($action->id, $this->exclude)&&
            !isset($_GET['access-token']))
        {
            //Yii::$app->api->sendFailedResponse("error1");
           // Yii::$app->api->sendSuccessResponse(["nice1"]);
           // exit;
            return true;
        }

        //if (!$this->verifyApp())
        //    Yii::$app->api->sendFailedResponse('Invalid Request(App not verified)');


        if (in_array($action->id, $this->callback)&&
            !isset($_GET['access-token']))
        {
            //Yii::$app->api->sendFailedResponse("error1");
            // Yii::$app->api->sendSuccessResponse(["nice1"]);
            // exit;
            return true;
        }



        $response = $this->response ?: Yii::$app->getResponse();

        $identity = $this->authenticate(
            $this->user ?: Yii::$app->getUser(),
            $this->request ?: Yii::$app->getRequest(),
            $response
        );

        if ($identity !== null) {
            return true;
        } else {
            $this->challenge($response);
            $this->handleFailure($response);

            Yii::$app->api->sendFailedResponse('Invalid Request');
            //return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function handleFailure($response)
    {
        Yii::$app->api->sendFailedResponse('Invalid Access token');
        //throw new UnauthorizedHttpException('You are requesting with an invalid credential.');
    }

}
