<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/platform/miniProgramManage.html";i:1587970152;}*/ ?>

<table class="table table-bordered text-center mini-program-manage">
    <tbody>
    <tr>
        <td>
            <div class="box">
                <div class="tag"><i>1</i></div>
                <div class="qr">
                    <div><img src="<?php echo $testQrCodeUrl; ?>"></div>
                </div>
                <p>绑定体验者后，随时可以通过帐号查看最新效果</p>
                <div>
                    <button class="btn btn-primary" id="bind_tester">绑定体验者</button>
                </div>
            </div>
        </td>
        <td>
            <div class="box">
                <div class="tag"><i>2</i></div>
                <div class="qr">
                    <div><i class="icon icon-refresh"></i></div>
                </div>
                <p>发布将在<span class="text-bright">1~3个工作日</span>完成，发布状态自动下发微信通知</p>
                <div>
                        <button class="btn btn-success" id="public" disabled="disabled" value="<?php echo $status; ?>" >提交发布</button>
                    <div class="v-tooltip inline-block hidden" id="public_icon" >
                        <span class="tips-box"><i class="icon icon-index-guide"></i></span>
                        <div class="v-tooltip-box">
                            <div class="v-tooltip-box-arrow" style="width: 200px">
                                每天仅限撤回 <span class="text-bright"> 1 </span>次<br>
                                每月撤回不能超过<span class="text-bright"> 10  </span>次
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="box">
                <div class="tag"><i>3</i></div>
                <div class="qr">
                    <div><img src="<?php echo $mp_info['sun_code_url']; ?>" id="sunCode"></div>
                </div>
                <p>发布成功后下载太阳码<span class="text-bright">打印或转发</span>做推广</p>
                <div>
                    <a href="<?php echo $downSunCodeUrl; ?>?auth_id=<?php echo $mp_info['auth_id']; ?>" class="btn btn-primary">下载太阳码</a>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<input type="hidden" id="hidden_auth_id" value="<?php echo $mp_info['auth_id']; ?>">
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th>发布人</th>
        <th>发布状态</th>
        <th>发布时间</th>
        <th>备注</th>
    </tr>
    </thead>
    <tbody id="submit_list">
    </tbody>
</table>
<div id="tips1" style="display: none;">
    <div class="mb-10">当前小程序没有“服务类目”，请先前往微信商户平台添加类目再重新提交发布。</div>
    <div class="pull-right">
        <a href="https://mp.weixin.qq.com/" target="_blank" class="btn btn-success">前往公众平台</a>
        <a href="javascript:void(0);" class="btn btn-primary" id = "re-public">重新发布</a>
    </div>
</div>
<input type="hidden" id="page_index">
<input type="hidden" id="mplive" value="<?php echo $mplive; ?>">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>
<div id="saveTips" style="display: none">
    <div class="saving"></div>
    <div class="saveing-box">
        <div><img src="/public/platform/images/loading.svg" alt="" style="width: 80px;height: 80px"></div>
        <p>提交发布中</p>
    </div>
</div>


<script id="tpl_submit_list" type="text/html">
    <%each data as item item_id%>
    <tr>
        <td>
            <%item.user%>
        </td>
        <td>
            <%if item.status == 0%>
            <span class="text-success">审核通过</span>
            <%else if item.status == 1%>
            <span class="text-danger">审核失败</span>
            <%else if item.status == 2%>
            <span>审核中</span>
            <%else if item.status == 3%>
            <span class="text-danger">发布失败</span>
            <%else if item.status == 4%>
            <span class="text-success">发布成功</span>
            <%else%>
            <%/if%>
        </td>
        <td>
            <%item.submit_date%>
        </td>
        <td>
            <div class="max-w-auto margin-auto-temp text-left">
                <%item.review_message%>
            </div>
        </td>
    </tr>
    <%/each%>
</script>
<script>
    $(document).ready(function (){
        var public_style = $("#public").val();
        if (public_style == 2) {
            $("#public").attr("disabled", false);
            $("#public").text("撤回发布");
            $("#public").removeClass("btn-success");
            $("#public").addClass("btn-danger");
            $("#public_icon").removeClass("hidden");
        }
        //定时
        var check_satatus = setInterval(function(){
            $.ajax({
                type: "GET",
                url: "<?php echo $getPublicStatusUrl; ?>",
                success: function (data) {
                    if (data == 2) {
                        $("#public").attr("disabled", false);
                        $("#public").text("撤回发布");
                        $("#public").removeClass("btn-success");
                        $("#public").addClass("btn-danger");
                        $("#public_icon").removeClass("hidden");
                    } else if (data == 4) {
                        clearInterval(check_satatus);
                        $("#public").attr("disabled", false);
                        $("#public").text("提交发布");
                        $("#public").removeClass("btn-danger");
                        $("#public").addClass("btn-success");
                        $("#public_icon").addClass("hidden");
                    } else {
                        $("#public").attr("disabled", false);
                        $("#public").text("提交发布");
                        $("#public").removeClass("btn-danger");
                        $("#public").addClass("btn-success");
                        $("#public_icon").addClass("hidden");
                    }
                    $("#public").val(data);
                }
            })
        },3000)
    })
</script>
<script>
    require(["util", "tpl"], function (util, tpl) {

        util.initPage(LoadingInfo);
        // 绑定体验者
        $("#bind_tester").on('click', function () {
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">微信号<span class="red">*</span></label><div class="col-md-8"><input class="form-control" id="wchat_id"></div></div>';
            html += '</form>';
            var auth_id = $("#hidden_auth_id").val();
            util.confirm('绑定体验者', html, function () {
                //执行确认后的逻辑
                var wchat_id = $("#wchat_id").val();
                if (wchat_id == '') {
                    util.message('微信号不能为空')
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "<?php echo $bindMpTesterUrl; ?>",
                    data: {
                        'auth_id': auth_id,
                        'wchat_id': wchat_id
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success');
                        } else {
                            util.message(data["message"]);
                        }
                    }
                });
            })
        })

        // 提交发布/撤回审核
        $("#public").on('click', function () {
            var public_status = $("#public").val();
            if (public_status == 2) {
                util.alert("注意：小程序发布每天仅限撤回 <span class='text-bright'>1</span>次，每个月撤回不能超过<span class='text-bright'> 10 </span>次，确定撤回发布吗？", function(){
                    recall();
                })
            } else {
                $("#public").attr("disabled", true);
            $.ajax({
                type: "get",
                url: "<?php echo $isHasAppSecretUrl; ?>",
                success: function (data) {
                   //是否配置secret
                    if (data.code < 0) {
                        util.alert("<span style='color: red'>请前往小程序'基本设置'配置AppSecret，再发布</span>", function () {
                            window.location.href = __URL('ADDONS_MAINminiProgramSetting');
                        });
                    } else {
                      // 是否添加类目
                        $.ajax({
                            type: "get",
                url: "<?php echo $isUseMiniProgramUrl; ?>",
                success: function (data) {
                    if (data.code < 0) {
                        var result = data.data;
                        if (result.is_shop_open == 0) {
                                        util.alert("<span style='color: red'>请前往小程序“基本设置”打开小程序商城，再发布</span>", function () {
                                window.location.href = __URL('ADDONS_MAINminiProgramSetting');
                            });
                        } else if (result.is_has_category == 0) {
                            var html = $("#tips1").html();
                            util.confirm2("提示", html, 'medium');
                        } else {
                                  var mplive = $("#mplive").val();
                                 // 有小程序直播
                                 if (mplive == 1) {
                                    var text = "确定提交发布吗？如果小程序有直播权限请选择<span style='color: dodgerblue'>直播版</span>发布，如果没有直播权限请选择<span style='color: dodgerblue'>无直播版</span>发布";
                                    util.alert2buttons(text,function(e){
                                            commitMp(e);
                                            }
                                        )
                                            } else {
                                                // 无直播
                                                util.alert('确定提交发布吗？', function () {
                                                    commitMp(2);
                                                })
                                            }
                                    }
                                }
                            }
                         });
                      }
                 }
            });
            }
        })

        // 发布
        function commitMp(type) {
            $('#saveTips').show();
            $.ajax({
                type: "post",
                url: "<?php echo $commitUrl; ?>",
                data:{'type': type},
                success: function (data) {
                    $('#saveTips').hide();
                    if (data["code"] == 0) {
                        util.message(data["message"], 'success');
                        util.initPage(LoadingInfo);
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });

            // 发布改变状态
            $.ajax({
                type: "GET",
                url: "<?php echo $getPublicStatusUrl; ?>",
                success: function (data) {
                    if (data == 2) {
                        $("#public").attr("disabled", false);
                        $("#public").text("撤回发布");
                        $("#public").removeClass("btn-success");
                        $("#public").addClass("btn-danger");
                        $("#public_icon").removeClass("hidden");
                    } else {
                        $("#public").attr("disable", false);
                        $("#public").text("提交发布");
                        $("#public").removeClass("btn-danger");
                        $("#public").addClass("btn-success");
                        $("#public_icon").addClass("hidden");
                    }
                    $("#public").val(data);
                }
            })
        }
        // 重新发布
        $("body").on('click','#re-public',function (){
            $(".jconfirm").remove();
            commitMp()
        })
        // 撤回审核
        function recall() {
                $.ajax({
                type: "post",
                url: "<?php echo $recallcommitMpUrl; ?>",
                    success: function (data) {
                    if (data["code"] == 0) {
                        util.message(data["message"], 'success');
                        util.initPage(LoadingInfo);
                        } else {
                        util.message(data["message"], 'danger');
                        }
                    }
            });
        }
        // 发布列表加载
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo $submitListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "page_size": 5,
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('tpl_submit_list', data)) {
                            $("#submit_list").html(tpl('tpl_submit_list', data));
                        } else {
                            $("#submit_list").html(html);
                        }
                    } else {
                        $("#submit_list").html(html);
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count'],  // 动态修改总数
                        pageSize: 5 //动态修改每页条数
                    });
                }
            });
        }
    })
</script>

