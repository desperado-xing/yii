<?php
//use yii;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "菜单管理";
?>
<div class="menu-index">
<?= $this->render("_tab"); ?>
<div>

<table class="table table-striped table-bordered" id="menus-table">
    <thead>
        <tr>
           <th>排序</th>
           <th>ID</th>
           <th>菜单名称</th>
           <th>URL地址</th>
           <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <a data-test="test" href="javascript:;">test</a>
        <?= $dataProvider; ?>

        <?php
        /*$js = <<<JS
            $(document).on('click',".expander",function(){
               var obj=	$(this).parents("tr");
               var dian= $(this).parents("tr").attr('id');
               if($(this).parents("tr").hasClass("open")){
               	  $(".child-"+dian).slideUp('2000',function(){
               	  	 obj.removeClass('open');

               	  })
               }else{
               	  $(".child-"+dian).slideDown('2000',function(){
               	  	 obj.addClass('open');
               	  	 $(".child-"+dian).addClass("closed");  
               	  })
               }
           });
JS;*/
      //$js = <<<JS

     
//JS;      
$treeTable = <<<treeTable
    $("#menus-table").treeTable({
                indent : 20
    });
     


treeTable;
//$this->registerJs($js);
$this->registerJs($treeTable);
//$this->registerJs($JS);
        ?>
    </tbody> 

</table>
</div>

<div>
   

</div>

</div>
