<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Busines;
$this->title = "修改";
 ?>
 <div class="admin-create">
    <?php $this->render("_tab"); ?>
    <div class="role-form">
        <?php $form = ActiveForm::begin(); ?>
           <?= $form->field($model,"nickname")->textInput(['disabled'=>"disabled"]); ?>
           <?= $form->field($model,'realname')->textInput() ?>
           <?= $form->field($model,'phone')->textInput() ?>
            <?= $form->field($model,'password')->passwordInput() ?>
            <?= $form->field($model,'repass')->passwordInput() ?>
            <?= $form->field($model,'status')->dropDownList(Busines::getStatus(),['style'=>"width:120px"]) ?>
            <?= $form->field($model,"invitecode")->textInput(['disabled'=>'disabled'])?>
           <!--<?=  Html::encode($model->nickname); ?>-->
           <div class="form-group">
              <?= Html::submitButton(Yii::t("backend",'Update'),['class'=>"btn btn-primary"]); ?>
           </div>
        <?php ActiveForm::end();?>    
    </div>

 </div>