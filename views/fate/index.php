<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
//循环展示数据

$this->title = 'fate';
?>
<div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0"
            class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner" style="width: 1140px;height: 855px">
        <div class="item active">
            <img src="/img/0.jpg" alt="First slide" value="1" width="1280" height="1024">
        </div>
        <div class="item">
            <img src="/img/1.jpg" alt="Second slide" value="2" width="1280" height="1024">
        </div>
        <div class="item">
            <img src="/img/2.jpg" alt="Third slide" value="3" width="1280" height="1024">
        </div>
        <div class="item">
            <img src="/img/3.jpg" alt="Third slide" value="4" width="1280" height="1024">
        </div>
        <div class="item">
            <img src="/img/4.jpg" alt="Third slide" value="5" width="1280" height="1024">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel"
       data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel"
       data-slide="next">&rsaquo;</a>
    <!-- 控制按钮 -->

</div>
<div style="text-align:center;">

    <button class="btn slide" value="1" ><img src="/img/0.jpg" alt="" style="width: 100px;height: 75px" class="img-thumbnail"></button>
    <button class="btn slide" value="2" ><img src="/img/1.jpg" alt="" style="width: 100px;height: 75px" class="img-thumbnail"></button>
    <button class="btn slide" value="3" ><img src="/img/2.jpg" alt="" style="width: 100px;height: 75px" class="img-thumbnail"></button>
    <button class="btn slide" value="4" ><img src="/img/3.jpg" alt="" style="width: 100px;height: 75px" class="img-thumbnail"></button>
    <button class="btn slide" value="5" ><img src="/img/4.jpg" alt="" style="width: 100px;height: 75px" class="img-thumbnail"></button>


</div>
<div id="bewrite">
    <div id="content1" class="contents" style="display: none">
        1
    </div>
    <div id="content2" class="contents" style="display: none">2</div>
    <div id="content3" class="contents" style="display: none">3</div>
</div>

<script>
    $(function () {
        $('#myTab a:last').tab('show')
    })
</script>

<div class="modal fade" id="remind" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="remindTitle">标题</h4>
            </div>
            <div class="modal-body" id="remindContent">
                提示内容
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(function(){
        $('.carousel').carousel({
            interval: false,
        })

// 初始化轮播
        /*$(".start-slide").click(function(){
         $("#myCarousel").carousel('cycle');
         });*/
// 停止轮播
// 循环轮播到上一个项目
        $(".prev-slide").click(function(){
            $("#myCarousel").carousel('prev');
        });
// 循环轮播到下一个项目
        $(".next-slide").click(function(){
            $("#myCarousel").carousel('next');
        });
// 循环轮播到某个特定的帧
        $(".slide").click(function(){
            $("#myCarousel").carousel($(this).val()-1);
            $(".contents").hide();
            $("#content"+$(this).val()).show();
        });
    });
</script>