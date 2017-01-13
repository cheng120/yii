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

class Fate_servant extends ActiveRecord
{
    private $query;
    private $command;
    private $table = "fate_servant";
    private $redis;
    public function init()
    {
        $this->query = new yii\db\Query();
        $this->command = Yii::$app->db->createCommand();
        $this->redis = Yii::$app->redis;
    }

    /*
     * 获取从者列表
     * @哈希格式
     */
    public function getAllservant($where = array())
    {
        if(empty($where)){
            $where = "1=1";
        }
        $res = $this->query
            ->select('*')
            ->from($this->table)
            ->where($where)
            ->all();
        return $res;
    }

    /*
    * 获取从者列表
    * @哈希格式
    */
    public function getAllservantIds($where = array())
    {
        if(empty($where)){
            $where = "1=1";
        }
        $res = $this->query
            ->select('id')
            ->from($this->table)
            ->where($where)
            ->all();
        return $res;
    }

    /*
    * 获取单一从者信息
    * @哈希格式
    */
    public function getOneservant($where = array())
    {
        if(empty($where)){
            return false;
        }
        $res = $this->query
            ->select('*')
            ->from($this->table)
            ->where($where)
            ->one();
        return $res;
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

    /*
     * 登陆刷新登录时间
     */
    public function reFreshLoginTime($userid)
    {
        $res = $this->command->update($this->table,array("lastlogintime"=>time()),"id=".$userid)->execute();
        if($res){
            return $this->attributes['id'];
        }
        return $res;

    }

    /*
     * 修改用户信息
     */
    public function editUserInfo($userid,$data)
    {

        $user = User::findOne($userid);
        foreach($data as $key => $value){
            $user->$key = $value;
        }
        $res = $user->update();
        return $res;
    }

}
