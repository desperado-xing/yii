<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>"zh-CN",//目标语言
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
        'translations' => [
            '*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages',
                //'sourceLanguage' => 'en-US',
                'fileMap' => [
                    'common'=>'common.php',
                    'backend' => 'backend.php',
                    'frontend' => 'frontend.php',
                ],
              ],
            ],
        ],
    ],
    'modules' => [
        'gridview'=>[
             'class'=>"\kartik\grid\Module",
        ]
    ]
];
