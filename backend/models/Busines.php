<?php
namespace backend\models;
use yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\web\IdentityInterface;	
use yii\web\UploadedFile;

class Busines extends ActiveRecord implements IdentityInterface {
	//public $createdAtAttributre = "createtime";
	//public $password;
	const STATUS_DEFAULT = 0;
	const STSTUS_ZHENG = 1;
	const STATUS_LOCKING = 2;
	public $repass;
	public static $statustext = [
	    self::STATUS_DEFAULT => '等待审核',
	    self::STSTUS_ZHENG => "正常",
	    self::STATUS_LOCKING => "锁定",
	];
	public static function tableName(){
		return "{{%business}}";
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
	
	public function rules(){
		return [ 
		   [["nickname","realname","phone","password","sort"],"required",],
		   ['nickname','string','length'=>[6,12],'tooShort'=>"{attribute}少于六个字符",'tooLong'=>'{attribute}多于12个字符串'],
		   [['account'],'file', 'extensions' => ['png', 'jpg', 'gif','jpeg']],
		   [['phone'],'match','pattern'=>"/^[1][358][0-9]{9}$/",'message'=>"手机号格式不正确"],
		   [['phone'],'unique','message'=>"手机号已注册"],
		   ['password','string','length'=>[6,12]],
		   //['password','compare','compareAttribute'=>'repass',"message"=>"两次密码输入不一致"],
		   ['sort','integer'],
		   [['number','invitecode','passwd'],'string'],
		   ['status','default','value'=>self::STATUS_DEFAULT],
		   ['status','in','range'=>[self::STATUS_DEFAULT,self::STSTUS_ZHENG,self::STATUS_LOCKING]],
		   [['nickname','realname','phone','password','sort','account'],'safe'],
		];
	}
	public function attributeLabels(){
		return [
		   'nickname'=>"用户名",
		   'realname'=>"真实姓名",
		   'phone'=>"手机号",
		   'password'=>"密码",
		   'repass'>"重复密码",
		   'sort'=>"排序",
		   'status'=>"状态",
		   'invitecode'=>"邀请码",
		];
	}
	public function getData($params){
		$query = self::find();
		//return $aa[0];
		//$query = self::array_to_object($aa);
		$data = new ActiveDataProvider([
			'query'=>$query,
		]);
		if(!$this->load($params)){
			return $data;
		}
		$query->andFilterWhere([
			'status'=>$this->status,
		]);
		$query->andFilterWhere(['like','nickname',$this->nickname]);
		$query->  orderBy("sort desc");
		$arr = $query->asArray()->all();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $arr,
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);
		return $data;
	}
	public static function array_to_object($arr) {
        /*if (gettype($arr) != 'array') {
           return;
        }
        foreach ($arr as $k => $v) {
           if (gettype($v) == 'array' || getType($v) == 'object') {
           $arr[$k] = (object)array_to_object($v);
           }
        }
 
        return (object)$arr;*/
        if(is_array($arr)){
            return (object) array_map("self::array_to_object", $arr);
        }else{
            return $arr;
        }
    }
	public function getstatsuText(){
		return self::$statustext;
	}
	/**
     * 获取账号信息
     * @param  [int] $id [后台用户id]
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * 获取账号信息
     * @param  [string] $username [用户名]
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * 获取账号主键值(id)
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * 获取账号auth_key值
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * 验证auth_key
     * @param  [string] $authKey [auth key]
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * 验证用户密码
     * @param  [string] $password [用户密码]
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * 生成加密后的密码
     * @param [string] $password [用户密码]
     */
    public function setPassword($password) {
        return Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * 生成auth_key
     * @return [type] [description]
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function beforeSave($insert){
    	if($this->isNewRecord){
    		$this->number = self::getNumber();
    		$this->invitecode = $this->getCode(6);  
    	}
    	$this->passwd = $this->setPassword($this->password);
    	return parent::beforeSave($insert);
    }
    /**
     * 生成用户编号
     * @return [type] [description]
     */
    public static function getNumber(){
    	$str = "Desperado".mt_rand(000000,999999);
    	return $str;
    }
    public function getCode($length){
    	$code = "0123456789"."abcdefghijklmnopqrstuvwxyz".'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$str = "";
    	while(strlen($str)<$length){
    		$str .=substr($code,(rand() % strlen($code)),1);
    	}
    	return $str;
    }
    public static function getStatus($type = null){
    	//return $id;
    	$status = [    	    
    	    self::STATUS_DEFAULT=>"未审核",
    	    self::STSTUS_ZHENG=>"正常",
    	    self::STATUS_LOCKING=>"锁定",

        ];
    	if($type!==null){
    		return $status[$type];
    	}else{
    		return $status;
    	}
    	
    }

}




?>