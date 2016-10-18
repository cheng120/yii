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
            <input type="text" class="form-control" id="nickname" placeholder="输入昵称" value="<?php if(isset($userInfo['nickname'])){echo $userInfo['nickname'];}; ?>">
            <a class="btn-info border-radius" href="javascript:;" onclick=" editInfo(1)">修改</a>
            <span class="help-block alert alert-danger " id="nickWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">签名</label>
            <input type="text" class="form-control" id="sign" placeholder="输入签名" value="<?php if(isset($userInfo['sign'])){echo $userInfo['sign'];}; ?>">
            <span class="help-block alert alert-danger " id="curPasswordWarn" style="display: none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
            <a class="btn-info border-radius" href="javascript:;" onclick=" editInfo(2)">修改</a>
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
        <!--
        <button type="submit" id="sub" class="btn btn-primary">确认</button>
        <button id="login" class="btn btn-info">登陆</button>
        <!--login end-->
    </div>
</div>
<script>
    function editInfo(type){
        if(type==1){
            var value = $("#nickname").val();
        }else{
            var value = $("#sign").val();
        }
        var url = '<?php echo Url::to(['userini/ajaxedituserinfo']); ?>';
        var data = {'value':value,"type":type};
        $.post(url,data,function(d){
            d = eval('('+d+')');
            if(d.code == 10000){
                alert("修改成功");
            }else{
                alert(d.msg);
            }
        })
    }
</script>
