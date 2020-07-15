<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/www.tuandr.com/addons/fullcut/template/platform/mansongList.html";i:1583811694;}*/ ?>

<style>
</style>


        <!-- page -->
        <div class="mb-20">
            <a href="<?php echo __URL('PLATFORM_MAIN/addonslist/menu_addonslist?addons=addFullCut'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加活动</a>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>活动名称</th>
                <th>优惠模式</th>
                <th>生效时间</th>
                <th>状态</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="list">

            </tbody>
        </table>
        <input type="hidden" id="pageIndex">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>

        <!-- page end -->



<script>
    require(['util'],function(util){

        util.initPage(LoadingInfo);

        function LoadingInfo(page_index) {
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu?addons=fullCutList'); ?>",
                data : {
                    "page_index" : page_index
                },
                success : function(data) {
                    var html = '';
                    if (data["data"].length>0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            switch (parseInt(data['data'][i]['status'])) {
                                case 0:
                                    var status_name = '<span class="label label-warning">待开始</span>';
                                    break;
                                case 1:
                                    var status_name = '<span class="label label-success">进行中</span>';
                                    break;
                                case 3:
                                    var status_name = '<span class="label label-danger">已关闭</span>';
                                    break;
                                case 4:
                                    var status_name = '<span class="label label-danger">已结束</span>';
                                    break;
                            }
                            html += '<tr>';
                            html += '<td>';
                            html += data["data"][i]["mansong_name"];
                            html += '</td>';
                            if (data['data'][i]['type'] == 1) {
                                html += '<td>普通优惠</td>';
                            } else {
                                html += '<td>多级优惠</td>';
                            }
                            html += '<td>' + timeStampTurnTime(data["data"][i]["start_time"]) + ' 至 ' + timeStampTurnTime(data["data"][i]["end_time"]) + '</td>';
                            html += '<td><span>' + status_name + '</span></td>';
                            html += '<td class="operationLeft fs-0">';
                                html += '<input type="hidden" name="mansong_id" value="' + data["data"][i]["mansong_id"] + '">';
                            if (data['data'][i]['status'] == 0) {
                                html += '<a href="' + __URL('PLATFORM_MAIN/Menu/addonmenu?addons=editFullCut&mansong_id=' + data["data"][i]["mansong_id"]) + '" class="btn-operation">编辑</a>';
                                html += '<a href="javascript:void(0);" class="del btn-operation text-red1">删除</a>';
                            } else if (data['data'][i]['status'] == 1) {
                                html += '<a href="javascript:void(0);" class="close_mansong btn-operation">关闭</a>';
                            } else if (data['data'][i]['status'] == 3) {
                                html += '<a href="javascript:void(0);" class="del btn-operation text-red1">删除</a>';
                            } else if (data['data'][i]['status'] == 4) {
                                html += '<a href="javascript:void(0);" class="del btn-operation text-red1">删除</a>';
                            }
                            html += '<a href="' + __URL('PLATFORM_MAIN/Menu/addonmenu?addons=fullCutInfo&mansong_id=' + data["data"][i]["mansong_id"]) + '" class="btn-operation">详情</a>';
                            

                            html += '</td>';
                            html += '</tr>';
                        }
                    }else {
                        html += '<tr align="center"><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                    }
                    $("#list").html(html);
                    util.tips();
                    var totalpage = $("#page_count").val();
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    if (totalpage == 1) {
                        changeClass("all");
                    }
                    load_method();
                }
            });
        }


        function load_method() {

            $('.del').on('click',function(){

                var id = $(this).siblings('input').val();
                util.alert('确定删除吗 ？', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('platform/addons/execute/addons/fullcut/controller/fullcut/action/delPromotionMansong'); ?>",
                        data: {
                            'mansong_id': id
                        },
                        success: function (data) {

                            if (data["code"] > 0) {
                                util.message("删除成功",'success', "<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu?addons=fullCutList'); ?>");
                            }else{
                                util.message("删除失败",'danger');
                            }

                        }
                    })
                })

            })


            $('.close_mansong').on('click',function(){

                var id = $(this).siblings('input').val();
                util.alert('确定关闭吗 ？', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('platform/addons/execute/addons/fullcut/controller/fullcut/action/closeMansong'); ?>",
                        data: {
                            'mansong_id': id
                        },
                        success: function (data) {

                            if (data["code"] > 0) {
                                util.message("操作成功",'success', "<?php echo __URL('PLATFORM_MAIN/Menu/addonmenu?addons=fullCutList'); ?>");
                            }else{
                                util.message("操作失败",'danger');
                            }

                        }
                    })
                })

            })



        }

    })
</script>


