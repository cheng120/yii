<?php
    use yii\helpers\Url;
use yii\widgets\LinkPager;
//循环展示数据

    $this->title = 'ati';
?>
<?php
foreach ($models as $model) {


?>
<div class="row">
    <div class="col-md-6" style="border-color: #87CEFF;border-style: solid;">

        <div>
            <?php echo $model["content"]?>
        </div>
        <div class="text-right">
            <?php echo $model["source"]?>
        </div>
        <div>
            <?php echo date("Y-m-d",$model["createtime"])?>
        </div>
    </div>
</div>
<?php } ?>
<button id="openWindow" type="button" class="btn btn-default" >打开</button>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">添加名句</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="content">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="saveContent">添加句子</button>
            </div>
        </div>
    </div>
</div>
<?php echo LinkPager::widget([
        'pagination' => $pages,
    ]);
?>
<script>
    $("#openWindow").on("click                                             ",function(){
        $('#myModal').modal({ keyboard: true,toggle:true});
    })

    $("#saveContent").on("click",function(){
        var content = $('#content').val();
        if(!content){
            alert("添加内容不能为空");
            return false;
        }
        var url = "<?php echo Url::to(['ati/addati']); ?>";
        $.post(url,{'content':content},function(d){
            d = eval("("+d+")");
            if(d.code == 10000){
                var html = "";
            }
        })
    })
</script>
