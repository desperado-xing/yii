<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //'defaultRoute'=>"site",//修改默认控制器
    'modules' => [
        'gridview'=>[
             'class'=>"\kartik\grid\Module",
        ]
    ],
    'homeUrl'=>'/admin',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'class'=>"common\components\Request",
            'web'=>"/backend/web",
            //'adminUrl'=>"/admin",
            'baseUrl'=>'/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        /*'db'=>[
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2',
            //'emulatePrepare'=>true,
            'username'=>'root',
            'password'=>'123321',
            'charset'=>'utf8',
        ],
        'request'=>[
            'enableCsrfCookie'=>false,

        ],*/
       /* 'redis' =>[
            'class'=>'yii\redis\Connection',
            'hostname'=>"localhost",
            'port'=>6379,
            'database'=>0

        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
       
       'urlManager'=>[
            'enablePrettyUrl'=>true,
            
            'showScriptName' => false ,  //设置去掉index.php
            'rules'=>[]
            /*'rules'=>[
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]*/
        ]
    ],
    'params' => $params,
];
