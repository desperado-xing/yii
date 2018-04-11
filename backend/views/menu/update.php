<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "菜单修改";

?>	
<div class="admin-create">
<?= $this->render("_tab"); ?>
   <div class="role-form">
       <?php $form = ActiveForm::begin(); ?>
           <?= $form->field($model,"pid")->dropDownList(['0'=>'顶级菜单']+$treeArr,['encode' => false]); ?>
           <?= $form->field($model,'name')->textInput(['maxlength'=>true]);?>
           <?= $form->field($model,'url')->textInput(['maxlength'=>true])->hint('格式index/index&id=2&type=1');
            ?>
           <?= $form->field($model,'dsiplat'->redioList($model->getDisplays())) ?>
           <?= $form->field($model,'sort')->textInput(['maxlength'=>true])->hint('值越小越排在前面')?>


       <?php ActiveForm::end(); ?>

   </div>


</div>