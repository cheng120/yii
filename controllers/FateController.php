<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/31
 * Time: 15:43
 */

namespace app\controllers;




use app\models\Fate_mysticcode;
use app\models\Fate_servant;

class FateController extends BaseController
{
    public function actionIndex()
    {

        return $this->render('index');
    }

    /*
     * 抽奖测欧
     */
    public function actionEuropean()
    {

        $upArr = array(
            'servant'=>array('5'=>array(1,2),4=>array(3,3),3=>array(4,4)),
            'code' => array('5'=>array(1,2),4=>array(3,3),3=>array(4,4)),
        );
        $res = $this->getAwardOne($upArr);
        //奖池
        $servant = $res;

       return $this->render('card');
    }

    /*
     * 抽奖算法
     */
    private function getAwardOne($upArr = array())
    {

        $chance = array(
            "ssr"=> "0,1    ",
            "sr"=> "6,8",
            "r" => "20,60",
            "wcssr"=>"2,5",
            "wcsr"=>"9,20",
            "wcr"=>"61,100",
        );
        $random = rand(1,100);
        foreach($chance as $key=>$value){
            $v = explode(',',$value);
            if($random >= $v[0] && $random<=$v[1]){
                $gift = $key;
                break;
            }
        }
        $res = $this->getCard($upArr,$gift);
        return $res;

    }

    /*
     * 从池子取出卡牌
     */
    private function getCard($upArr,$type)
    {

        $fate_servant = new Fate_servant();
        $fate_mysticcode = new Fate_mysticcode();
        $where = array();
        switch ($type) {
            case 'wcssr':
                $where['star'] = 5;
                $flag = "code";
                break;
            case 'wcsr':
                $where['star'] = 4;
                $flag = 'code';
                break;
            case 'wcr':
                $where['star'] = 3;
                $flag = 'code';
                break;
            case 'ssr':
                $where['star'] = 5;
                $flag = "servant";
                break;
            case 'sr':
                $where['star'] = 4;
                $flag = 'servant';
                break;
            case 'r':
                $where['star'] = 3;
                $flag = 'servant';
                break;
        }

        if($flag == "servant"){
            $cardList = $fate_servant->getAllservantIds($where);
        }else{
            $cardList = $fate_mysticcode->getAllmysticcodeIds($where);
        }
        foreach($cardList as $ck=> $cv){
            $ids[] = (int)$cv['id'];
        }
        if(isset($upArr[$flag][$where['star']])){
            foreach($upArr[$flag][$where['star']] as $up => $uv){
                array_push($ids,$uv);
            }
        }
        $endCard['type'] = $flag;
        $endCard['id'] = array_rand($ids,1);
        if($flag == 'code'){
            $endCard['info'] = $fate_mysticcode->getAllmysticcodeInfo(array('id'=>$endCard['id']));
        }else{
            $endCard['info'] = $fate_servant->getOneservant(array('id'=>$endCard['id']));
        }
        return $endCard;

    }

}