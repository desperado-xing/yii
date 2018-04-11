<?php
use yii\grid\gridview;
use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\models\Brand;

$this->title = "品牌列表";
?>
<div class="admin-index">
    
    <?php Pjax::begin(); ?>
    <?= $this->render("_tab"); ?>
    <?= GridView::widget([
    	'dataProvider'=>$dataProvider,
    	'layout'=>"{items}{summary}{pager}",
    	'columns'=>[
    	   'id',
    	   [
              'label'=>"所属分类",
              'value'=>function($data){
              	return Brand::getCategory($data['category_id']);
              }
    	   ],
    	   'name',
    	   'sort',
    	   [
    	      'label'=>"添加时间", 
    	      'value'=>function($data){
    	     	return date("Y-m-d H:i:s",$data['createtime']);
    	     }

    	   ],

    	]


    ]) ?>
    <?php Pjax::end(); ?>

</div>