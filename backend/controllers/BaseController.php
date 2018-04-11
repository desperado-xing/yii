<?php
namespace backend\controllers;
use yii;
use yii\web\Controller;
use backend\models\menu;
/**
* 公共控制器
*/
class BaseController extends Controller
{
	public $layout = "main.php";
	/**
	 * 获取菜单(挪到header.php中 效果更佳);
	 * @return [type] [description]
	 */
	/*public function __construct(){
       //$controller = Yii::$app->controller->id;
   	   return self::getController();
	}*/
	public function menu(){
		$tree = Menu::getMenu();
		$view = Yii::$app->view;
		return $view->params['menu'] = $tree;
	}
	public function beforeAction($action)
    {
	if (parent::beforeAction($action)) {
		if ($this->enableCsrfValidation) {
			Yii::$app->getRequest()->getCsrfToken(true);
		}
		return true;
	}

	return false;
   }
   public static function getController(){
   	   $controller = Yii::$app->controller->id;
   	   var_dump($controller);
   }
}





?>