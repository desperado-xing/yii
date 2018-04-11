<?php
namespace common\components;
class Request extends \yii\web\Request {
    public $web;
    public $adminUrl;
    public function getBaseUrl(){
        //var_dump($this->adminUrl);exit; 
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
    } 
/* 如果你没有这个功能，管理网站将404，如果你离开了尾随的削减。例如：不工作：site.com/admin会工作：site.com/admin/使用此功能，将工作。 */
    public function resolvePathInfo(){
        //var_dump($this->getUrl());exit;
        if($this->getUrl() === $this->adminUrl){
            return "";   
        }else{
            return parent::resolvePathInfo();  
        }
     }
}





?>