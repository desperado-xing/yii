<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Busines;
use yii\widgets\ActiveForm;

$this->title = '商户管理';

?>
<div class="admin-index">
   <?= $this->render("_tab"); ?>
   <?php ActiveForm::begin(); ?>
   <?php Pjax::begin(); ?> 
      <?= GridView::widget([
      	'dataProvider'=>$dataProvider,
      	'filterModel'=>$searchProvider,
      	'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
      	'layout'=>"{items}{summary}{pager}",
      	'columns'=>[
      	   'id',
      	   [
      	     'label'=>"用户名",
      	     'attribute'=>"nickname",
      	   ],
      	   [
      	     'label'=>"真实姓名",
      	     'value'=>"realname",
      	   ],
      	   [
      	     'label'=>"手机号",
      	     'value'=>"phone",

      	   ],
      	   [
      	     'label'=>"邀请码",
      	     'value'=>"invitecode", 
      	   ],
      	   [
      	     'label'=>"状态",
      	     'attribute'=>"status",
      	     'value'=>function($data){
      	     	//var_dump($data->status);exit;
      	     	return Busines::getStatus($data['status']);
      	     },
      	     'filter'=>$searchProvider->getStatus(),
      	   ],
      	   [
      	     'label'=>"排序",
      	     'format'=>"raw",
      	     'value'=>function($data){
      	     	return Html::textInput('sort['.$data['id'].']',$data['sort']);
      	     }
      	   ],
      	   [
      	     'label'=>"时间",
      	     'value'=>function($data){
      	     	return date("Y-m-d H:i:s",$data['createtime']);
      	     }
      	   ],
      	   [
      	     'class'=>"common\grid\ActionColumn",
      	     'header'=>Yii::t("backend","Operate"),
      	     'template'=>"{update} {delete}", 
      	   ]
      	]


      ]); ?> 
      <div class="form-group">
      <?= Html::submitButton("排序",['class'=>"btn btn-info"]) ?>
      </div>
   <?php Pjax::end(); ?>
   <?php ActiveForm::end(); ?>

</div>