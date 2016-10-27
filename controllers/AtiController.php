<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/11
 * Time: 14:12
 */

namespace app\controllers;
use app\models\Ati;
use yii;
use yii\helpers\Url;
use app\models\User;
use yii\data\Pagination;


class AtiController extends BaseController
{


    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if(!$this->userInfo){
            $this->redirect(Url::to(['site/index']));
        }
    }

    /*
     * 展示文章
     */
    public function actionIndex()
    {

        $query = Ati::find()->where(['isdel' => '0']);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'   => 4,]);
        $models = $query->offset($pages->offset)
            ->orderBy("createtime desc")
            ->limit($pages->limit)
            ->all();
        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionAddati()
    {
        $content = $_POST['content'];
        $source = $_POST['sourcer'];
        $ati = new Ati();
        $res = $ati->addAti($this->userInfo['id'],$content,$source);
        if($res){
            $list = $ati->getAtiList();
            return json_encode(array("msg"=>"成功","code"=>"10000","data"=>$list));
        }else{
            return json_encode(array("msg"=>"失败","code"=>"10001"));
        }
    }

}