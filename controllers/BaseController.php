<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/12
 * Time: 15:52
 */

namespace app\controllers;
use yii;
use yii\web\Controller;
use app\models\User;
use yii\helpers\Url;

class BaseController extends Controller
{
    protected $session;
    protected $userInfo;
    protected $redis;
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->session = Yii::$app->session;
        Yii::$app->session->open();
        $this->redis = Yii::$app->redis;
        $user = new User();
        $username = Yii::$app->session->get("username");
        if($username){
            $info = $this->redis->get($username);
            if($info){
                $this->userInfo = $info;
            }else{
                $where = array("username"=>$username);
                $this->userInfo = $user->getOneUserInfo($where);
            }
        }else{
            $this->userInfo=array();
        }


    }

    protected function curlFun($url,$type,$data=array())
    {
        $ch = curl_init();
        if($type == "get"){
            curl_setopt($ch, CURLOPT_URL, $url);
        }else{
            // post数据
            curl_setopt($ch, CURLOPT_POST, 1);
            // post的变量
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        //设置选项，包括URL

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        //打印获得的数据
        return $output;
    }
}