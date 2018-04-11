<?php
namespace backend\models;
use yii;
use yii\db\ActiveRecord;
use yii\helpers\html;
use yii\data\ActiveDataProvider;
class News extends ActiveRecord{
	/*public $_news;
	public $type;
	public function _construct($data){
		if($data !=null){
			$this->_news = $data;
			$this->type = true;
		}

	}*/
	public static function tableName(){
		return "{{%news}}";
	}
	public function rules(){
		return [
		   ['name','required'],
		   //['title','required'],
		   ['content','filter','filter'=>function($value){
		   	   return Html::encode($value); 
		   }],
		   [['name','content'],'safe'],

		];
	}
	public function data($id){
		//$data = self::find()->all();//数组返回数据
		//$data = self::findOne($id,$title);  //根据字段查询数据
		$query = self::find();
		$data = new ActiveDataProvider([
			'query'=>$query,
			]);
		//$query->andFilterWhere(['like','title','测试']);
		//$query->andFilterWhere(['title'=>"测试"])->asArray();
		$query->all();
		return $data;
	}
	/*public function save(){
		if($this->type){
			//$this

		}
	}*/

}









?>