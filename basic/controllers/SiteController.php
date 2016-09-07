<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\User;


class SiteController extends Controller
{
    private $query;
    public function __construct()
    {
        $this->query = new yii\db\Query();

    }


    /*
     * 首页
     */
    public function actionIndex()
    {
        $res = User::find()->all();

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

    }

    public function actionTest()
    {
        $res = User::find()->all();
        $redis = Yii::$app->redis;

        return $this->render('test');
    }
}
