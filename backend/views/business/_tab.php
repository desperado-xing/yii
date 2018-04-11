<?php
use yii\bootstrap\Nav;

echo Nav::widget([
	'items'=>[
	   [
	      'label'=>'商户列表',
	      'url'=>["business/index"],
	   ],
	   [
	      'label'=>"添加商户",
	      'url'=>['business/create'],

	   ],
	],
	'options'=>['class'=>"nav-tabs"],
]);
?>