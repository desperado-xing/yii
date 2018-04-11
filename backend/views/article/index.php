<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'My Yii 后台登录';
?>
<script>
var ws = new WebSocket("ws://localhost:8089/yii/backend/web/brand/index");
switch(ws.readyState){
  case WebSocket.CONNECTING:
  alert(WebSocket.CONNECTING);
  break;
  case WebSocket.OPEN:
  alert(WebSocket.OPEN);
  break;
}
ws.onopen = function (evt){
  console.log("Connection open....");
  ws.send("Hello World");
}
ws.onmessage= function(evt){
  console.log("Received message:"+evt.data);
  ws.close();
}





</script>
<div class="role-index">
    <?= $this->render("_tab"); ?>

    <?php Pjax::begin(); ?>
       <?=GridView::widget([
           'dataProvider'=>$dataProvider,
           //'options'=>['id'=>'grid'],
           //'filterModel'=>$model,
           //'filterPostion'=>GridView::FILTER_POS_FOOTER,
           'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
           'layout'=>'{items}{summary}{pager}',
           'id'=>'grid',
           'columns'=>[
              [
                 'class'=>'yii\grid\CheckboxColumn',
                 'name'=>"id",
              ],
              //['class' => 'yii\grid\SerialColumn'],
              [
                'label'=>"ID",
                'attribute'=>"id",
              ],
              [
                'label'=>"文章名称",
                'attribute'=>"name",
              ],
              [
                'label'=>"文件标题",
                'attribute'=>"title",
                'format'=>'raw',
                'value'=>function($data){
                    $url = "http://www.baidu.com";
                    return Html::a($data->title,$url,['title'=>$data->title]);
                }

              ],
              [
                'label'=>"时间",
                'attribute'=>'addtime',
                'value'=>function($data){
                    return date("Y-m-d h:i:s",$data->addtime);
                }
              ],
              [
                'class'=>'common\grid\ActionColumn',
                'header'=>Yii::t("backend","Operate"),
                'template'=>'{view} {update} {delete}',
                /*'buttons'=>[
                    'view'=>function($url,$model,$key){
                    //$url = ['site/update','id'=>$key];
                    //$url = "http://www.baidu.com";
                    $option = [
                      'title'=>"更新",
                      'aria-label' => '更新',
                      'data-ajax'=>'0',
                      'class' => 'btn btn-info btn-xs',
                    ];
                    return Html::a('<span class="fa fa-eye"></span>'.Yii::t("backend",'View'),$url,$option);
                },
                ] */
              ]

           ]

        ])?>
        <?= Html::a('批量删除',"javascript:;",['class'=>'btn btn-success gridview']) ?>
        <?= Html::a('测试',"javascript:;",['class'=>'btn btn-success test']) ?>

        <?php
$js = <<<Js
    $(".gridview").on("click",function(){
        var index = layer.load(1, {
            shade: [0.3,'#000'] //0.1透明度的白色背景
        });
        var grid = $("#grid").yiiGridView("getSelectedRows");
        if(grid !='' && grid != null){
          var url = $("#baseUrl").val()+"/site/deleteall";
               $.get(url,{grid:grid},function(msg){
                var json = eval("("+msg+")");
                   if(json['message']){
                    layer.close(index);
                    layer.msg("删除成功",function(){
                        location.reload();
                    });
                   }else{
                    layer.close(index);
                    layer.msg("删除失败");
                   }
               })
            }else{
            layer.msg(4565);
        }
        
       
    })
Js;
$this->registerJs($js);
        ?>
    <?php Pjax::end(); ?>
</div>
<!-- Piwik -->
<script type="text/javascript">
  /*$(".test").click(function(){
    var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" 
  _paq.push(['trackPageView']);
  _paq.push(['trackGoal', 1]);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//172.19.193.102:8089/TC_Analytics/";
    _paq.push(['setTrackerUrl', u+'tc.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
  })*/
  
</script>
<!-- End Piwik Code -->