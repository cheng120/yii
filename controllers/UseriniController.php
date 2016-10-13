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

        return $this->render("index");
    }
}