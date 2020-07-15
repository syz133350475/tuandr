<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.tuandr.com/addons/pcport/template/admin/customTemplateListPc.html";i:1591181862;}*/ ?>

<!-- page -->
<div class="mb-10 flex flex-pack-justify">
    <div class="">
        <?php if(per('addonslist','createTemplateDialog')): ?>
        <button class="btn btn-primary add"><i class="icon icon-add1"></i> 新增页面</button>
        <?php endif; ?>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control" placeholder="页面名称" id="search_text">
        <span class="input-group-btn"><a class="btn btn-primary search" >搜索</a></span>
    </div>
</div>

<ul class="nav nav-tabs v-nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#base" aria-controls="base" role="tab" data-toggle="tab" class="flex-auto-center">基础页</a></li>
    <li role="presentation"><a href="#diy" aria-controls="diy" role="tab" data-toggle="tab" class="flex-auto-center">自定义页</a></li>
</ul>


<table class="table v-table table-auto-center">
    <thead>
        <tr>
            <th class="td-left">页面名称</th>
            <th>页面模版</th>
            <th>状态</th>
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
    require(['utilAdmin'], function (utilAdmin) {
        var p_edit = "<?php echo per('addonslist','pcCustomTemplate'); ?>";
        var p_del = "<?php echo per('addonslist','deletePcCustomTemplate'); ?>";
        utilAdmin.initPage(getList);
        function getList(page_index) {
            $("#page_index").val(page_index);
            var type = $('li[role=presentation].active').find('a').attr('aria-controls');
            var search_text = $("#search_text").val();
            $.ajax({
                type: "post",
                url: "<?php echo $pcCustomTemplateListUrl; ?>",
                async: true,
                data: {
                    "page_index": page_index, "template_name": search_text, "type": type
                },
                success: function (res) {
                    var data = res['data'];
                    var html = '';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var curr = data[i];
                            html += '<tr>';
                            html += '<td class="td-left editChange">'
                            if (curr.default == 1) {
                                html += '<i class="icon icon-mo text-danger" title="默认模板"></i> ';
                            }
                            html += '<div class="editIcon-pa" style="width:auto;height:auto"><i class="icon icon-edit"></i></div>';
                            html += '<input type="text" class="editInput3" value='+ curr.name +' style="width: 40%; display: none;">';
                            html += '<input type="hidden" class="code" value='+ curr.code +'>';
                            html += '<input type="hidden" class="code_type" value='+ curr.type +'>';
                            html += '<input type="hidden" class="code_name" value='+ curr.name +'>';
                            html += '<span class="editSpan">'+curr.name + '</span></td>';
                            // html += curr.name + '</td>';
                            html += '<td>' + curr.typeName + '</td>';
                            if (curr.used == 1) {
                                html += '<td><span class="label label-success">使用中</span></td>';
                            } else {
                                html += '<td> <span class="label label-danger">未使用</span></td>';
                            }
                            html += '</td>';
                            html += '<td>' + curr.updatetime + '</td>';
                            html += '<td class="fs-0 operationLeft">';
                            if (curr.used != 1) {
                                if (curr.type != 'custom_templates' && p_edit === '1') {
                                    html += '<a href="javascript:void(0);" class="btn-operation setDefaultCustomTemplate" data-id = \'' + curr.code + '\' data-type=\'' + curr.type + '\'>设为使用</a>';
                                }
                            }

                            if (curr.type == 'custom_templates') {
                                html += '<input type="text" style = "display:none;width:1px;border: 0px;" id="hidden_img_' + curr.code + '" value="' + __URLS("SHOP_MAIN/index/custompage&suffix=" + curr.code + "&temp_type=" + curr.type + "&instance_id=<?php echo $instance_id; ?>") + '"/>';
                                html += '<a href="javascript:void(0);" data-clipboard-text="' + __URLS("SHOP_MAIN/index/custompage&suffix=" + curr.code + "&temp_type=" + curr.type + "&instance_id=<?php echo $instance_id; ?>") + '" title="" class="btn-operation copy" data-id= "' + curr.code + '">复制链接</a>';
                                utilAdmin.copy();
                            }

                            if(p_edit === '1'){
                                html += '<a class="btn-operation" href="' + __URL("ADDONS_ADMIN_MAINpcCustomTemplate&code=" + curr.code + "&type=" + curr.type) + '">装修</a>';
                            }
                            if (curr.used != 1) {
                                if (curr.default != 1 && p_del === '1') {
                                    html += '<a href="javascript:void(0);" class="btn-operation text-red1 removeTemplate" data-id=\'' + curr.code + '\' data-type=\'' + curr.type + '\' >删除</a>';
                                }     
                            }
                            // if (curr.used == 1) {
                            // } else {
                            //     if (curr.default != 1 && p_del === '1') {
                            //         html += '<a href="javascript:void(0);" class="btn-operation text-red1 removeTemplate" data-id=\'' + curr.code + '\' data-type=\'' + curr.type + '\' >删除</a>';
                            //     }
                            //     if (curr.type != 'custom_templates' && p_edit === '1') {
                            //         html += '<a href="javascript:void(0);" class="btn-operation setDefaultCustomTemplate" data-id = \'' + curr.code + '\' data-type=\'' + curr.type + '\'>设为使用</a>';
                            //     }
                            // }


                            html += '</td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td colspan="5" class="h-200">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: res['total_count'] // 动态修改总数
                    });
                    $("#list").html(html);
                    utilAdmin.tips();
                    removeTemplate();
                    setDefaultCustomTemplate();
                }
            });
        }
        $('.search').on('click', function () {
            utilAdmin.initPage(getList);
        });
        //切换基础、自定义页面
        $('a[href="#diy"],a[href="#base"]').on('shown.bs.tab', function () {
            utilAdmin.initPage(getList);
        });
        $('.add').on('click', function () {
            var url = "<?php echo $createTemplateDialogUrl; ?>";
            utilAdmin.confirm2('新增页面','url:'+url,'col-md-10',function(){
                getList($("#page_index").val());
            });
        });
        function removeTemplate() {
            $('.removeTemplate').on('click', function () {
                var code = $(this).data('id');
                var type = $(this).data('type');
                utilAdmin.alert('"确定删除该模板吗？删除后将无法找回！！请谨慎操作！！"', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo $deletepccustomtemplateUrl; ?>",
                        data: {"code": code, "template_type": type},
                        dataType: "json",
                        async: true,
                        success: function (data) {
                            if (data == 1) {
                                utilAdmin.message('该模板正在使用中，不能删除！欲删除请先更改模板', 'danger', getList($("#page_index").val()));
                            } else if (data == 4) {
                                utilAdmin.message('默认模板不能删除', 'danger', getList($("#page_index").val()));
                            } else if (data == 2) {
                                utilAdmin.message('系统出错', 'danger', getList($("#page_index").val()));
                            } else {
                                utilAdmin.message('删除成功', 'success', getList($("#page_index").val()));
                            }
                        }
                    });

                })

            })
        }
        function setDefaultCustomTemplate() {
            $('.setDefaultCustomTemplate').on('click', function () {
                $(".tooltip.fade.top.in").remove();
                var code = $(this).data('id');
                var type = $(this).data('type');
                $.ajax({
                    type: "post",
                    url: "<?php echo $setdefaultcustomtemplatepcUrl; ?>",
                    data: {"code": code, "type": type},
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        if (data["code"] == 1) {
                            utilAdmin.message(data["message"], 'success', getList($("#page_index").val()));
                        } else {
                            utilAdmin.message(data["message"], 'danger');
                        }
                    }
                });
            })
        }

        //点击修改页面名称
        $("body").on("click",".editIcon-pa",function(){
            console.log(123);
            $(this).siblings(".editInput3").show();
            $(this).siblings(".editInput3").focus();
            $(this).siblings(".editSpan").hide();
        });
        $("body").on("blur",".editInput3",function(){
            $(this).hide();
            $(this).siblings(".editSpan").show();
        });
        $("body").on("blur",".editInput3",function(){
            $(this).hide();
            $(this).siblings(".editSpan").show();
            var code = $(this).siblings('.code').val();
            var type = $(this).siblings('.code_type').val();
            var default_code_name = $(this).siblings('.code_name').val();
            var code_name = $(this).val();
            if(default_code_name != code_name){
                $.ajax({
                    type: "post",
                    url: "<?php echo $edittemUrl; ?>",
                    data: {"tem": code, "template_type": type,"name":code_name},
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        if (data["code"] == 1) {
                            utilAdmin.message(data["message"], 'success', getList($("#page_index").val()));
                        } else {
                            utilAdmin.message(data["message"], 'danger');
                        }
                    }
                });
            }
        });
    })
</script>
