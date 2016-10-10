<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/2
 * Time: 14:51
 */
use yii\helpers\Url;

$this->title = 'Login';
?>
<div class="container text-center ">

    <div class="col-md-4 col-sm-offset-4">
        <h1 class="btn-info border-radius" style="border-radius: 8px;">注册</h1>

        <!--login start-->
        <div class="form-group ">
            <label for="exampleInputEmail1">用户名</label>
            <input type="email" class="form-control" id="username" placeholder="输入用户名">
            <span class="help-block alert alert-danger " id="userWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" id="password" placeholder="输入密码">
            <span class="help-block  alert alert-danger" id="passwordWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">确认密码</label>
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
<script>
    var flag = false;
    $(function () {
        $('#username').on('blur', function () {
            username();
        })

        $('#password').on('input', function () {
            password();
        })


        $('#curPassword').on('input', function () {
            curPassword()
        })
        $('#sub').on('click', function () {
            doReg();
        })

        function curPassword() {
            var password = $('#password').val();
            var curPassword = $('#curPassword').val();
            if (password != curPassword) {
                $('#curPasswordWarn').html("确认密码");
                $('#curPasswordWarn').css('display', 'block');
                flag = false;
            } else {
                $('#curPasswordWarn').css('display', 'none');
                flag = true;
            }
        }

        function password() {
            var password = $('#password').val();
            if (password.length < 6) {
                $('#passwordWarn').html("密码不能少于6位");
                $('#passwordWarn').css('display', 'block');
                flag = false;
            } else if (password == '') {
                $('#passwordWarn').html("密码不能为空");
                $('#passwordWarn').css('display', 'block');
                flag = false;
            } else {
                $('#passwordWarn').css('display', 'none');
                flag = true;
            }
        }

        function username() {
            var username = $('#username').val();
            if (username.length > 50) {
                $('#userWarn').html("用户名长度不能超过50");
                $('#userWarn').css('display', 'block');
                flag = false;
            } else if (username == '') {
                $('#userWarn').html("用户名不能为空");
                $('#userWarn').css('display', 'block');
                flag = false;
            } else {
                $('#userWarn').css('display', 'none');
                flag = true;
            }
        }

        $(function(){
            $("#login").on('click',function(){
                location.href = '<?php echo Url::to(['site/login']); ?>';
            })

        })
        function doReg() {
            username();
            password();
            curPassword();
            if (flag) {
                var data = {"username": $('#username').val(), "password": $('#password').val()};
                var url = '<?php echo Url::to(['site/doreg']); ?>';
                $.post(url, data, function (d) {
                    console.log(d);
                    alert(d);
                });
            } else {
                return false;
            }
        }

    })
</script>