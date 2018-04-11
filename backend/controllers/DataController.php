<?php
namespace backend\controllers;
use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Menu;
use common\library\mysql_back;
use backend\models\News;
class DataController extends BaseController{
    private $config;
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	public function actionIndex(){
        $aa = Yii::$app->db->createCommand("SHOW TABLES")->queryAll();
        var_dump($aa);exit;
		$database = Yii::$app->db->createCommand("SHOW TABLE STATUS")->queryAll();
        $database = array_map('array_change_key_case', $database);
		//var_dump($database);
		return $this->render('index',['database'=>$database]);
	}
    public function actionTest(){
        //获取url中host的信息  Yii::$app->request->getHostInfo();
        //var_dump(Yii::$app->db->connectionString);
        $connect_str = parse_url(Yii::$app->request->getHostInfo().Yii::$app->request->url);//将url解析成数组。
        //var_dump($connect_str);
        $this->config = [
            'host'=>"localhost",
            'dbname'=>"yii2",
            'port'=>'3306',
            'username'=>'root',
            'password'=>"123321",
            'dbprefix'=>'yii_',
            'charset'=>"utf8",
            'path'=>'./backend/web/database',
            'isCompress'=>"1",
            'isDownload'=>"0",

        ];
        //var_dump($this->config);
        $back = new mysql_back($this->config);
        var_dump($back->setdbname('yii2'));
        
    }
}



?>