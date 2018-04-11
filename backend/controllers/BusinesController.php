<?php
namespace backend\controllers;
use yii;
use backend\models\Business;

class BusinesController extends Basecontroller{
	public function actionIndex(){
		$dataProvider = Business::data();
		return $this->render("index",['dataProvider'=>$dataProvider]);

	}
}


?>