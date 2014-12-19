<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        return $this->render('login', [
//                'model' => $model,
//            ]);
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//     
//          if ((isset($_POST) && !empty($_POST))) {                            
//              if ((isset($_POST['username']) && !empty($_POST['username'])) 
//                && (isset($_POST['password']) && !empty($_POST['password']))){
//                    $model = new LoginForm();
//                    $model->username = $_POST['username'];
//                    $model->password = $_POST['password'];
//                    print_r($model); 
//                  
//                    echo $model->login();                  
//              }
//          }
        
        $user = array();
        $result = array('id' => '1', 'user' => array('id' => 'Officer', 'role' => 'admin'));
        echo json_encode($result);
    }

    public function actionLogout()
    {
//        Yii::$app->user->logout();

//        return $this->goHome();
        return true;
    }
}
