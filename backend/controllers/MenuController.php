<?php
namespace backend\controllers;
use yii;
use backend\models\Menu;
use common\models\TestTree;
class MenuController extends BaseController{
	//public $layout="header.php";
	public function actionIndex(){
		$model = new Menu();
		$dataProvider = $model->getArrayMenu();
		//$this->dump($dataProvider);exit;
		//\yii\helpers\ArrayHelper::toArray($model->getTreemenu())  结果集变成数组的格式;
		
		//var_dump(IS_CLI);
		//extension_loaded 检查php拓展是否开启;
		//var_dump(extension_loaded('mysqli'));
		return $this->render("index",['dataProvider'=>$dataProvider]);
		
	}
	public function actionUpdate($id){
		$model = Menu::findOne($id);
		if($model->load(Yii::$app->request->post())){
			//$sql = "select * from yii_menu ";
			//$sql.="asArray  '" .   .  "' aaa " 
		}else{
			$data = Menu::find()->asArray()->all();
			$tree = new TestTree($data);
			//  var_dump($tree->getTreeSelect());exit;
			return $this->render("Update",['model'=>$model,'treeArr'=>$tree->getTreeSelect()]);
		}
		
	}
}



?>