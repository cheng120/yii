<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/31
 * Time: 15:43
 */

namespace app\controllers;


class FateController extends BaseController
{
    public function actionIndex()
    {

        return $this->render('index');
    }
}