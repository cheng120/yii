<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/21
 * Time: 14:21
 */

namespace app\models;

use yii;
use yii\db\ActiveRecord;

class Ati  extends ActiveRecord
{
    private $query;
    private $command;
    private $table = "ati";
    private $redis;
    public function init()
    {
        $this->query = new yii\db\Query();
        $this->command = Yii::$app->db->createCommand();
        $this->redis = Yii::$app->redis;
    }

    /*
     * 添加文章
     */
    public function addAti($userid,$content,$source)
    {-
        $this->userid = $userid;
        $this->content = $content;
        $this->source = $source;
        $this->createtime = time();
        $res = $this->save();

        if($res){
            return $this->attributes['id'];
        }else{
            return $res;
        }
    }

    /*
     * 获取文章数
     */
    public function getAtiCount($where = array())
    {
        $count = $this->query
            ->select("id")
            ->from($this->table)
            ->where($where)
            ->count();
        return $count;
    }

    /*
     * 获取文章列表
     */
    public function getAtiList($where = array(),$page=1,$limit=10)
    {
        $start = ($page-1)*10;
        $end = $page*$limit;
        $list = $this->query
                ->select("*")
                ->from($this->table)
                ->where($where)
                ->orderBy("createtime desc")
                ->all();
        return $list;
    }
}