<?php
namespace backend\controllers;
use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Menu;
use backend\models\News;
class DataController extends BaseController{
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	public function actionIndex(){
		$database = Yii::$app->db->createCommand("SHOW TABLE STATUS")->queryAll();
		var_dump($database);
		//return $this->render('index',['database'=>$database]);
	}
}



?>