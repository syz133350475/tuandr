<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.tuandr.com/addons/goodhelper/template/admin/goodImportHelper.html";i:1583811696;}*/ ?>

<!-- page -->
<div class="panel panel-default mb-15">
    <!-- Default panel contents -->
    <div class="panel-heading">CSV数据包导入须知</div>
    <!-- List group -->
    <div class="panel-body">
        <div class="mb-04">功能介绍：可将淘宝助理以及其他途径获取的淘宝商品CSV文件快速上传至商城,节约您的大量时间!</div>
        <div class="clearfix">
            <div class="pull-left">使用方法：</div>
            <div class="pull-left">
                <p class="mb-04">1. 将您获取到的CSV文件转存为Excel格式,否则将无法识别 </p>
                <p class="mb-04">2. 将配套的图片文件包压缩为Zip格式压缩包并且导入(图片需在压缩包根目录下)  </p>
                <p class="mb-04">3. 确认上传即可 </p>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-left">示例文件：</div>
            <div class="pull-left">
                <p><a href="<?php echo __URL(SHOP_MAIN); ?>/public/demo.xls" class="text-primary mb-04">Excel示例文件下载</a></p>
                <p><a href="<?php echo __URL(SHOP_MAIN); ?>/public/demo.zip" class="text-primary mb-04">Zip示例文件下载</a></p>
            </div>
        </div>

    </div>
								
</div>
<form action="" method="post" class='form-horizontal widthFixedForm' enctype="multipart/form-data" onsubmit="return false" id="form">
    <div class="form-group">
        <label class="col-md-2 control-label">导入类型</label>
        <div class="col-md-5">
            <div>
                <label class="radio-inline">
                    <input type="radio" name="add_type" value="0" checked> 商城数据包
                </label>
                <label class="radio-inline">
                    <input type="radio" name="add_type" value="1"> 淘宝csv
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>Excel(xlsx、xls、csv)</label>
        <!--<div class="col-md-2">
            <input name="excel" type="file" class="upload_file" id="f_file">  
            <button type="button" class="btn btn-primary upload_btn btn-sm" style='margin-top:-46px; padding:5px 11px;'>选择文件 </button>
        </div>-->
        <div class="col-md-5">
            <div class="input-group">
                <input class="excelPackage form-control" disabled="" type="text"> 
                <span class="input-group-btn"><button class="btn btn-info btn-file J-btnwx">上传文件<input id="f_file" class="fileuploads upload_file" type="file" name="excel" multiple=""></button></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>Zip图片压缩包</label>
        <!--<div class="col-md-2">
            <input name="zip" type="file" class="zip_upload_file" id="z_file">  
            <button type="button" class="btn btn-primary zip_upload_btn btn-sm" style='margin-top:-46px; padding:5px 11px;'>选择文件 </button>
        </div>-->
        <div class="col-md-5">
            <div class="input-group">
                <input class="zipPackage form-control" disabled="" type="text"> 
                <span class="input-group-btn"><button class="btn btn-info btn-file J-btnwx">上传文件<input id="fileupload" class="fileuploads zip_upload_file" type="file" name="zip" multiple=""></button></span>
            </div>
        </div>
    </div>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <button id="button" class="btn btn-primary" type="button">导入</button>
            <span class="btn btn-primary J-progress">查看进度</span>
        </div>
    </div>
</form>

<!-- page end -->



<!--<script type="text/javascript" src="/public/platform/js/indexDecorate/jquery.form.js"></script>-->
<script>
    require(['utilAdmin','jqueryForm'], function (util) {
        $('body').on('click','.J-progress', function () {
            location.href = "<?php echo __URL('ADMIN_MAIN/System/plantask'); ?>";
        })
        $(".upload_btn").click(function () {
            $(".upload_file").click();
        });
        $(".zip_upload_btn").click(function () {
            $(".zip_upload_file").click();
        });
        $(".upload_file").change(function () {
            var path = $(".upload_file").val(),
                    extStart = path.lastIndexOf('.'),
                    ext = path.substring(extStart, path.length).toUpperCase();
            if (path === '') {
                return false;
            }
            //判断格式
            if (ext !== '.XLSX' && ext !== '.XLS' && ext !== '.CSV') {
                $(".upload_file").val('');
                util.message('请上传正确格式的文件', 'danger');
                return false;
            }
            $('.excelPackage').val(path);
        });
        $(".zip_upload_file").change(function () {
            var path = $(".zip_upload_file").val(),
                    extStart = path.lastIndexOf('.'),
                    ext = path.substring(extStart, path.length).toUpperCase();
            if (path === '') {
                return false;
            }
            //判断格式
            if (ext !== '.ZIP') {
                $(".zip_upload_file").val('');
                util.message('请上传正确格式的文件', 'danger');
                return false;
            }
            $('.zipPackage').val(path);
        });
        function check() {
            var xls = $("#f_file").val();
            var zip = $("#fileupload").val();
            if (xls.length == 0)
            {
                util.message('请上传文件', 'danger');
                return false;
            }
            if (zip.length == 0)
            {
                util.message('请上传zip文件', 'danger');
                return false;
            }
            return true;
        }
        $("#button").click(function () {
            if($(this).attr('disabled')==='disabled'){
                return false;
            }
            if (!check()) {
                return false;
            }
            $(this).attr({disabled: "disabled"}).html('导入中...');
            $("#form").ajaxSubmit({
                type: "post",
                dataType: "text", // 'xml', 'script', or 'json' (expected server response type) 
                url: "<?php echo $goodConfirmImportUrl; ?>",
                success: function (file) {
                    var data = JSON.parse(file);
                    $('#button').removeAttr('disabled').html('导入');
                    if (data.code == '1') {
                        util.message(data.message, 'success', function(){
                            location.reload();
                        });
                    } else {
                        util.message(data.message, 'danger');
                    }
                }
            });
        });
    });
</script>

