
<?php
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>


<!--简体中文-->

<div class="wrapper">


    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <!-- /.nav-tabs-custom -->

                    <!-- Chat box -->

                    <!-- /.box (chat box) -->
                    <div class="page-header">
                        <h2>上传fate图</h2>
                    </div>

                    <script src="/js/fileinput.js"></script>
                    <script src="/themes/fa/theme.js"></script>
                    <script src="/js/locales/zh.js" ></script>
                    <label class="control-label"></label>
                    <input id="input-fa" name="inputfa[]" type="file" multiple class="file-loading">

                    <!-- TO DO List -->
                    <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-envelope"></i>

                            <h3 class="box-title">描述图片</h3>
                            <!-- tools box -->

                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <select class="form-control" name="fatetype" id="fatetype">
                                        <option value="1">servant</option>
                                        <option value="2">宝具</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">图片名称</label>
                                    <input type="text" class="form-control" name="name" placeholder="名称">
                                </div>
                                <div class="form-group">
                                    <label for="">图片简述</label>
                                    <input type="text" class="form-control" name="player" placeholder="简述">
                                </div>
                                <div>
                                    <label for="">描述</label>
                                    <textarea name="info" class="textarea" placeholder="描述" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <input type="hidden" value="" id="picurl">
                            </form>
                        </div>
                        <div class="box-footer clearfix">
                            <button type="button" class="pull-right btn btn-default" id="sendMessage">提交
                                <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <script>
                        $("#input-fa").fileinput({
                            language: 'zh',
                            theme: "fa",
                            uploadUrl: "<?php echo Url::to(['adminuser/ajaxuploadfile','type'=>'fate']);?>",
                            uploadAsync: true, //设置上传同步异步 此为同步
                            allowedFileExtensions: ['jpg','git','png'],
                            maxFileCount: 1
                        });
                        $("#input-fa").on("fileuploaded", function(event, data, previewId, index) {
                            $("#input-fa").hide();
                            if(data.code == 10000){
                                if(!data.picurl){
                                    alert("上传失败");
                                    window.location.reload();
                                }
                                $("#picurl").val(data.picurl);
                                alert("上传成功")
                            }else{
                                alert("上传失败");
                                window.location.reload();
                            }
                        })
                    </script>
                    <hr>
                    <!-- /.box -->

                    <!-- quick email widget -->


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->
<script>



</script>