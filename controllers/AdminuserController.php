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
    public function actionLogin()
    {
        return $this->render("login");
    }

    public function actionIndex()
    {

        return $this->render("index");
    }
}