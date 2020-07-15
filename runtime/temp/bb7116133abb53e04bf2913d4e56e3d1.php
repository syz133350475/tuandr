<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopLevel.html";i:1583811694;}*/ ?>





        <!-- page -->
        <div class="mb-20">
            <a href="<?php echo __URL('ADDONS_MAINaddShopLevel'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加版本</a>
        </div>

        <table class="table v-table table-auto-center">
            <thead>
                <tr>
                    <th>版本名称</th>
                    <th>备注</th>
                    <th>更新时间</th>
                    <th class="col-md-2 pr-14 operationLeft">操作</th>
                </tr>
            </thead>
            <tbody id="list">

            </tbody>
        </table>
        <input type="hidden" id="page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>
        <!-- page end -->


<script>
    require(['util'], function (util) {
        util.initPage(LoadingInfo);
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var search_text = $("#search_text").val();
            $.ajax({
                type: "post",
                url: "<?php echo $shopLevelListUrl; ?>",
                async: true,
                data: {
                    "page_index": page_index, "search_text": search_text, "website_id": '<?php echo $website_id; ?>'
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data["data"][i]["type_name"] + '</td>';
                            html += '<td>' + data["data"][i]["type_desc"] + '</td>';
                            html += '<td>' + timeStampTurnTime(data["data"][i]["modify_time"]) + '</td>';
                            html += '<td class="fs-0 operationLeft">';
                            html += '<a class="btn-operation" href="' + __URL('ADDONS_MAINupdateShopLevel&instance_typeid=' + data['data'][i]['instance_typeid']) + '">编辑</a>';
                            if(!data["data"][i]['is_default']){
                                html += '<a class="btn-operation J-delete text-red1" href="javascript:void(0);" data-id="' + data['data'][i]['instance_typeid'] + '">删除</a>';
                            }            
                            html += '</td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                    util.tips();
                }
            });
        }
        $('#list').on('click', '.J-delete', function () {
            $(".tooltip.fade.top.in").remove();
            var instance_typeid = $(this).data('id');
            util.alert('确定删除吗?', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteShopLevelUrl; ?>",
                    data: {'instance_typeid': instance_typeid, "website_id": '<?php echo $website_id; ?>'},
                    async: false,
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message('操作成功', 'success', LoadingInfo($('#page_index').val()));
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            });
        });
    });
</script>
