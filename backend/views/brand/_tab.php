<?php
use yii\bootstrap\Nav;

echo Nav::widget([
	   'items'=>[
	      [
	        'label'=>"品牌列表",
	        'url'=>['brand/index'],

	      ],
	      [
	        'label'=>"品牌添加",
	        'url'=>['brand/create'],
	      ]
	   ],
	   'options'=>['class'=>"nav-tabs"],

	])


?>