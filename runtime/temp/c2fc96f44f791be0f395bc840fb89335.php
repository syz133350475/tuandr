<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/www.tuandr.com/addons/delivery/template/admin/formList.html";i:1583811700;}*/ ?>

<ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
    <li role="presentation" class="active">
        <a href="#form_template" aria-controls="form_template" role="tab" data-toggle="tab" class="flex-auto-center"
           aria-expanded="false">电子面单</a>
    </li>
    <li role="presentation">
        <a href="#express_template" aria-controls="express_template" role="tab" data-toggle="tab"
           class="flex-auto-center"
           aria-expanded="false">快递单</a>
    </li>
    <li role="presentation">
        <a href="#delivery_template" aria-controls="delivery_template" role="tab" data-toggle="tab"
           class="flex-auto-center"
           aria-expanded="false">发货单</a>
    </li>
    <li role="presentation">
        <a href="#sender_template" aria-controls="sender_template" role="tab" data-toggle="tab" class="flex-auto-center"
           aria-expanded="false">发货人</a>
    </li>
</ul>
<div class="tab-content pt-15">
    <div class="tab-pane fade tab-1 active in" id="form_template">
        <div class="mb-20">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddFormTemplate'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加模板</a>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>电子面单名称</th>
                <th>快递公司</th>
                <th>是否默认</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="form_list">
            </tbody>
        </table>
        <input type="hidden" id="form_page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="form_page" class="pagination pull-right"></ul>
        </nav>
    </div>
    <div class="tab-pane fade tab-2" id="express_template">
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>快递公司</th>
                <th>是否默认</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="express_list">
            </tbody>
        </table>
        <input type="hidden" id="express_page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="express_page" class="pagination pull-right"></ul>
        </nav>
    </div>
    <div class="tab-pane fade tab-3" id="delivery_template">
        <div class="mb-20">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddDeliveryTemplate'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>
                添加模板</a>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>发货单名称</th>
                <th>是否默认</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="delivery_list">
            </tbody>
        </table>
        <input type="hidden" id="delivery_page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="delivery_page" class="pagination pull-right"></ul>
        </nav>
    </div>
    <div class="tab-pane fade tab-4" id="sender_template">
        <div class="mb-20">
            <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddSenderTemplate'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>
                添加模板</a>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>发货人</th>
                <th>电话</th>
                <th>发货地区</th>
                <th>详细地址</th>
                <th>是否默认</th>
                <th class="col-md-2 pr-14 operationLeft">操作</th>
            </tr>
            </thead>
            <tbody id="sender_list">
            </tbody>
        </table>
        <input type="hidden" id="sender_page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="sender_page" class="pagination pull-right"></ul>
        </nav>
    </div>
</div>


<script id="tpl_form_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <%item.template_name%>
        </td>
        <td>
            <%item.company_name%>
        </td>
        <td>
            <%if item.is_default == 1%>
            <span class="label label-success">是</span>
            <%else%>
            <span class="label label-danger">否</span>
            <%/if%>
        </td>
        <td data-id="<%item.form_template_id%>" class="fs-0 operationLeft">
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation J-default">设为默认</a>
            <%/if%>
            <a href="javascript:;" class="btn-operation J-edit">编辑</a>
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation text-red1 J-delete">删除</a>
            <%/if%>
        </td>
    </tr>
    <%/each%>
</script>
<script id="tpl_express_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <%item.express_company_name%>
        </td>
        <td>
            <%if item.is_default == 1%>
            <span class="label label-success">是</span>
            <%else%>
            <span class="label label-danger">否</span>
            <%/if%>
        </td>
        <td data-id="<%item.id%>" class="fs-0 operationLeft">
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation J-default">设为默认</a>
            <%/if%>
            <a href="javascript:;" class="btn-operation J-edit">编辑</a>
        </td>
    </tr>
    <%/each%>
</script>
<script id="tpl_delivery_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <%item.template_name%>
        </td>
        <td>
            <%if item.is_default == 1%>
            <span class="label label-success">是</span>
            <%else%>
            <span class="label label-danger">否</span>
            <%/if%>
        </td>
        <td data-id="<%item.delivery_template_id%>" class="fs-0 operationLeft">
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation J-default">设为默认</a>
            <%/if%>
            <a href="javascript:;" class="btn-operation J-edit">编辑</a>
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation text-red1 J-delete">删除</a>
            <%/if%>
        </td>
    </tr>
    <%/each%>
</script>
<script id="tpl_sender_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <%item.sender%>
        </td>
        <td>
            <%item.mobile%>
        </td>
        <td>
            <%item.province_name%> <%item.city_name%> <%item.district_name%>
        </td>
        <td>
            <%item.address%>
        </td>
        <td>
            <%if item.is_default == 1%>
            <span class="label label-success">是</span>
            <%else%>
            <span class="label label-danger">否</span>
            <%/if%>
        </td>
        <td data-id="<%item.sender_template_id%>" class="fs-0 operationLeft">
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation J-default">设为默认</a>
            <%/if%>
            <a href="javascript:;" class="btn-operation J-edit">编辑</a>
            <%if item.is_default != 1%>
            <a href="javascript:;" class="btn-operation text-red1 J-delete">删除</a>
            <%/if%>
        </td>
    </tr>
    <%/each%>
</script>

<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.initPage(LoadingFormInfo, 'form_page');
        util.initPage(LoadingExpressInfo, 'express_page');
        util.initPage(LoadingDeliveryInfo, 'delivery_page');
        util.initPage(LoadingSenderInfo, 'sender_page');

        $("#form_list").on('click', '.J-default', function () {
            var id = $(this).parent('td').data('id')
            $.ajax({
                type: 'post',
                url: '<?php echo $defaultFormUrl; ?>',
                data: {
                    'form_template_id': id
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message('设置成功', 'success', LoadingFormInfo($("#form_page_index").val()))
                    } else {
                        util.message(data.message);
                    }
                }
            })
        })
        $("#express_list").on('click', '.J-default', function () {
            var id = $(this).parent('td').data('id')
            $.ajax({
                type: 'post',
                url: '<?php echo $defaultExpressUrl; ?>',
                data: {
                    'id': id
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message('设置成功', 'success', LoadingExpressInfo($("#express_page_index").val()))
                    } else {
                        util.message(data.message);
                    }
                }
            })
        })
        $("#delivery_list").on('click', '.J-default', function () {
            var id = $(this).parent('td').data('id')
            $.ajax({
                type: 'post',
                url: '<?php echo $defaultDeliveryUrl; ?>',
                data: {
                    'delivery_template_id': id
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message('设置成功', 'success', LoadingDeliveryInfo($("#delivery_page_index").val()))
                    } else {
                        util.message(data.message);
                    }
                }
            })
        })
        $("#sender_list").on('click', '.J-default', function () {
            var id = $(this).parent('td').data('id')
            $.ajax({
                type: 'post',
                url: '<?php echo $defaultSenderUrl; ?>',
                data: {
                    'sender_template_id': id
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message('设置成功', 'success', LoadingSenderInfo($("#sender_page_index").val()))
                    } else {
                        util.message(data.message);
                    }
                }
            })
        })


        $("#form_list").on('click', '.J-delete', function () {
            var id = $(this).parent('td').data('id')
            util.confirm('确认删除', '', function () {
                $.ajax({
                    type: 'post',
                    url: '<?php echo $deleteFormTemplateUrl; ?>',
                    data: {
                        'form_template_id': id
                    },
                    success: function (data) {
                        if (data > 0) {
                            util.message('删除成功', 'success', LoadingFormInfo($("#form_page_index").val()))
                        } else {
                            util.message('删除失败')
                        }
                    }
                })
            })
        })
        $("#sender_list").on('click', '.J-delete', function () {
            var id = $(this).parent('td').data('id')
            util.confirm('确认删除', '', function () {
                $.ajax({
                    type: 'post',
                    url: '<?php echo $deleteSenderTemplateUrl; ?>',
                    data: {
                        'sender_template_id': id
                    },
                    success: function (data) {
                        if (data > 0) {
                            util.message('删除成功', 'success', LoadingSenderInfo($("#sender_page_index").val()))
                        } else {
                            util.message('删除失败')
                        }
                    }
                })
            })
        })
        $("#delivery_list").on('click', '.J-delete', function () {
            var id = $(this).parent('td').data('id')
            util.confirm('确认删除', '', function () {
                $.ajax({
                    type: 'post',
                    url: '<?php echo $deleteDeliveryTemplateUrl; ?>',
                    data: {
                        'delivery_template_id': id
                    },
                    success: function (data) {
                        if (data > 0) {
                            util.message('删除成功', 'success', LoadingDeliveryInfo($("#delivery_page_index").val()))
                        } else {
                            util.message('删除失败')
                        }
                    }
                })
            })
        })

        $("#form_list").on('click', '.J-edit', function () {
            var id = $(this).parent('td').data('id')
            location.href = __URL('ADDONS_ADMIN_MAINupdateFormTemplate&id=' + id)
        })
        $("#sender_list").on('click', '.J-edit', function () {
            var id = $(this).parent('td').data('id')
            location.href = __URL('ADDONS_ADMIN_MAINupdateSenderTemplate&id=' + id)
        })
        $("#delivery_list").on('click', '.J-edit', function () {
            var id = $(this).parent('td').data('id')
            location.href = __URL('ADDONS_ADMIN_MAINupdateDeliveryTemplate&id=' + id)
        })
        $("#express_list").on('click', '.J-edit', function () {
            var id = $(this).parent('td').data('id')
            location.href = __URL('ADDONS_ADMIN_MAINupdateExpressTemplate&id=' + id)
        })

        function LoadingFormInfo(page_index) {
            $("#form_page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $formListUrl; ?>",
                data: {
                    "page_index": page_index
                },
                success: function (data) {
                    if (tpl('tpl_form_list', data)) {
                        $("#form_list").html(tpl('tpl_form_list', data));
                        $('#form_page').paginator('option', {
                            totalCounts: data['total_count']
                        });
                    } else {
                        var html = '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                        $("#form_list").html(html);
                    }
                }
            });
        }

        function LoadingExpressInfo(page_index) {
            $("#express_page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $expressListUrl; ?>",
                data: {
                    "page_index": page_index
                },
                success: function (data) {
                    if (tpl('tpl_express_list', data)) {
                        $("#express_list").html(tpl('tpl_express_list', data));
                        $('#express_page').paginator('option', {
                            totalCounts: data['total_count']
                        });
                    } else {
                        var html = '<tr><td class="h-200" colspan="3">暂无符合条件的数据记录</td></tr>';
                        $("#express_list").html(html);
                    }
                }
            });
        }

        function LoadingDeliveryInfo(page_index) {
            $("#delivery_page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $deliveryListUrl; ?>",
                data: {
                    "page_index": page_index
                },
                success: function (data) {
                    if (tpl('tpl_delivery_list', data)) {
                        $("#delivery_list").html(tpl('tpl_delivery_list', data));
                        $('#delivery_page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        var html = '<tr><td class="h-200" colspan="3">暂无符合条件的数据记录</td></tr>';
                        $("#delivery_list").html(html);
                    }
                }
            });
        }

        function LoadingSenderInfo(page_index) {
            $("#sender_page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $senderListUrl; ?>",
                data: {
                    "page_index": page_index
                },
                success: function (data) {
                    if (tpl('tpl_sender_list', data)) {
                        $("#sender_list").html(tpl('tpl_sender_list', data));
                        $('#sender_page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    } else {
                        var html = '<tr><td class="h-200" colspan="6">暂无符合条件的数据记录</td></tr>';
                        $("#sender_list").html(html);
                    }
                }
            });
        }
    });
</script>
