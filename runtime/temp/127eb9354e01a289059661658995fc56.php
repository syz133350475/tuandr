<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"template/platform/Config/linksMinDialog.html";i:1583811744;}*/ ?>
<div class="links-dialog">

    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#mall" aria-controls="mall" role="tab" data-toggle="tab" class="flex-auto-center">商城页面</a></li>
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
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/index/index">商城首页</a>
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
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">消费卡列表</a>-->
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/property/account/index">提现账户</a>
                <?php if($config['shop']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/shop/collection/index">店铺收藏</a>
                <?php endif; ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/goods/collection/index">商品收藏</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/address/addresslist/index">收货地址</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/account/set/index">账号设置</a>

                <?php if($config['seckill'] ||  $config['bargain'] || $config['presell'] || $config['groupshopping'] || $config['coupontype']): ?>
                <div class="linkDialog-title">营销活动</div>
                <?php endif; if($config['seckill']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/seckill/list/index">秒杀列表</a>
                <?php endif; if($config['bargain']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/bargain/list/index">砍价列表</a>
                <?php endif; if($config['presell']): ?>
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">预售列表</a>-->
                <?php endif; if($config['groupshopping']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/assemble/list/index">拼团列表</a>
                <?php endif; if($config['coupontype']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/coupon/centre/index">领券中心</a>
                <?php endif; if($config['distribution']): ?>
                <div class="linkDialog-title">分销业务</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/centre/index">分销中心</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/order/index">分销订单</a>
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">分销佣金</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">佣金提现</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">佣金明细</a>-->
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/team/index">分销团队</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/customer/index">分销客户</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/commission/qrcode/index">分销推广码</a>
                <?php endif; if($config['areabonus']): ?>
                <div class="linkDialog-title">分红业务</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/bonus/centre/index">分红中心</a>
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">分红金额</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">分红明细</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">分红订单</a>-->
                <?php endif; if($config['integral']): ?>
                <div class="linkDialog-title">积分商城</div>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/integral/index/index">商城首页</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/integral/category/category">商品分类</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="package/pages/integral/goods/list/list">商品列表</a>
                <?php endif; if($config['channel'] ||  $config['microshop']): ?> 
                <div class="linkDialog-title">其他模块</div>
                <?php endif; if($config['channel']): ?>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/channel/centre/index">微商中心</a>   
                <?php endif; if($config['microshop']): ?>
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">微店中心</a>-->
                <?php endif; ?>
                <!--<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">任务中心</a>
                <a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="">奖品列表</a>-->
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
    //获取自定义页面链接
    function getCustomOfDiy() {
        $.ajax({
            type: "post",
            url: __URL('platform/addons/execute/addons/miniprogram/controller/miniprogram/action/miniprogramcustomlist'),
            data: {
                "template_type": 'diy'
            },
            success: function (data) {
                var html = "";
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {
                        var curr = data['data'][i];
                        html += '<a href="javascript:void(0);" class="btn btn-default selectedPage" data-link="pages/custom/index?id='+curr.id+'">' + curr.template_name + '</a> ';
                    }
                } else {
                    html += '<div class="padding-15" style="text-align: center">暂无符合条件的数据记录</div>';
                }
                $("#diy_custom").html(html);
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
        url: __URL(PLATFORMMAIN + '/custom_template_api/getshopcategory'),
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
            url: __URL(PLATFORMMAIN + '/shop/getSearchGoods'),
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
        selecteddata('category','/goods/list?category_id=' + cid1 + '&text=' + cname1);
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
        selecteddata('category','/goods/list?category_id=' + cid2 + '&text=' + cname2);
    });
    $('#sort3').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        cname3 = $(this).text();
        cid3 = $(this).data('id');
        canClose = !0;
        // console.log('一级分类id==>',cid1 + '；二级分类id==>' + cid2 + '；三级分类id==>' + cid3);
        $('#selectedSort').html(cname1 +' > '+ cname2 +' > '+ cname3);
        selecteddata('category','/goods/list?category_id=' + cid3  + '&text=' + cname3);
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