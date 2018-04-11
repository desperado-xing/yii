<?php
namespace backend\models;
use yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;


class Brand extends ActiveRecord{
	public static function tableName(){
		return "{{%brand}}";
	}
	public function rules(){
		return [
		   [['name','category_id','sort'],'required'],
		   ['sort','integer'],
		];
	}
	public function behaviors() {
        return [
            [
            'class'=>TimestampBehavior::className(),
            'createdAtAttribute' => "createtime",
            'updatedAtAttribute' => false,
            'value'=>time(),
            ]
        ];
    }
	public function attributeLabels(){
		return [
		   'name'=>"品牌名称",
		   'category_id'=>"所属分类",
		   'sort'=>"排序",

		];
	}
	public static function getData(){
		$model=self::find();
		$query = new ActiveDataProvider([
			'query'=>$model,
		]);
		return $query;
	}
	/**
	 *       
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getCategory($id){
		return self::category($id);
	}
	public static function category($i){
		$arr = [
		1=>'食品',
		2=>'水果',
		];
		return $arr[$i];
	}
}

?>