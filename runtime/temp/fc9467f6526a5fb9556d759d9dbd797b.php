<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/www.tuandr.com/addons/coupontype/template/admin/couponTypeList.html";i:1587970152;}*/ ?>

<!--添加按钮和搜索框-->
<div class="mb-20 flex flex-pack-justify">
    <div class="">
        <a href="<?php echo __URL('ADDONS_ADMIN_MAINaddCouponType'); ?>" class="btn btn-primary J-add"><i class="icon icon-add1"></i> 添加优惠券</a>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control" id="search_text" placeholder="模板名称">
        <span class="input-group-btn "><a class="btn btn-primary search_to">搜索</a></span>
    </div>
</div>
<!--表格-->
<table class="table v-table coupons">
    <thead>
    <tr>
        <th>优惠券名称</th>
        <th>门槛</th>
        <th>面值</th>
        <th>剩余数量/发放数量</th>
        <th>领取时间</th>
        <th>生效时间</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody class="trs">
    </tbody>
</table>
<div class="page clearfix">
    <div class="M-box3 m-style fr">
    </div>
</div>
<!-- page end -->



<script type="text/javascript">
  require(['utilAdmin'], function (utilAdmin) {
    $(function () {
        LoadingInfo(1);
        utilAdmin.copy()
    });

    function LoadingInfo(page_index) {
        $('#page_index').val(page_index ? page_index : '1');
        $.ajax({
            type: "post",
            url: "<?php echo $couponTypeListUrl; ?>",
            data: {
                "page_index": page_index,
                'page_size': $("#showNumber").val(),
                "search_text": $("#search_text").val(),
                "website_id": '<?php echo $website_id; ?>',
                'instance_id': '<?php echo $instance_id; ?>'
            },
            success: function (data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html += '<tr>';
                        // html += '<td><input name="sub" type="checkbox" value="' + data["data"][i]["coupon_type_id"] + '" ></td>';
                        if (data["data"][i]["coupon_name"] == null || "" == data["data"][i]["coupon_name"]) {
                            html += '<td>--</td>';
                        } else {
                            html += '<td>' + data["data"][i]["coupon_name"] + '</td>';
                        }
                        if (data["data"][i]['coupon_genre'] == 3) {
                            html += '<td>折扣</td>';
                            html += '<td>' + data["data"][i]["discount"] + '折</td>';
                        } else if (data["data"][i]['coupon_genre'] == 2) {
                            html += '<td>满减</td>';
                            html += '<td>' + data["data"][i]["money"] + '元</td>';
                        } else if (data["data"][i]['coupon_genre'] == 1) {
                            html += '<td>无门槛</td>';
                            html += '<td>' + data["data"][i]["money"] + '元</td>';
                        }
                        if(data["data"][i]["count"] == 0){
                            html += '<td>无限</td>';
                        }else{
                            html += '<td>' + data["data"][i]["surplus"] + '/' + data["data"][i]["count"] + '</td>';
                        }
                        html += '<td><div>' + utilAdmin.timeStampTurnTime(data["data"][i]["start_receive_time"]) + '</div>';
                        html += '<div>~</div>'
                        html += '<div>' + utilAdmin.timeStampTurnTime(data["data"][i]["end_receive_time"]) + '</div></td>';
                        html += '<td><div>' + utilAdmin.timeStampTurnTime(data["data"][i]["start_time"]) + '</div>';
                        html += '<div>~</div>'
                        html += '<div>' + utilAdmin.timeStampTurnTime(data["data"][i]["end_time"]) + '</div></td>';
                        html += '<td class="coupons-ol operationLeft fs-0"><a class="btn-operation" href="' + __URL('ADDONS_ADMIN_MAINupdateCouponType&coupon_type_id=' + data["data"][i]["coupon_type_id"]) + '" >编辑</a>';
                        html +='<a class="btn-operation link-pr" href="javascript:void(0);" > <span>链接</span> <div class="link-pos"> <div class="link-arrow"> <form class="form-horizontal">';
                        if(data['addon_status']['wap_status'] == 1) {
                            html += '<div class="form-group"> <label class="col-md-2 control-label">手机端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/wap/coupon/receive/' + data["data"][i]["coupon_type_id"]) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/wap/coupon/receive/' + data["data"][i]["coupon_type_id"]) + '">复制链接</span> </div> </div> </div>';
                        }
                        if(data['addon_status']['is_minipro'] == 1) {
                            html += '<div class="form-group"> <label class="col-md-2 control-label">小程序端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + 'package/pages/coupon/receiveCoupon/index?couponId=' + data["data"][i]["coupon_type_id"] + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + 'package/pages/coupon/receiveCoupon/index?couponId=' + data["data"][i]["coupon_type_id"] + '">复制链接</span> </div> </div> </div>';
                        }
                        // if('<?php echo $is_pc_use; ?>' == 1){
                        //     html += ' <div class="form-group"> <label class="col-md-2 control-label">电脑端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '">复制链接</span> </div> </div> </div> ';
                        // }
                        html += '</form> <div class="flex link-flex">';
                        if(data['addon_status']['wap_status'] == 1) {
                            html += '<div class="flex-1"> <div class="mb-04"><img src="' + __URL('admin/goods/getGoodsDetailQr') + '?coupon_type_id=' + data["data"][i]["coupon_type_id"] + '&qr_type=1&wap_path=/wap/coupon/receive/" style="width: 100px;height: 100px"></div> <p>(手机端二维码)</p> </div> ';
                        }
                        if(data['addon_status']['is_minipro'] == 1){
                            html += '<div class="flex-1"> <div class="mb-04"><img src="'+ __URL('admin/goods/getGoodsDetailQr') +'?coupon_type_id='+ data["data"][i]["coupon_type_id"] +'&qr_type=2&mp_path=package/pages/coupon/receiveCoupon/index" style="width: 100px;height: 100px"></div> <p>(小程序二维码)</p> </div>';
                        }
                        html += ' </div> </div> </div> </a>';
                        // html += '<a class="btn-operation copy" href="javascript:void(0);" data-clipboard-text="<?php echo $receiveUrl; ?>/' + data["data"][i]["coupon_type_id"] + '">活动链接</a>';
                        html += '<a class="btn-operation" href="' + __URL('ADDONS_ADMIN_MAINcouponTypeInfo&coupon_type_id=' + data["data"][i]["coupon_type_id"]) + '" >详情</a>';
                        html += '<a class="btn-operation" href="' + __URL('ADDONS_ADMIN_MAINhistoryCoupon&coupon_type_id=' + data["data"][i]["coupon_type_id"]) + '" >记录</a>';
                        html += '<a class="btn-operation del text-red1" href="javascript:void(0);" data-id="' + data["data"][i]["coupon_type_id"] + '" >删除</a></td>';
                        html += '</tr>';
                    }
                } else {
                    html += '<tr align="center"><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
                }
                $("tbody").html(html);
                utilAdmin.tips();
                utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }

    //全选
    function CheckAll(event) {
        var checked = event.checked;
        $(".table-class tbody input[type = 'checkbox']").prop("checked", checked);
    }

    function deleteCouponType(coupon_type_id) {
        utilAdmin.alert('确定要删除吗?',function(){
            $.ajax({
                type: "post",
                url: "<?php echo $deleteCouponTypeUrl; ?>",
                data: {"coupon_type_id": coupon_type_id},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"]);
                        LoadingInfo($('#page_index').val());
                    } else if (data["code"] == -1) {
                        utilAdmin.message('已被领取或者未过期的优惠券不可删除！');
                    } else {
                        utilAdmin.message(data['message']);
                    }
                }
            })
        })
    }
    $("body").on("click",".del",function(){
        var coupon_type_id=$(this).attr("data-id");
        deleteCouponType(coupon_type_id);
    });
    $("body").on("click",".search_to",function(){
        LoadingInfo(1);
    });

  })
</script>

