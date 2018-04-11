<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
$this->title="新增新闻";  

?>
<div class="admin-create">
     <?php
        echo Nav::widget([
        	'items'=>[
        	   [
        	      'label'=>"新闻列表",
        	      'url'=>['site/index'],
        	   ],
        	   [
        	       'label'=>Yii::t("backend","Create"),
        	       'url'=>['site/create'],
        	   ],
        	],
        	'options'=>['class'=>"nav-tabs"],


        ])

     ?>
     <div class="role-form">
         <?php $form=ActiveForm::begin(); ?>
         <?= $form->field($model,"name")->textInput(); ?>
         <?= $form->field($model,"content")->textarea(); ?>
         <div class="form-group">
              <?= Html::submitButton(Yii::t("backend","Create"),['class'=>'btn btn-primary']) ?>

         </div>
         <?php ActiveForm::end(); ?>
     </div>



</div>