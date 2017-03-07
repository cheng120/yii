<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/7
 * Time: 17:39
 */

namespace app\controllers;


class Helpers
{
    public static function curl()
    {
        $curl = new curl\Curl();
    }
}