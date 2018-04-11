<?php
namespace backend\controllers;
use yii;
use backend\models\Busines;
use yii\web\UploadedFile;

class BusinessController extends Basecontroller{

	public function actionIndex(){
		//$this->getController();
		$bus = new Busines();
		if(Yii::$app->request->isPost){
			$sort = Yii::$app->request->post('sort');
			foreach ($sort as $key => $value) {
				$model = Busines::findOne($key);
				$model->sort = $value;
				$model->save();
			}
			//var_dump($sort);exit;
		}
		
		$dataProvider = $bus->getData(Yii::$app->request->get());
		var_dump($dataProvider);exit;
		$dataProvider->setSort(false); //禁止表头排序
		return $this->render("index",['searchProvider'=>$bus,'dataProvider'=>$dataProvider]);

	}
	public function actionCreate(){

		$model = new Busines();
		//var_dump(Yii::$app->request->post());
		if($model->load(Yii::$app->request->post)){
			$model->account = UploadedFile::getInstance($model,'account');
			//var_dump(Yii::$app->db->getLastInsertID());exit;   获取新增数据ID  
			$model->account->saveAs('../uploads/' . $model->account->baseName . '.' . $model->account->extension);   
			//var_dump(UploadedFile::getInstance($model, 'account'));exit;
			$model->save();
			$this->redirect(['index']);
		}else{
			return $this->render("create",['model'=>$model]);
		} 
		
	}
	/**
	 * 删除
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function actionDelete($id){
		if(Busines::findOne($id)->delete()){
			$this->redirect(['index']);
		}
	}
	/**
	 * 修改
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function actionUpdate($id){
		$busines = new Busines();
		$model = $busines::findOne($id);
		if($model->load(Yii::$app->request->post()) && $model->save()){
			$this->redirect(['index']);
		}else{
			return $this->render("update",['model'=>$model]); 
		}
		
	}
}


?>