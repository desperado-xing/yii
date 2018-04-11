<?php
namespace backend\controllers;
use yii;
class IndexController extends BaseController{
	public $layout = "main.php";
	public function actionIndex(){
		/*$source = Yii::$app->redis->set('var1','asdasd');
		$source = Yii::$app->redis->get('var1');
	    $red = Yii::$app->redis->set("test","test");
	    $red = Yii::$app->redis->get("test");
	    $source = Yii::$app->redis->del("var1");
	    var_dump($red);
		var_dump($source);*/
		var_dump(132);
		return $this->render("index");
	}




}





?>
