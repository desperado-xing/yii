<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "添加商户";
?>
<div class="admin-create">
   <?= $this->render("_tab"); ?> 
   <div class="role-form">
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      <?= $form->field($model,"nickname")->textInput(); ?>
      <?= $form->field($model,"realname")->textInput(); ?>
      <?= $form->field($model,"password")->passwordInput();?>
       <?= $form->field($model,"repass")->passwordInput();?>
      <?= $form->field($model,"phone")->textInput();?>
      <?= $form->field($model,"sort")->textInput(); ?>
      <?= $form->field($model,'account')->fileInput(); ?>
      <div class="form-group">
         <?= Html::submitButton(Yii::t("backend","Create"),['class'=>"btn btn-primary",'id'=>"sub"]) ?>
      </div>
      
      <?php ActiveForm::end(); ?>
   </div>


</div>