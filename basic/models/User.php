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
    public function __construct()
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
    public function addUser($data)
    {
        $user = new User();


    }
}