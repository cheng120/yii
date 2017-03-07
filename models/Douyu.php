<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/7
 * Time: 15:42
 */

namespace app\models;


class Douyu extends ActiveRecord
{
    //斗鱼接口前置URL
    private $douyuApiUrl = "http://open.douyucdn.cn/api/";
    //斗鱼分类直播列表
    private $classApi = "RoomApi/live/";
    //斗鱼房间详情
    private $roomApi = "RoomApi/room/";

    private $query;
    private $command;
    private $table = "douyu";
    private $redis;
    public function init()
    {
        $this->query = new yii\db\Query();
        $this->command = Yii::$app->db->createCommand();
        $this->redis = Yii::$app->redis;
    }
    public function getRoomInfo($roomid)
    {
        $apiUrl = $this->douyuApiUrl.$this->roomApi;

    }



}