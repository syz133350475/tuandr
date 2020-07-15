<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"template/admin/Shop/linksMinDialog.html";i:1587970148;}*/ ?>
<div class="links-dialog">

    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#mall" aria-controls="mall" role="tab" data-toggle="tab" class="flex-auto-center">商城页面</a></li>
        <li role="presentation"><a href="#active" aria-controls="active" role="tab" data-toggle="tab" class="flex-auto-center">活动链接</a></li>
        <li role="presentation"><a href="#diy" aria-controls="diy" role="tab" data-toggle="tab" class="flex-auto-center">自定义页</a></li>
        <li role="presentation"><a href="#category" aria-controls="category" role="tab" data-toggle="tab" class="flex-auto-center">商品分类</a></li>
        <li role="presentation"><a href="#shopGoods" aria-controls="shopGoods" role="tab" data-toggle="tab" class="flex-auto-center">商品</a></li>
        <!--<li role="presentation"><a href="#links" aria-controls="links" role="tab" data-toggle="tab" class="flex-auto-center">链接</a></li>-->
    </ul>
    <div class="tab-content min-h-200">
        <div role="tabpanel" class="tab-pane fade in active" id="mall">
            <!--<p class="form-control-static">请选择要跳转的页面</p>-->
            <div class="" id="custom">
                <div class="linkDialog-title">商城基础</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/index/index">店铺首页</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/category/index">商品分类</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/goodlist/index">商品列表</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/shopcart/index">购物车</a>
                <?php if($config['shop']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/shop/home/index?shopId=<?php echo $shop_id; ?>">店铺首页</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/shop/list/index">店铺街</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/shop/centre/index">商家入驻</a>
                <?php endif; ?>
                

                <div class="linkDialog-title">会员中心</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/member/index">会员中心</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/order/list/index">订单列表</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/myProperty/index">会员资产</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/balance/index">余额</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/withdraw/index">余额提现</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/recharge/index">余额充值</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/log/index">余额明细</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/points/index">积分</a>
                <?php if($config['coupontype']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/coupon/list/index">优惠券列表</a>
                <?php endif; ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/giftvoucher/list/index">礼品券列表</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/consumercard/detail/index">消费卡列表</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/account/index">提现账户</a>
                <?php if($config['shop']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/shop/collection/index">店铺收藏</a>
                <?php endif; ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/goods/collection/index">商品收藏</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/address/addresslist/index">收货地址</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/account/set/index">账号设置</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/messageCenter/index">消息列表</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/course/list/index">课程列表</a>

                <?php if($config['seckill'] ||  $config['bargain'] || $config['presell'] || $config['groupshopping'] || $config['coupontype']): ?>
                <div class="linkDialog-title">营销活动</div>
                <?php endif; if($config['seckill']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/seckill/list/index">秒杀列表</a>
                <?php endif; if($config['bargain']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/bargain/list/index?shop_id=<?php echo $shop_id; ?>">砍价列表</a>
                <?php endif; if($config['presell']): ?>
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">预售列表</a>-->
                <?php endif; if($config['groupshopping']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/assemble/list/index?shop_id=<?php echo $shop_id; ?>">拼团列表</a>
                <?php endif; if($config['coupontype']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/coupon/centre/index">领券中心</a>
                <?php endif; if($config['memberprize']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/prize/list/list">奖品列表</a>
                <?php endif; if($config['distribution']): ?>
                <div class="linkDialog-title">分销业务</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/centre/index">分销中心</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/order/index">分销订单</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/detail/index">分销佣金</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/withdraw/index">佣金提现</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/log/index">佣金明细</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/team/index">分销团队</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/customer/index">分销客户</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/qrcode/index">分销推广码</a>
                <?php endif; if($config['areabonus']): ?>
                <div class="linkDialog-title">分红业务</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/bonus/centre/index">分红中心</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/bonus/detail/index">分红金额</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/bonus/log/index">分红明细</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/bonus/order/index">分红订单</a>
                <?php endif; if($config['integral']): ?>
                <!--<div class="linkDialog-title">积分商城</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">商城首页</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">商品分类</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">商品列表</a>-->
                <?php endif; if($config['channel'] ||  $config['microshop']): ?> 
                <div class="linkDialog-title">其他模块</div>
                <?php endif; if($config['channel']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/channel/centre/index">微商中心</a>
                <?php endif; if($config['microshop']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/microshop/centre/centre">微店中心</a>
                <?php endif; if($config['taskcenter']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/task/centre/index">任务中心</a>
                <?php endif; if($config['liveshopping']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/live/square/index">全渠道直播广场</a>
                <?php endif; if($config['miniprogram']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/mplive/index">小程序直播广场</a>
                <?php endif; if($config['thingcircle']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="packageSecond/pages/goodthingcircle/home/index">好物圈</a>
                <?php endif; ?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="active">
            <div class="linkDialog-title">领取优惠券</div>
            <div id="coupon_receive">
            </div>
            <div class="linkDialog-title">领取礼品券</div>
            <div id="voucher_receive">
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="diy">
            <p class="form-control-static">请选择要跳转的页面</p>
            <div class="" id="diy_custom">

            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="category">
            <p class="form-control-static">请选择要跳转的分类页<span class="pull-right small-muted">你选择的分类是：<b id="selectedSort"></b></span></p>
            <div class="category-group flex">
                <div class="list flex-1" id="sort1"></div>
                <div class="list flex-1" id="sort2"></div>
                <div class="list flex-1" id="sort3"></div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="shopGoods">
            <p class="form-control-static">请选择要跳转的商品</p>
            <form class="form-horizontal">
                <div class="input-group mb-10">
                    <input type="text" class="form-control" id="search_text" placeholder="请输入商品名称">
                    <span class="input-group-btn"><button type="button" class="btn btn-primary" id="search_goods">搜索</button></span>
                </div>
                <div class="links-list">
                </div>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="links">
            <p class="form-control-static">请输入要跳转的链接</p>
            <form class="form-horizontal padding-15">
                <div class="form-group">
                    <label class="col-md-2 control-label">链接</label>
                    <div class="col-md-9">
                        <input type="text" id="link" class="form-control" placeholder="请输入链接，以http或https开头">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <input type="hidden" id="selectedData">
</div>
<script>
    getCustomOfDiy();
    getCustomOfCoupon();//优惠券
    getCustomOfVoucher();//优惠券
    //获取自定义页面链接
    function getCustomOfDiy() {
        $.ajax({
            type: "post",
            url: __URL('admin/addons/execute/addons/miniprogram/controller/miniprogram/action/miniprogramcustomlist'),
            data: {
                "template_type": 'diy'
            },
            success: function (data) {
                var html = "";
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {
                        var curr = data['data'][i];
                        html += '<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/custom/index?id='+curr.id+'&shop_id='+curr.shop_id+'" >' + curr.template_name + '</a> ';
                    }
                } else {
                    html += '<div class="padding-15" style="text-align: center">暂无符合条件的数据记录</div>';
                }
                $("#diy_custom").html(html);
            }
        });
    };
    //获取优惠券链接
    function getCustomOfCoupon() {
        $.ajax({
            type: "post",
            url: __URL('admin/addons/execute/addons/coupontype/controller/Coupontype/action/couponTypeList'),
            data: {
                "page_size": 0,
                "end_receive_time": true,//领取结束时间大于当前时间才行
            },
            success: function (data) {
                var html = "";
                if (data['addon_status']['is_minipro'] == 1) {
                    if (data['data'].length > 0) {
                        for (var i = 0; i < data['data'].length; i++) {
                            var curr = data['data'][i];
                            html += '<a href="javascript:void(0);" class="btn btn-default selectedCouponPage" data-link="package/pages/coupon/receiveCoupon/index?couponId='+curr.coupon_type_id+'">' + curr.coupon_name + '</a> ';
                        }
                    } else {
                        html += '<div class="padding-15" style="text-align: center">暂无符合条件的数据记录</div>';
                    }
                }
                $("#coupon_receive").html(html);
            }
        });
    };
    //获取礼品券链接
    function getCustomOfVoucher() {
        $.ajax({
            type: "post",
            url: __URL('admin/addons/execute/addons/giftvoucher/controller/Giftvoucher/action/giftvoucherList'),
            data: {
                "page_size": 0,
                "end_receive_time": true, //领取结束时间大于当前时间才行
            },
            success: function (data) {
                var html = "";
                if (data['addon_status']['is_minipro'] == 1) {
                    if (data['data'].length > 0) {
                        for (var i = 0; i < data['data'].length; i++) {
                            var curr = data['data'][i];
                            html += '<a href="javascript:void(0);" class="btn btn-default selectedVoucherPage" data-link="package/pages/giftvoucher/receive/index?gift_voucher_id=='+curr.promotion_gift_id+'">' + curr.giftvoucher_name + '</a> ';
                        }
                    } else {
                        html += '<div class="padding-15" style="text-align: center">暂无符合条件的数据记录</div>';
                    }
                }
                $("#voucher_receive").html(html);
            }
        });
    };
</script>
<script>

$(function () {
    var dataJson;
    var l1 = 0,
        l2 = 0;
    var cname1, cname2, cname3;
    var canClose = !1;

    // 获取装修页面数据
    // $.ajax({
    //     type: "post",
    //     data: {},
    //     url: __URL(PLATFORMMAIN + '/custom_template_api/getCustomList'),
    //     success:function (res) {
    //         //console.log(res);
    //         var html = '';
    //         $.each(res, function (k, v) {
    //             html += '<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="' + v.link + '">' + v.name + '</a> ';
    //         })
    //         $("#custom").html(html);
    //     }
    // });

    // 获取分类数据
    $.ajax({
        type: "post",
        data: {},
        url: __URL(ADMINMAIN + '/custom_template_api/getshopcategory'),
        success: function (res) {
            dataJson = res;
            fillData();
        }
    });
    // 搜索商品
    $("#search_goods").on('click', function () {
        $.ajax({
            type: "post",
            data: {
                "search_text": $("#search_text").val()
            },
            url: __URL(ADMINMAIN + '/config/getSearchGoods'),
            success: function (res) {
                var data = res['data'];
                var html = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        var curr = data[i];
                        html += '<div class="item">';
                        html += '<div class="media">';
                        html += '<div class="media-left">';
                        if (curr["picture_info"] != null) {
                            html += '<img src="' + __IMG(curr["picture_info"]['pic_cover_micro']) + '" alt="" width="60" height="60">';
                        } else {
                            html += '<img src="http://iph.href.lu/60x60?text=60x60" alt="" width="60" height="60">'
                        }
                        html += '</div>';
                        html += '<div class="media-body max-w-300">';
                        html += '<div class="line-2-ellipsis">' + curr["goods_name"] + '</div>';
                        html += '<div class="line-1-ellipsis text-danger">' + curr['price'] + '</div>';
                        html += '<div class="line-1-ellipsis">' + curr['shop_name'] + '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '<a href="javascript:void(0);" class="btn btn-default selectedGoods" data-id="' + curr["goods_id"] + '">选择</a>';
                        html += '</div>';
                    }
                } else {
                    html += '暂无符合条件的数据记录';
                }
                $("#shopGoods").find(".links-list").html(html);
            }
        });
    })
    // 选中商品
    $('.links-dialog').on('click','.selectedGoods', function () {
        // console.log($(this).data('id'));
        selecteddata('goods', 'pages/goods/detail/index?goodsId=' + $(this).data('id'))
    })
    // 选中页面
    $('.links-dialog').on('click','.selectedPage',function(){
        $(this).siblings().removeClass('btn-primary');
        $(this).addClass('btn-primary');
        selecteddata('page',$(this).data('link'))
    })
    // 优惠券选中页面
    $('.links-dialog').on('click','.selectedCouponPage',function(){
        $(this).siblings().removeClass('btn-primary');
        $(this).addClass('btn-primary');
        selecteddata('page',$(this).data('link'))
    })
    // 礼品券选中页面
    $('.links-dialog').on('click','.selectedVoucherPage',function(){
        $(this).siblings().removeClass('btn-primary');
        $(this).addClass('btn-primary');
        selecteddata('page',$(this).data('link'))
    })

    $('#sort1').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        $('#sort3').html('');
        fillData($(this).index());
        l1 = $(this).index();
        cname1 = $(this).text();
        cid1 = $(this).data('id');
        canClose = !1;
        // console.log('一级分类id==>',cid1);
        $('#selectedSort').html(cname1);
        selecteddata('category','pages/goodlist/index?category_id=' + cid1 + '&category_name=' + cname1);
    });
    $('#sort2').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        fillData(l1, $(this).index());
        l2 = $(this).index();
        cname2 = $(this).text();
        cid2 = $(this).data('id');
        canClose = !1;
        // console.log('一级分类id==>',cid1 + '；二级分类id==>' + cid2);
        $('#selectedSort').html(cname1 +' > '+ cname2);
        selecteddata('category','pages/goodlist/index?category_id=' + cid2 + '&category_name=' + cname2);
    });
    $('#sort3').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        cname3 = $(this).text();
        cid3 = $(this).data('id');
        canClose = !0;
        // console.log('一级分类id==>',cid1 + '；二级分类id==>' + cid2 + '；三级分类id==>' + cid3);
        $('#selectedSort').html(cname1 +' > '+ cname2 +' > '+ cname3);
        selecteddata('category','pages/goodlist/index?category_id=' + cid3  + '&category_name=' + cname3);
    });
    function fillData(l1, l2) {
        var temp_html = "";
        if (typeof(dataJson.data) != 'undefined' && arguments.length == 0) {
            $.each(dataJson.data, function(i, e) {
                temp_html += '<a href="javascript:void(0);" class="item" data-id="' + e.category_id + '">' + e.short_name + '</a>';
            });
        } else if (typeof(dataJson.data[l1].child_list) != 'undefined' && arguments.length == 1) {
            $.each(dataJson.data[l1].child_list, function(i, e) {
                temp_html += '<a href="javascript:void(0);" class="item" data-id="' + e.category_id + '">' + e.short_name + '</a>';
            });
        } else if (typeof(dataJson.data[l1].child_list[l2].child_list) != 'undefined' && arguments.length == 2) {
            $.each(dataJson.data[l1].child_list[l2].child_list, function(i, e) {
                temp_html += '<a href="javascript:void(0);" class="item" data-id="' + e.category_id + '">' + e.short_name + '</a>';
            });
        }
        $('.category-group .list:eq(' + arguments.length + ')').html(temp_html);
    }

    // 直接输入链接焦点离开事件
    $("#link").on('blur', function () {
        selecteddata('link', $(this).val());
    })

    function selecteddata(type,params){
        var selecteddata = {
            type:type,
            params:params
        }
        $('#selectedData').data(selecteddata);
    }
    
})
</script>