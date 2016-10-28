<?php

namespace app\controllers;

use yii;
use app\models\User;
use yii\helpers\Url;


class SiteController extends BaseController
{

    /*
     * 首页
     */
    public function actionIndex()
    {
        $res = User::find()->all();
        $redis = Yii::$app->redis;
        echo $redis->get('k1');
        return $this->render('index');
    }

    /*
     * 登陆页
     */
    public function actionLogin()
    {
        $user = new User();
        $username = $this->session->get("username");
        if($username){
            $where = array("username"=>$username);
            $res = $user->getOneUserInfo($where);
            if($res){
                $this->redirect(Url::to(['ati/index']));
            }else{
                $this->session->set("username","");
            }
        }
        return $this->render('login');
    }
    /*
     * 登陆AJAX
     */
    public function actionDologin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User();
        if(trim($username) && trim($password)){
            $where = array(
                "username"=>$username,
                "password"=>md5($password),
            );
            $res = $user->getOneUserInfo($where);

            if($res){
                $redis = Yii::$app->redis;
                $redis -> set($res['username'],json_encode($res));
                $this->session->set("username",$res['username']);
                $user->reFreshLoginTime($res['id']);
                echo json_encode(array("msg"=>"登陆成功","code"=>10000));
                exit;
            }else{
                echo json_encode(array("msg"=>"用户名或密码错误","code"=>10001));
                exit;
            }
        }else{
            echo json_encode(array("msg"=>"请输入用户名和密码","code"=>10002));
            exit;
        }
    }

    /*
     * 注册页
     */
    public function actionReg()
    {

        return $this->render('reg');
    }

    /*
     * 注册入库
     */
    public function actionDoreg()
    {
        $username = $_POST['username'];
        $password = md5(trim($_POST['password']));
        $user = new User();
        $where = array("username"=>$username);
        $isset = $user->getOneUserInfo($where);
        if($isset){
            echo json_encode(array("msg"=>"该用户名已经存在","code"=>10000));
            exit;
        }
        $data['username'] = $username;
        $data['password'] = $password;
        $data["createtime"] = time();
        $res = $user->addUserOnce($data);
        if($res){
            echo json_encode(array("msg"=>"注册成功","code"=>10000));
            exit;
        }else{
            echo json_encode(array("msg"=>"注册失败","code"=>10000));
            exit;
        }

    }
    /*
     * 登出
     */
    public function actionLogout()
    {

        $this->session->set("username","");
        $this->redis->set($this->userInfo['username'],"");
        $this->redirect('index');
    }

    /*
     * QQ回调信息
     */
    public function actionQQRedirect()
    {
        echo "success";
    }

    public function actionTest()
    {
        $res = User::find()->all();


        return $this->render('test');
    }
}
