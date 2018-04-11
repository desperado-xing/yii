<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;

/**
* 首页
*/
class IndexController extends Controller
{
	public $layout = "header.php";
    public function actionIndex(){
    	return $this->render("index");
    }	
	
}




?>