<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "更新新闻"//定义网页的title标题


?>
<div class="admin-update">
    <div class="role-form">
       <?php $form=ActiveForm::begin() ?>
       <?= $form->field($model,"name")->textInput() ?>
       <?= $form->field($model,"content")->textarea() ?>

       <div class="form-group">
          <?= Html::submitButton(Yii::t("backend","View"),['class'=>"btn btn-primary"]) ?>
       </div>


       <?php ActiveForm::end(); ?>

    </div>
    

</div>