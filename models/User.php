<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/31
 * Time: 11:44
 */

namespace app\models;
use yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    private $query;
    private $table = "user";
    public function init()
    {
        $this->query = new yii\db\Query();
    }

    /*
     * 获取单一用户
     * @哈希格式
     */
    public function getOneUserInfo($where)
    {
        $res = $this->query
            ->select('*')
            ->from($this->table)
            ->where($where)
            ->limit(1)
            ->one();
    }

    /*
     * 插入新用户
     */
     public function addUserOnce($data)
    {
        foreach($data as $key => $value){
            $this->$key = $value;
        }
        $res = $this->save();
        if($res){
            return $this->attributes['id'];
        }
        return $res;
    }
}