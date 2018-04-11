<?php
namespace common\grid;
use yii;
use yii\helpers\html;
class ActionColumn extends \yii\grid\ActionColumn{
	public $template = "{view} {update} {delete}";
	protected function initDefaultButtons(){
		if(!isset($this->buttons['view'])){
			$this->buttons['view'] = function($url,$model,$key){
				$options = array_merge([
				   'title'=>Yii::t("yii","View"),
				   'aria-lable'=>Yii::t("yii","View"),
				   'data-pjax'=>"0",
				   'class'=>"btn btn-info btn-xs",
				],$this->buttonOptions);
				return Html::a('<span class="fa fa-eye"></span>'.Yii::t("yii","View"),$url,$options);
			};
		}
		if(!isset($this->buttons['update'])){
			$this->buttons['update'] = function($url,$model,$key){
				$options = array_merge([
				   'title'=>Yii::t("yii","Update"),
				   'aria-lable'=>Yii::t("yii","Update"),
				   'data-pjax'=>"0",
				   'class'=>"btn btn-primary btn-xs",
				],$this->buttonOptions);
				return Html::a('<span class="fa fa-edit" ></span>'.Yii::t("yii","Update"),$url,$options);
			};
		}
		if(!isset($this->buttons['create'])){
			$this->buttons['create'] = function($url,$model,$key){
				$options = array_merge([
					'title'=>Yii::t("yii","Create"),
					"aria-lable"=>Yii::t("yii","Create"),
					'data-pjax'=>"0",
					'class'=>"btn btn-info btn-xs",
					],$this->buttonOptions);
				return Html::a("<apan class=\"fa fa-create\" ></span>".Yii::t("yii","Create"),$url,$options);
			};
		}
		if(!isset($this->buttons['delete'])){
			$this->buttons['delete'] = function($url,$model,$key){
				$options = array_merge([
					'title'=>Yii::t("yii","Delete"),
					'aria-lable'=>Yii::t("yii","Delete"),
					'data-pjax'=>'0',
					'data-confirm'=>Yii::t("yii","确定删除？"),
					'data-method'=>"post",
					'class'=>"btn btn-danger btn-xs",
				],$this->buttonOptions);
				return Html::a("<span class='fa fa-times'></span>".Yii::t("yii","Delete"),$url,$options);
			};
		}
	}
}


 	






?>