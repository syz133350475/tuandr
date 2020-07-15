<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/www.tuandr.com/addons/delivery/template/platform/printSetting.html";i:1587970156;}*/ ?>
<form class="form-horizontal form-validate widthFixedForm">
    <div class="screen-title">
        <span class="text">打印机设置</span>
    </div>
    <div class="alert alert-tips alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        注意: 1. 请将打印机连接至本机。2. 在本机上安装打印控件。3. 将打印控件中的打印端口与下面的IP端口设为相同。控件下载∶<a href="http://www.kdniao.com/documents-instrument" target="_blank" style="color:#2589ff">http://www.kdniao.com/documents-instrument</a>
    </div>
    <div class="screen-title">
        <span class="text">快递鸟电子面单设置</span>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">用户ID</label>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="" name="user_id" id="user_id"
                   value="<?php echo $info['user_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">API key</label>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="" name="api_key" id="api_key"
                   value="<?php echo $info['api_key']; ?>">
        </div>
    </div>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary SAVE" type="submit">保存</button>
        </div>
    </div>
</form>


<script>
    require(['util'], function (util) {
        util.validate($('.form-validate'), function (form) {
            $.ajax({
                url: '<?php echo $saveSettingUrl; ?>',
                type: 'post',
                data: {
                    'port': $("#port").val(),
                    'user_id': $("#user_id").val(),
                    'api_key': $("#api_key").val()
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message('保存成功', 'success')
                    } else {
                        util.message(data.message)
                    }
                }
            })
        })
    })

</script>


