<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
        <?php
           //echo Yii::$app->controller->id;
        ?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            <!--<form action="/signup" method="post">
                username:<input type="text" name="SignupForm[username]" />
                email:<input type="text" name="SignupForm[email]"/>
                password:<input type="password" name="SignupForm[passowrd]">
                <input type="submit" class="btn btn-primary" name="" value="Signup">
            </form>-->
        </div>
    </div>
</div>
