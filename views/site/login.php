<?php
    use yii\helpers\Url;
    $this->title = 'Login';
?>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="1105786610" data-redirecturi="http://yii.lcazj.com/site/QQRedirect" charset="utf-8"></script>
<div class="container text-center " >

    <div class="col-md-4 col-sm-offset-4">
        <h1 class="btn-success border-radius" style="border-radius: 8px;">登陆</h1>

        <!--login start-->
        <div class="form-group ">
            <label for="exampleInputEmail1">用户名</label>
            <input type="email" class="form-control" id="username" placeholder="输入用户名">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" id="password" placeholder="输入密码">
        </div>

        <!--
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        -->
        <div>
            其他登陆方式:<span id="qqLoginBtn"></span>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" id="rem"> 记住我
            </label>
        </div>

        <button type="submit" id="sub" class="btn btn-primary">登陆</button>
        <button id="reg" class="btn btn-info">注册</button>
        <!--login end-->
    </div>
</div>
<script>
    $(function(){
        $('#reg').on('click',function(){
            location.href = '<?php echo Url::to(['site/reg']); ?>';
        })
        $('#sub').on('click',function(){
            login();
        })
    })
    function login()
    {
        var username = $('#username').val();
        var password = $('#password').val();
        var remenber = $('#rem').val();
        var loginUrl = '<?php echo Url::to(['site/dologin']); ?>';
        if(username == ''){
            alert('请输入用户名');
            return false;
        }
        if(username.length > 40){
            alert('用户名不要超过40个字');
            return false;
        }
        if(password == ''){
            alert('请输入密码');
            return false;
        }
        var data = {"username":username,"password":password,"remenber":remenber};
        $.post(loginUrl,data,function(cb){
            cb = eval("("+cb+")");
            if(cb.code = 10000){
                alert("登陆成功");
                location.href = '<?php echo Url::to(['ati/index']); ?>';
            }else{
                alert(cb.msg)
            }
        })
    }
    <script type="text/javascript">
        QC.Login({
            btnId:"qqLoginBtn"	//插入按钮的节点id
        });
</script>
</script>
