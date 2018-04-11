<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLTE extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        //'css/admin.css',
        'js/treeTable/treeTable.css',
        //'css/jquery.treetable.theme.default.css',
    ];
    public $js = [
        //'js/jquery-3.2.1.min.js',
        'js/message/language.js',
        'js/adminjs.js',
        'js/layer/layer.js',
        'js/treeTable/treeTable.js',

        //'js/treeTable/jquery.treetable.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\lock-form\LockBsFormAsset',
    ];
    ///'depends' => [
    //other depends
    
}
