<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = "登录11"
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="<?= Yii::$app->request->BaseUrl ?>/css/login.css">
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">  
    <title><?= Html::encode($this->title) ?></title>
    
</head>
<body>
<?php $this->beginBody() ?>

<div class="login">
<div class="login-box">
     
        <div class="row">  
            <div class="form-horizontal col-sm-offset-3 col-md-offset-3">  
                <h3 class="form-title" style="color:#fff">Login to your account</h3>  
                <div class="col-sm-9 col-md-9">  
                    <?php $form = ActiveForm::begin(['id'=>'login_form','class'=>'']); ?>
                    <div class="form-group">  
                        <i class="fa fa-user fa-lg"></i>  
                        <?= $form->field($model,'username')->TextInput(['autofocus'=>true,'placeholder'=>'username']); ?>  
                    </div>  
                    <div class="form-group">  
                        <i class="fa fa-lock fa-lg"></i>  
                        <?= $form->field($model,'password')->PasswordInput(['placeholder'=>'password']) ?>  
                    </div>  
                    <div class="form-group">  
                        <?= Html::SubmitButton('login',['class'=>'btn btn-primary btn-block']) ?>   
                    </div> 
                    <?php ActiveForm::end(); ?> 
                </div>  
            </div>  
        </div>
    
</div>
</div>          
</body>
<?php $this->endBody(); ?>
</html>
<?php $this->endPage(); ?>
