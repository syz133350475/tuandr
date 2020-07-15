<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/distributorList.html";i:1587970154;}*/ ?>

        <form class="v-filter-container">
            <div class="filter-fields-wrap">
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label">推荐人</label>
                            <div class="v__controls">
                                <input type="text" id="referee_name" class="v__control_input" placeholder="推荐人用户名/昵称" autocomplete="off">
                            </div>
                        </div>
                        <div class="v__control-group">
                            <label class="v__control-label">分销商等级</label>
                            <div class="v__controls">
                                <input type="text" id="search_text" class="v__control_input" placeholder="分销商用户名/昵称" autocomplete="off">
                            </div>
                        </div>
                        <div class="v__control-group">
                            <label class="v__control-label">手机</label>
                            <div class="v__controls">
                                <input type="number" id="iphone" class="v__control_input" autocomplete="off">
                            </div>
                        </div>


                        <div class="v__control-group">
                            <label class="v__control-label">分销等级</label>
                            <div class="v__controls">
                                <select class="v__control_input" id="level">
                                    <option value="">请选择等级</option>
                                    <?php if(is_array($distributor_level) || $distributor_level instanceof \think\Collection || $distributor_level instanceof \think\Paginator): if( count($distributor_level)==0 ) : echo "" ;else: foreach($distributor_level as $key=>$value): ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['level_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label"></label>
                            <div class="v__controls">
                                <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

			<div class="screen-title">
				<span class="text">信息列表</span>
			</div>
<ul class="nav nav-tabs v-nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#all" aria-controls="all"  data-type="all" role="tab" data-toggle="tab" class="flex-auto-center alluser" data-id="5">全部<br><span class="all_count"></span></a></li>
	<li role="presentation"><a href="#audited" aria-controls="audited"  data-type="audited" role="tab" data-toggle="tab" class="flex-auto-center audited" data-id="2">已审核<br><span class="audited_count"></span></a></li>
	<li role="presentation"><a href="#pending" aria-controls="pending" data-type="pending" role="tab" data-toggle="tab" class="flex-auto-center pending" data-id="1">待审核<span class="pending_count"></span></a></li>
	<li role="presentation"><a href="#refused" aria-controls="refused" data-type="refused" role="tab" data-toggle="tab" class="flex-auto-center refused" data-id="-1">已拒绝<span class="refused_count"></span></a></li>
</ul>
			<table class="table v-table table-auto-center">
				<thead>
				<tr>
					<th>推荐人</th>
					<th>分销商</th>
					<th>手机</th>
					<th>分销等级/下级人数</th>
					<th>可用佣金/已提现佣金</th>
					<th>状态</th>
					<th class="col-md-2 pr-14 operationLeft">操作</th>
				</tr>
				</thead>
				<tbody id="list">

				</tbody>
			</table>
			<input type="hidden" id="page_index" value="">
			<nav aria-label="Page navigation" class="clearfix">
				<ul id="page" class="pagination pull-right"></ul>
			</nav>
<input type="hidden" id="merchant_status" value="<?php echo $merchant_status; ?>">
<input type="hidden" id="merchant_expire" value="<?php echo $merchant_expire; ?>">
			<!-- page end -->


<script>
    require(['util'],function(util){
        var status = 5;
        util.initPage(getList);
        var merchant_status= $("#merchant_status").val();
        var merchant_expire= $("#merchant_expire").val();
        function getList(page_index){
            $("#page_index").val(page_index);
            var level = $("#level").val();
            var search_text = $("#search_text").val();
            var referee_name = $("#referee_name").val();
            var iphone = $("#iphone").val();
            $.ajax({
                type : "post",
                url : '<?php echo $distributorListUrl; ?>',
                async : true,
                data : {
                    "page_index" : page_index, "referee_name" : referee_name,"search_text" : search_text, "level_id" : level, "isdistributor" : status,"iphone":iphone
                },
                success : function(data) {
                    if(data['page_count']>=3){
                        if(merchant_status==1){
                            var html = '';
                            html += '<div style="min-height: 100px;font-size: 16px;padding-top: 30px">免费版本数据量已达上限，需要继续使用请联系客服电话<span class="text-primary">400-889-6625</span>或<a href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT84941002&lng=cn" target="_blank" class="text-primary"><i class="icon-sale icon"></i>  QQ客服</a>！</div>';
                            util.confirm3('',html);
                        }
                    }
                    var html = '';
                    if (data["data"].length>0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            if(data['data'][i]["referee_id"]==null || data['data'][i]["referee_id"]==0){
                                html += '<td><span class="label label-success">总店</span></td>';
                            }else{
                                if(data['data'][i]["referee_headimg"]){
                                    html += '<td><img src="' + __IMG(data['data'][i]["referee_headimg"]) + '" width="30" height="30">';
                                }else{
                                    html += '<td><img src="/public/static/images/headimg.png" width="30" height="30">';
                                }
                                html += '<span class="block mt-04">' + data['data'][i]["referee_name"] + '</span></td>';
                            }
                            if(data['data'][i]["user_headimg"]){
                                html += '<td><img src="' + __IMG(data['data'][i]["user_headimg"]) + '" width="30" height="30">';
                            }else{
                                html += '<td><img src="/public/static/images/headimg.png" width="30" height="30">';
                            }
                            html += '<span class="block mt-04">' + data['data'][i]["user_name"] + '</span></td>';
                            if(data["data"][i]['isdistributor'] == 3){
                                html += '<td>需要完善分销资料</td>';
                            }else{
                                html += '<td>';
                                html += '<span class="block">' + data['data'][i]["mobile"] + '</span></td>';
                                html += '<td><span class="block">' + data['data'][i]["level_name"] + '</span>';
                                html += '<span class="block">' + data['data'][i]["distributor_number"] + '</span></td>';
                                html += '<td><p class="p">';
                                html += '<span class="label label-success">可用：'+ data["data"][i]["commission"] +'元</span>';
                                html += '</p>';
                                html += '<span class="label label-danger">已提现：'+ data["data"][i]["withdrawals"] +'元</span></td>';
                                if(data["data"][i]['isdistributor'] == 2){
                                    html += '<td><a href="javascript:;" class="label label-success">已审核</a></td>';
                                    if(merchant_expire==1){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else if(merchant_status==1 && data['page_count']>=3){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else{
                                        html += '<td class="operationLeft">';
                                        if(data["data"][i]['global_status']==1){
                                            html += '<a class="btn-operation becomeGlobal" href="javascript:void(0);"  data-id ='+ data['data'][i]['uid']+'>设为股东</a>';
                                        }
                                        if(data["data"][i]['area_status'] == 1){
                                            html += '<a class="btn-operation becomeArea" href="javascript:void(0);"  data-id ='+ data['data'][i]['uid']+'>设为区代</a>';
                                        }
                                        if(data["data"][i]['team_status'] == 1){
                                            html += '<a class="btn-operation becomeTeam" href="javascript:void(0);"  data-id ='+ data['data'][i]['uid']+'>设为队长</a>';
                                        }
                                        if(data["data"][i]['channel_status'] == 1){
                                            html += '<a class="btn-operation becomeChannel" href="javascript:void(0);"  data-id ='+ data['data'][i]['uid']+'>设为渠道商</a>';
                                        }
                                        if(data["data"][i]['microshop_status'] == 1){
                                            html += '<a class="btn-operation becomeMicroshop" href="javascript:void(0);"  data-id ='+ data['data'][i]['uid']+'>设为店长</a>';
                                        }
                                        html += '<a class="btn-operation update_referee" href="javascript:;" data-id="' + data['data'][i]['uid'] +'"  data-name="'+data['data'][i]['referee_name'] +'">修改上级</a>';
                                        html += '<a class="btn-operation" href="'+__URL('ADDONS_MAINdistributorInfo&distributor_id='+ data['data'][i]['uid']) +'">详情</a>';
                                        html += '<a class="btn-operation" href="' +__URL('ADDONS_MAINdistributorOrderList&distributor_id='+ data['data'][i]['uid']) +'">订单</a>';
                                        
                                        if(data['data'][i]['lower_id'].length>0){
                                            html += '<a class="btn-operation" href="' +__URL('ADDONS_MAINlowerDistributorList&types=1&distributor_id='+ data['data'][i]['uid']) +'">推广下线</a>';
                                        }
                                        
                                        html += '<a class="btn-operation del" href="javascript:;" data-id="' + data['data'][i]['uid'] +'">移除</a>';
                                        html += '</td>';
									}

                                }else if(data["data"][i]['isdistributor'] == 1){
                                    html += '<td><a href="javascript:;" class="label label-danger">待审核</a></td>';
                                    if(merchant_expire==1){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else if(merchant_status==1 && data['page_count']>=3){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else {
                                        html += '<td class="operationLeft"><a href="javascript:;" class="btn-operation isexamine save" data-type=2 data-id="' + data["data"][i]['uid'] + '">通过</a><a href="javascript:void(0);" class="btn-operation isexamine save" data-type=-1 data-id="' + data["data"][i]['uid'] + '">拒绝</a></td>';
                                    }
                                }else if(data["data"][i]['isdistributor'] == -1){
                                    html += '<td><a href="javascript:;" class="label label-danger">已拒绝</a></td>';
                                    if(merchant_expire==1){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else if(merchant_status==1 && data['page_count']>=3){
                                        html += '<td><a href="javascript:;">无权操作</a></td>';
                                    }else {
                                        html += '<td class="operationLeft"><a href="javascript:;" class="btn-operation isexamine save" data-type=2 data-id="' + data["data"][i]['uid'] + '">通过</a><a class="btn-operation del text-red1" data-id="' + data['data'][i]['uid'] + '">删除</a></td>';
                                    }
                                }
                            }
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $('.all_count').html('('+data['count']+')');
					$('.audited_count').html('('+data['count1']+')');
					$('.pending_count').html('('+data['count2']+')');
					$('.refused_count').html('('+data['count3']+')');
                    $("#list").html(html);
                    util.tips();becomeGlobal();becomeArea();becomeTeam();becomeChannel();becomeMicroshop();
                }
            });
        }
        //设为股东
        function becomeGlobal(){
            $('.becomeGlobal').on('click',function(){
                $(".tooltip.fade.top.in").remove();
                var uid = $(this).data('id');
                util.alert('确定把该会员设为股东？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo __URL('PLATFORM_MAIN/Member/becomeGlobal'); ?>",
                        async : true,
                        data : {
                            "uid" : uid
                        },
                        success : function(data) {
                            console.log('data',data)
                            if (data["code"] > 0) {
                                util.message(data["message"],'success',getList($("#page_index").val()));
                            }else{
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                })
            })
        }
        // 区域选择
        function becomeArea(){
            $('.becomeArea').on('click',function(){
                var uid = $(this).data('id');
                var url= __URL(PLATFORMMAIN + '/system/updateReferee3');
                util.confirm('选择区代信息','url:'+url,function(){
                    var area_agent = $("#area_agent").val();
                    var area_type = $("#area_type").val();
                    var selProvinces = $("#selProvinces").val();
                    var selCities = $("#selCities").val();
                    var selDistricts = $("#selDistricts").val();
                    
                    util.alert('确定把该会员设为区代？',function(){
                        $.ajax({
                        type: "post",
                        url : "<?php echo $updateDistributorInfoUrl; ?>",
                        data : {
                            "uid":uid,"area_agent" : area_agent,"area_id":area_type,"province_id":selProvinces,"city_id":selCities,"district_id":selDistricts
                        },
                        async: true,
                        success: function (data) {
                            if (data['code'] > 0) {
                                util.message(data["message"],'success',getList($("#page_index").val()));
                            } else {
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                })
                },'large')
            });
        }
        //设为区代
        // function becomeArea(){
        //     $('.becomeArea').on('click',function(){
        //         $(".tooltip.fade.top.in").remove();
        //         var uid = $(this).data('id');
        //         util.alert('确定把该会员设为股东？',function(){
        //             $.ajax({
        //                 type : "post",
        //                 url : "<?php echo __URL('PLATFORM_MAIN/Member/becomeArea'); ?>",
        //                 async : true,
        //                 data : {
        //                     "uid" : uid
        //                 },
        //                 success : function(data) {
        //                     if (data["code"] > 0) {
        //                         util.message(data["message"],'success',getList($("#page_index").val()));
        //                     }else{
        //                         util.message(data["message"],'danger');
        //                     }
        //                 }
        //             });
        //         })
        //     })
        // }
        //设为队长
        function becomeTeam(){
            $('.becomeTeam').on('click',function(){
                $(".tooltip.fade.top.in").remove();
                var uid = $(this).data('id');
                util.alert('确定把该会员设为队长？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo __URL('PLATFORM_MAIN/Member/becomeTeam'); ?>",
                        async : true,
                        data : {
                            "uid" : uid
                        },
                        success : function(data) {
                            if (data["code"] > 0) {
                                util.message(data["message"],'success',getList($("#page_index").val()));
                            }else{
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                })
            })
        }
        //设为渠道商
        function becomeChannel(){
            $('.becomeChannel').on('click',function(){
                $(".tooltip.fade.top.in").remove();
                var uid = $(this).data('id');
                util.alert('确定把该会员设为渠道商？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo __URL('PLATFORM_MAIN/Member/becomeChannel'); ?>",
                        async : true,
                        data : {
                            "uid" : uid
                        },
                        success : function(data) {
                            if (data["code"] > 0) {
                                util.message(data["message"],'success',getList($("#page_index").val()));
                            }else{
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                })
            })
        }
        //设为店长
        function becomeMicroshop(){
            $('.becomeMicroshop').on('click',function(){
                $(".tooltip.fade.top.in").remove();
                var uid = $(this).data('id');
                util.alert('确定把该会员设为店长？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo __URL('PLATFORM_MAIN/Member/becomeMicroshop'); ?>",
                        async : true,
                        data : {
                            "uid" : uid
                        },
                        success : function(data) {
                            if (data["code"] > 0) {
                                util.message(data["message"],'success',getList($("#page_index").val()));
                            }else{
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                })
            })
        }
        $('.search').on('click',function(){
            util.initPage(getList);
        });
        $('.alluser').on('click',function(){
            status = 5;
            util.initPage(getList);
        });
        $('.audited').on('click',function(){
            status = 2;
            util.initPage(getList);
        });
        $('.pending').on('click',function(){
            status = 1;
            util.initPage(getList);
        });
        $('.refused').on('click',function(){
            status = -1;
            util.initPage(getList);
        });
        $('body').on('click','.update_referee',function(){
            var uid = $(this).data('id');
            var name = $(this).data('name');
            if(name ==null){
                name = '总店';
			}
            var url= __URL(PLATFORMMAIN + '/system/updateReferee?uid='+uid+'&name='+name);
            util.confirm('修改所属上级','url:'+url,function(){
                var uid = this.$content.find('#uid').val();
                var referee_id = this.$content.find('#referee_id').val();
                $.ajax({
                    type : "post",
                    url : "<?php echo $updateRefereeDistributorUrl; ?>",
                    data : {
                        'uid':uid,
                        'referee_id' :referee_id
                    },
                    success : function(data) {
                        if (data['code'] > 0) {
                            util.message(data["message"], 'success', getList($("#page_index").val()));
                        } else {
                            util.message(data["message"], 'danger', getList($("#page_index").val()));
                        }
                    }
                });
            },'large')
        })
        $('body').on('click','.del',function(){
            var uid = $(this).data('id');
            util.alert('是否移除分销商？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo $checkDistributorUrl; ?>",
                    data:{'uid':uid},
                    async : true,
                    success : function(data) {
                        if(data["code"] > 0 ){
                            util.message('该分销商存在下级', 'danger');
                            var url= __URL(PLATFORMMAIN + '/system/updateReferees?uid='+uid);
                            util.confirm('分配直属下级的上级','url:'+url,function(){
                                var uid = this.$content.find('#uid').val();
                                var referee_id = this.$content.find('#referee_id').val();
                                $.ajax({
                                    type : "post",
                                    url : "<?php echo $updateLowerRefereeDistributorUrl; ?>",
                                    data : {
                                        'uid':uid,
                                        'referee_id' :referee_id
                                    },
                                    success : function(data) {
                                        if (data['code'] > 0) {
                                            util.message(data["message"], 'success');
                                            $.ajax({
                                                type : "post",
                                                url : "<?php echo $delDistributorUrl; ?>",
                                                data:{'uid':uid},
                                                async : true,
                                                success : function(data) {
                                                    if(data["code"] > 0 ){
                                                        util.message(data["message"], 'success', getList($("#page_index").val()));
                                                    }else{
                                                        util.message(data["message"], 'danger');
                                                    }
                                                }
                                            });
                                        }
                                    }
                                });
                            },'large')
                        }else{
							$.ajax({
                                    type : "post",
                                    url : "<?php echo $delDistributorUrl; ?>",
                                    data:{'uid':uid},
                                    async : true,
                                    success : function(data) {
                                        if(data["code"] > 0 ){
                                            util.message(data["message"], 'success', getList($("#page_index").val()));
                                        }else{
                                            util.message(data["message"], 'danger');
                                        }
                                    }
                                });
                        }
                    }
                });

            })
        })
        $('body').on('click','.save',function(){
            var status = $(this).data('type');
            var uid = $(this).data('id');
            if(status==-1){
                util.alert('确定审核不通过？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo $setStatusUrl; ?>",
                        data:{'uid':uid,'status':status},
                        async : true,
                        success : function(data) {
                            if(data["code"] > 0 ){
                                util.message(data["message"], 'success', getList($("#page_index").val()));
                            }else{
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                })
			}else{
                util.alert('确定审核通过？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo $setStatusUrl; ?>",
                        data:{'uid':uid,'status':status},
                        async : true,
                        success : function(data) {
                            if(data["code"] > 0 ){
                                util.message(data["message"], 'success', getList($("#page_index").val()));
                            }else{
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                })
			}
        })
    })
</script>
