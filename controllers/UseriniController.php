<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/12
 * Time: 15:50
 */

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\User;
use yii\helpers\Url;

class UseriniController extends BaseController
{
    public function actionIndex()
    {
        return $this->render("index",array("userInfo"=>$this->userInfo));
    }


    /*
     * 修改个人信息
     */
    public function actionAjaxedituserinfo()
    {
        $type = $_POST['type'];
        $value = $_POST['value'];
        $user = new User();
        if($type == 1){
            $data = array("nickname"=>$value);
        }else{
            $data = array("sign"=>$value);
        }
        try{
            $res = $user->editUserInfo($this->userInfo['id'],$data);
            if($res){
                $this->updateUserInfo($this->userInfo['id']);
                echo json_encode(array("msg"=>"修改成功","code"=>10000));
                exit;
            }else{
                echo json_encode(array("msg"=>"修改失败","code"=>10001));
                exit;
            }
        }catch(\Exception $e){
            echo json_encode(array("msg"=>"修改失败","code"=>10002,"reason"=>$e));
            exit;
        }


    }
}