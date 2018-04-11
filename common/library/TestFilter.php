<?php
namespace common\library;
use Yii;
use yii\base\Action;
use yii\base\ActionFilter;
class TestFilter extends ActionFilter{
	public function beforeAction($action){
		echo "在执行Action之前输出";
	}
	public function afterAction($action){
		echo "在执行Action之后输出";
	}
}



?>