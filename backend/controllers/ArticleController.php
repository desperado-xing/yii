<?php

namespace backend\controllers;

use Yii;
//use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Menu;
use backend\models\News;
//use common\excel\PHPExcel;


/**
 * Site controller
 */
class ArticleController extends BaseController
{
    //public $layout = "header.php";
    /**
     * 
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$this->menu();//获取公共控制器中的菜单左侧栏；
        $news = new News();
        $data = $news->data('1');
        $database = Yii::$app->db->createCommand('SHOW TABLE STATUS')->queryAll();
        //dump($database);exit;
        //var_dump($data);exit;
        //phpinfo();
        //$arr = Yii::$app->redis->set("var","assss");
        //var_dump($arr);
        //var_dump(json_encode($tree));

        return $this->render('index',[
            'model'=>$news,
            'dataProvider'=>$data
        ]);
    }
    /**
     * news新增
     */
    public function actionCreate(){
        $model = new News();
        if($model->load(Yii::$app->request->post())){
            //$aa = Yii::$app->request->post("News");
            //$model->name = $aa['name'];
            //$model->content = $aa['content'];
            
            if($model->save()){
                $this->redirect(['index']);
            }else{
                echo 123;exit;
            }
        }
        return $this->render("create",['model'=>$model]);
    }

    /**
     * news修改
     */
    public function actionUpdate($id){
        $news = new News();
        $model = $news::findOne($id);
        if($news->load(Yii::$app->request->post())){
            //$data = News::findOne($id);
            $model->name = $news->name;
            $model->content = $news->content;
            if($model->save()){
                $this->redirect(['index']);
            }else{
                var_dump($news->getErrors());exit;   
            }
            //$news->save();
            //var_dump(Yii::$app->request->post());exit;
            
        }
        //var_dump($model);
        return $this->render("update",
            ['model'=>$model]
        );

    }
    /**
     * news删除
     */
    public function actionDelete($id){
        //$model = new News();
        if(News::deleteall("id=".$id)){
            $this->redirect(['index']);
        }
        
    }
    /**
     * 批量删除
     */
    public function actionDeleteall(){
        if(Yii::$app->request->get()){
            $data = implode(",",Yii::$app->request->get('grid')); 
            $json['message'] = News::deleteAll("id in(".$data.")");
            //return \yii\helpers\Json::encode($json);
            return \yii\helpers\Json::encode($json);

        }

    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionExport(){
        

        echo $aa;
        //var_dump("123.150.131.234");
       // $excel = new \PHPExcel_Writer_Excel2007();
        //dump($excel);
        //dump(Yii::getAlias("@common"));
    }
    /**
     * Excel导出
     * @param  [type] $data     数据源
     * @param  [type] $header   表头
     * @param  string $title    [description]
     * @param  string $filename excel文件名称
     * @return [type]           [description]
     */
    public static function exportData ($data, $header, $title = "simple", $filename = "data")
    {
    //require relation class files
       require(Yii::getAlias("@common")."/components/phpexcel/PHPExcel.php");
       require(Yii::getAlias("@common")."/components/phpexcel/PHPExcel/Writer/Excel2007.php");
       if (!is_array ($data) || !is_array ($header)) return false;
            $objPHPExcel = new \PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
            $objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
            $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
            // Add some data
            $objPHPExcel->setActiveSheetIndex(0);
            //添加头部
            $hk = 0;
        foreach ($header as $k => $v)
        {
            $colum = \PHPExcel_Cell::stringFromColumnIndex($hk);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum."1", $v);
            $hk += 1;
        }
            $column = 2;
            $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows)  //行写入
        {
            $span = 0;
        foreach($rows as $keyName => $value) // 列写入
        {
            $j = \PHPExcel_Cell::stringFromColumnIndex($span);
            $objActSheet->setCellValue($j.$column, $value);
            $span++;
        }
            $column++;
        }
    // Rename sheet
        $objPHPExcel->getActiveSheet()->setTitle($title);
    // Save Excel 2007 file
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        header("Pragma:public");
        header("Content-Type:application/x-msexecl;name=\"{$filename}.xls\"");
        header("Content-Disposition:inline;filename=\"{$filename}.xls\"");
        $objWriter->save("php://output");
    }
}
