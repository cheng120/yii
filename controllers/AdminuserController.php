<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1
 * Time: 16:24
 */

namespace app\controllers;


class AdminuserController extends BackController
{

    /*
     * 后台登陆
     */

    public function actionIndex()
    {

        return $this->render("index");
    }

    /*
     * 所有账号
     */
    public function actionUserlist()
    {

        return $this->render("userlist");
    }

    /*
     * 上传图片
     */
    public function actionFateup()
    {
        $url = "v2.api.upyun.com";
        $bucket = "lcazj";
        $operator = "cheng125";
        $password = md5("8888888a");
        $expiration = 1478674618;
        return $this->render("fateup");
    }
}