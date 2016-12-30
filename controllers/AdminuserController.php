<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1
 * Time: 16:24
 */

namespace app\controllers;



use Upyun\Upyun;

use Upyun\Config;

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


        return $this->render("fateup");
    }

    /*
     * ajax上传图片
     */
    public function actionAjaxuploadfile()
    {
        $bucket = "lcazj";
        $operator = "cheng125";
        $password = md5("8888888a");
        $config = new Config($bucket,$operator,$password);
        $type = $_REQUEST['type'];
        $up = new Upyun($bucket,$operator,$password);
        var_dump($_FILES['inputfa']);
        if($type){
            $path = "/".$type."/";
        }
        $res = $up->writeFile($path,$_FILES['inputfa']['tmp_name']);
        var_dump($res);

        exit;
    }
}