<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\menu;

AppAsset::register($this);

   /*$this->registerJs('
       

   ');*/
   /*$js = <<<Js
       $(".gridview").on("click",function(){
        alert(132);
          var keys = $("#grid").yiiGridView("getSelectedRows");
          console.log(keys);
    })
Js;
$this->registerJs($js);*/

?>
<?php $this->beginPage() ?>
<!DOCTYPE html> 
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php
   $menu = Menu::getMenu();
?>
<?php $this->beginBody() ?>
<input type="hidden" name="" id="baseUrl" value="<?php echo  Url::to("@web"); ?>">
<div class="left-side sticky-left-side">
    <div class="logo">
        <a href="index.html"><img src="<?php echo Url::to('@web/images/logo.png'); ?>" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.html"><img src="<?php echo Url::to('@web/images/logo_icon.png'); ?>" alt=""></a>
    </div>

    <div class="left-side-inner">

        <ul class="nav nav-pills nav-stacked custom-nav">
            <?php
                //var_dump($this->params['menu']);
                foreach ($menu as $key => $value) {
            ?>
            <li class="menu-list">
                <a href="javascript:;">
                    <i class="fa"></i>
                    <span><?=$value['name']?></span>
                </a>
                <ul class="sub-menu-list">
                <?php
                    if(!isset($value['children']))break;
                    foreach ($value['children'] as $k => $v) {
                       $menuArr = explode("/", $v['url']);
                ?>
                
                    <li class='<?= Yii::$app->controller->id == $menuArr[0]?'active':'' ?>' ><a href="<?= Url::to([$v['url']]) ?>"><?=$v['name']?></a></li>
               
                <?php
                }
                ?>
                 </ul>
            </li>
            <?php    
            }
            ?>

        </ul>

    </div>
</div>
<div class="main-content" >

    <div class="header-section">
    
    </div>

    <div class="page-heading">
    </div>

    <div class="wrapper">
        <div class="panel">
            <div class="panel-body">
            <?= $content ?>
            </div>
        </div>
    </div>

</div>

<!--<div class="wrap">
    <div class="admin-left">
        132
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
