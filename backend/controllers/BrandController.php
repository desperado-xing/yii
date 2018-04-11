<?php
namespace backend\controllers;
use yii;
use backend\models\Brand;

class BrandController extends Basecontroller{
	public $layout = "main.php";
	public function actionIndex(){
		$dataProvider = Brand::getData();
		return $this->render("index",['dataProvider'=>$dataProvider]);
	}
}




?>