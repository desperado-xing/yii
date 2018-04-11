<?php
use yii\bootstrap\Nav;

echo Nav::widget([
	   'items'=>[
	      [
	        'label'=>"菜单列表",
	        'url'=>['menu/index'],

	      ],
	      [
	        'label'=>"菜单添加",
	        'url'=>['menu/create'],
	      ]
	   ],
	   'options'=>['class'=>"nav-tabs"],

	])


?>