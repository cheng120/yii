<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\User;


class SiteController extends Controller
{


    /*
     * 首页
     */
    public function actionIndex()
    {
        $res = User::find()->all();
        $redis = Yii::$app->redis;
        $redis->setget('k1','v1');
        echo $redis->get('k1');
        return $this->render('index');
    }

    /*
     * 登陆页
     */
    public function actionLogin()
    {

        return $this->render('login');
    }
    /*
     * 登陆AJAX
     */
    public function actionDoLogin()
    {


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
    public function actionDoReg()
    {

        $username = $_POST['username'];
        $password = md5(trim($_POST['password']));
        $user = new User();
        $data['username'] = $username;
        $data['password'] = $password;

    }

    public function actionTest()
    {
        $res = User::find()->all();


        return $this->render('test');
    }
}
