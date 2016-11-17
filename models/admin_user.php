<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/4
 * Time: 17:41
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii;
use yii\rest\ActiveController;

class Admin_user extends ActiveRecord
{
    private $query;
    private $command;
    private $table = "admin_user";
    private $redis;
    public function init()
    {
        $this->query = new yii\db\Query();
        $this->command = Yii::$app->db->createCommand();
        $this->redis = Yii::$app->redis;
    }

    /*
     * 验证后台用户
     */
    public function verAdminUser($data)
    {

        $res = $this->query
            ->select('*')
            ->from($this->table)
            ->where($data)
            ->one();
        return $res;
    }

}