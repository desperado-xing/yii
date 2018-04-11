<?php
/**
 * @see https://github.com/craftsmann.
 */
namespace backend\models;
use Yii;
use common\models\AdminUser;
use yii\db\ActiveRecord;

class LoginForm extends ActiveRecord{

    public $user;
    protected $_user;
    public $pass;
    public $verify;
    public $remember =true;

    public function rules()
    {
        return [
            [['user','pass'],'required'],
            ['user','string','length'=>[5,20]],
            ['pass','string','min'=>5],
            //添加自定义验证密码的函数verifyPass
            ['pass','verifyPass'],
            ['verify','captcha']
        ];

    }
    public function verifyPass($attr){

        if(!$this->hasErrors()){
        //其实就是获取user对象集合
            $person = $this->getUser();

        //获取用户失败或者验证密码失败；validatePassword是需要我们在AdminUser中去实现的；

            if(!$person || !$person->validatePassword($this->pass)){

                $this->addError($attr,'用户或密码错误');

            }
        }
    }

    //这个方法很关键，我们通过user去接收的字符串可能是用户名或者邮箱，我们分情况作出返回
    protected function getUser(){
        if(!$this->_user){

            //判断是user字段，是否为邮箱格式；
            if(preg_match('/^[a-zA-Z0-9-_]+(\.\w+)*@[a-zA-Z0-9-_]+\.(\w+)$/',$this->user)){

        //这个findByEmail是我们要去AdminUser这个数据库model中去实现的；其实原理就是根据email查找数据，有了就能获取对象
               return AdminUser::findByEmail($this->user);

            //判断是否为用户名，
            }else if(preg_match('/^\w+$/',$this->user)){
                //这个findByUsername是我们要去AdminUser这个数据库model中去实现的，上面理解一样
                return AdminUser::findByUsername($this->user);
            }else{
                throw new Exception('登录失败');
            }
        }else{
            return $this->_user;
        }
    }

    public function login(){
        //这个登录方法是yii框架封装的注意；Yii::$app->user->login(用户对象，时间)；其实就是保存到session中，以便登录的用户可取得数据
        return !$this->validate()?false:Yii::$app->user->login($this->getUser(),$this->remember?60*60*1:0);
    }

    public function attributeLabels()
    {
        return [
            'user'=>'用户名/邮箱',
            'pass'=>'密码',
            'verify'=>'验证码'
        ];
    }

}