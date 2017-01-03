<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1
 * Time: 16:24
 */

namespace app\controllers;

use UpYun;



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
        $bucket = "lcazj";
        $operator = "cheng125";
        $password = md5("8888888a");
        $up = new Upyun($bucket,$operator,$password);

        return $this->render("fateup");
    }

    /*
     * ajax上传图片
     */
    public function actionAjaxuploadfile()
    {
        $bucket = "lcazj";
        $operator = "cheng";
        $password = md5("8888888a");
        $type = $_REQUEST['type'];
        $up = new Upyun($bucket,$operator,$password);
        $file = fopen($_FILES['inputfa']['tmp_name'][0],'r');
        if($type){
            $path = "/".$bucket."/".$type."/".$_FILES['inputfa']['name'][0];
        }
        echo $path;
        $res = $up->writeFile($path,$file);
        var_dump($res);
        exit;
    }
}