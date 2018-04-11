<?php
use yii\bootstrap\Nav;
echo Nav::widget([
	    'items'=>[
	       [
	          'label'=>"新闻列表",
	          'url'=>['site/index'],
	       ],
	       [
	          'label'=>Yii::t("backend","Create")."新闻",
	          'url'=>['site/create'],
	       ],

	    ],
	    'options'=>[
	        'class'=>"nav-tabs",

	    ]




	])



?>