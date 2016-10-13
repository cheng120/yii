<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/12
 * Time: 16:33
 */
use yii\helpers\Url;
$this->title = 'Login';
?>
<div class="container text-center ">

    <div class="col-md-4 col-sm-offset-4">
        <h1 class="btn-info border-radius" style="border-radius: 8px;">个人设置</h1>

        <!--login start-->
        <div class="form-group ">
            <label for="exampleInputEmail1">昵称</label>
            <input type="email" class="form-control" id="username" placeholder="输入用户名">修改
            <span class="help-block alert alert-danger " id="userWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">QQ</label>
            <input type="password" class="form-control" id="password" placeholder="输入密码">
            <span class="help-block  alert alert-danger" id="passwordWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">邮箱</label>
            <input type="password" class="form-control" id="curPassword" placeholder="确认密码">
            <span class="help-block alert alert-danger " id="curPasswordWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
        <!--
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        -->
        <!--<div class="checkbox">
            <label>
                <input type="checkbox" id="rem"> 记住我
            </label>
        </div>-->

        <button type="submit" id="sub" class="btn btn-primary">确认</button>
        <button id="login" class="btn btn-info">登陆</button>
        <!--login end-->
    </div>
</div>
