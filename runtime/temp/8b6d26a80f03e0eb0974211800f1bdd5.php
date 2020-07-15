<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/addShop.html";i:1583811694;}*/ ?>





        <ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
            <li role="presentation" class="active"><a href="#shop_info" aria-controls="shop_info" role="tab" data-toggle="tab" class="flex-auto-center">店铺信息</a></li>
            <li role="presentation"><a href="#shop_apply" aria-controls="shop_apply" role="tab" data-toggle="tab" class="flex-auto-center">注册信息</a></li>
        </ul>
        <!-- page -->
        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active tab-1" id="shop_info" >
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>店铺名称</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" value="<?php echo $info['shop_name']; ?>" id="shop_name" placeholder="请输入店铺名称" name="shop_name" required title="店铺名称不能为空">
                        </div>
                    </div>
                    <?php if(!$info['shop_id'] && $info['shop_id']!='0'): ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>选择会员</label>
                        <div class="col-md-5">
                            <p class="form-control-static"><a href="javascript:void(0);" class="text-primary updateDis" >选择会员</a></p>
                            
                            <p class="help-block">选择一位商城会员成为店铺卖家，没有会员？<a href="javascript:void(0);" class="text-primary addUsers" >点击前往添加</a></p>
                            <div class="showUser media text-left hide ">
                                <div class="media-left"><img id="actar" src="/public/static/images/headimg.png" style="max-width:none;width:60px;height:60px;"></div>
                                <div class="media-body break-word">
                                    <div class="line-2-ellipsis nick_name"></div>
                                    <div class="line-1-ellipsis text-danger mobile"></div>
                                    <div class="line-1-ellipsis text-danger mobiletxt"></div>
                                    <div class="line-1-ellipsis text-danger uid " hidden></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group hide addiphone">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手机号码</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" id="iphone" name="iphone">
                        </div>
                    </div>
                    <div class="form-group hide addpassword">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>密码</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" id="password" name="password"> 
                        </div>
                    </div>
                    <?php endif; if($info['shop_id']): ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>手机号码</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" value="<?php echo $info['user_tel']; ?>"  disabled>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>所属分类</label>
                        <div class="col-md-5">
                            <select id="shop_group_id" name="shop_group_id" class="form-control" required title="请选择分类">
                                <option value="">请选择</option>
                                <?php if(is_array($group_list) || $group_list instanceof \think\Collection || $group_list instanceof \think\Paginator): if( count($group_list)==0 ) : echo "" ;else: foreach($group_list as $key=>$vg): ?>
                                <option value="<?php echo $vg['shop_group_id']; ?>" <?php if($info['shop_group_id'] == $vg['shop_group_id']): ?> selected <?php endif; ?>><?php echo $vg['group_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <?php if($info['shop_id']!='0'): ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>店铺版本</label>
                        <div class="col-md-5">
                            <select id="shop_type" name="shop_type" class="form-control" required title="请选择店铺版本">
                                <option value="">请选择</option>
                                <?php if(is_array($type_list) || $type_list instanceof \think\Collection || $type_list instanceof \think\Paginator): if( count($type_list)==0 ) : echo "" ;else: foreach($type_list as $key=>$vt): ?> 
                                <option value="<?php echo $vt['instance_typeid']; ?>" <?php if($info['shop_type'] == $vt['instance_typeid']): ?> selected <?php endif; ?>><?php echo $vt['type_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                        <!--                <div class="col-md-5 help-block">
                                            没有店铺版本？去<a href="" target="_blank" class="text-primary">新建</a>，新建完点刷新
                                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">平台抽成</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="number" class="form-control" min="0" max="100" id="shop_platform_commission_rate" name="shop_platform_commission_rate" value="<?php echo $info['shop_platform_commission_rate']; ?>">
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">保证金</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="margin" value="<?php echo $info['margin']; ?>" name="margin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">店铺状态</label>
                        <div class="col-md-5">
                            <div class="switch-inline">
                                <input type="checkbox" id="shop_state" name="shop_state" <?php if($info['shop_state'] == 1): ?> checked <?php endif; ?>>
                                       <label for="shop_state" class=""></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">审核入驻店商品</label>
                        <div class="col-md-5">
                            <div class="switch-inline">
                                <input type="checkbox" id="shop_audit" name="shop_audit" <?php if($info['shop_audit'] == 1): ?> checked <?php endif; ?>>
                                       <label for="shop_audit" class=""></label>
                            </div>
                            <p class="help-block">开启后该商家发布的商品都需要平台审核才能上架</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">排序</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" id='shop_sort' value="<?php echo $info['shop_sort']; ?>" name="sort">
                        </div>
                    </div>
                    
                    <?php endif; ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in tab-2" id="shop_apply">
                    <div class="screen-title"><span class="text">企业或个人信息</span></div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">申请类型</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" name="apply_type" value="1" <?php if($shop_info['apply_type']==1): ?> checked="checked" <?php endif; ?>> 个人
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="apply_type" value="2" <?php if($shop_info['apply_type']==2 || !$shop_info['apply_type']): ?> checked="checked" <?php endif; ?>> 企业
                            </label>
                        </div>
                    </div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">公司名称</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="请输入公司名称" value="<?php echo $shop_info['company_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-2 control-label fw J-per">联系地址</label>
                        <label for="address" class="col-md-2 control-label fw J-company">公司所在地</label>
                        <div class="col-md-5">
                            <div class="area-form-group">
                                <select name="province" id="selProvinces"  class="form-control getProvince">
                                        <option value="-1">请选择省...</option>
                                </select>
                                <select name="city" id="selCities"  class="form-control getSelCity">
                                        <option value="-1">请选择市...</option>
                                </select>
                                <select name="district" id="selDistricts" class="form-control">
                                        <option value="-1">请选择区...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label J-per">详细地址</label>
                        <label class="col-md-2 control-label  J-company">公司详细地址</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="company_address_detail" name="company_address_detail" placeholder="请输入公司详细地址" value="<?php echo $shop_info['company_address_detail']; ?>">
                        </div>
                    </div>
                     <div class="form-group J-company">
                        <label class="col-md-2 control-label">公司类型</label>
                        <div class="col-md-5">
                            <select id="company_type" name="company_type" class="form-control">
                                <option value="私企" <?php if($shop_info['company_type'] == '私企'): ?> selected <?php endif; ?>>私企</option>
                                <option value="个体" <?php if($shop_info['company_type'] == '个体'): ?> selected <?php endif; ?>>个体</option>
                                <option value="外企" <?php if($shop_info['company_type'] == '外企'): ?> selected <?php endif; ?>>外企</option>
                                <option value="中外合资" <?php if($shop_info['company_type'] == '中外合资'): ?> selected <?php endif; ?>>中外合资</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">公司电话</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="请输入公司电话" value="<?php echo $shop_info['company_phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">员工总数</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" min='0' id="company_employee_count" name="company_employee_count" placeholder="请输入员工总数" value="<?php echo $shop_info['company_employee_count']; ?>">
                        </div>
                    </div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">注册资金（万元）</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" min='0' id="company_registered_capital" name="company_registered_capital" placeholder="请输入注册资金" value="<?php echo $shop_info['company_registered_capital']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">联系人姓名</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="contacts_name" name="contacts_name" placeholder="请输入联系人姓名" value="<?php echo $shop_info['contacts_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">联系人电话</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="contacts_phone" name="contacts_phone" placeholder="请输入联系人电话" value="<?php echo $shop_info['contacts_phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">电子邮箱</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="contacts_email" name="contacts_email" placeholder="请输入电子邮箱" value="<?php echo $shop_info['contacts_email']; ?>">
                        </div>
                    </div>
                    <div class="screen-title  J-company"><span class="text">营业执照信息（副本）</span></div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">营业执照号</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="business_licence_number" name="business_licence_number" placeholder="请输入营业执照号" value="<?php echo $shop_info['business_licence_number']; ?>">
                        </div>
                    </div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">法定经营范围</label>
                        <div class="col-md-5">
                            <textarea class="form-control" id="business_sphere" name="business_sphere"><?php echo $shop_info['business_sphere']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group J-company">
                        <label class="col-md-2 control-label">营业执照照片</label>
                        <div class="col-md-5 picture-list" id='business_licence_number_electronic'>
                            <?php if($shop_info['business_licence_number_electronic'] == ''): ?>
                            <a href="javascript:;" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php else: ?>
                            <a href="javascript:;" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="<?php echo __IMG($shop_info['business_licence_number_electronic']); ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="screen-title"><span class="text">身份证信息</span></div>
                    <div class="form-group">
                        <label class="col-md-2 control-label J-per">身份证号码</label>
                        <label class="col-md-2 control-label J-company">法人身份证号码</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="contacts_card_no" name="contacts_card_no" placeholder="请输入身份证号码" value="<?php echo $shop_info['contacts_card_no']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label J-per">手持身份证照片</label>
                        <label class="col-md-2 control-label J-company">法人手持身份证照片</label>
                        <div class="col-md-5 picture-list" id='contacts_card_electronic_1'>
                            <?php if($shop_info['contacts_card_electronic_1'] == ''): ?>
                            <a href="javascript:;" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php else: ?>
                            <a href="javascript:;" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="<?php echo $shop_info['contacts_card_electronic_1']; ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label J-per">身份证正面</label>
                        <label class="col-md-2 control-label J-company">法人身份证正面</label>
                        <div class="col-md-5 picture-list" id='contacts_card_electronic_2'>
                            <?php if($shop_info['contacts_card_electronic_2'] == ''): ?>
                            <a href="javascript:;" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php else: ?>
                            <a href="javascript:;" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="<?php echo $shop_info['contacts_card_electronic_2']; ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label J-per">身份证反面</label>
                        <label class="col-md-2 control-label J-company">法人身份证反面</label>
                        <div class="col-md-5 picture-list" id='contacts_card_electronic_3'>
                            <?php if($shop_info['contacts_card_electronic_3'] == ''): ?>
                            <a href="javascript:;" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php else: ?>
                            <a href="javascript:;" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="<?php echo $shop_info['contacts_card_electronic_3']; ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group"></div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8">
                        <button class="btn btn-primary J-add" type="submit"><?php if($info): ?>保存<?php else: ?>添加<?php endif; ?></button>
                        <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="shop_id" name="shop_id" value="<?php echo $info['shop_id']; ?>">
            <input type="hidden" id="pid" name="pid" value="<?php echo $shop_info['company_province_id']; ?>">
            <input type="hidden" id="cid" name="cid" value="<?php echo $shop_info['company_city_id']; ?>">
            <input type="hidden" id="aid" name="aid" value="<?php echo $shop_info['company_district_id']; ?>">
        </form>

        <!-- page end -->


<script>
    require(['util'], function (util) {
        //添加新会员 addUsers
        $('body').on('click','.addUsers',function(){
            var url = "<?php echo __URL('PLATFORM_MAIN/member/addUsers'); ?>"
            window.location.href=url
        })
        // 选择会员
        $('body').on('click','.updateDis',function(){
            var url= __URL(PLATFORMMAIN + '/system/updateReferee2');
            util.confirm('选择会员','url:'+url,function(){
                var uid = this.$content.find('#referee_id').val();
                var urls = __URL(PLATFORMMAIN + '/member/getUser');
                if(uid){
                    $.ajax({
                        type : "post",
                        url : urls,
                        data : {
                            'uid':uid,
                        },
                        success : function(data) {
                            if(data.data.user.user_headimg){
                                $('#actar').attr("src",data.data.user.user_headimg);
                            }
                            if(data.data.user.user_name){
                                $('.nick_name').html(data.data.user.user_name);
                            }else if(data.data.user.nick_name){
                                $('.nick_name').html(data.data.user.nick_name);
                            }
                            
                            $('.uid').html(data.data.user.uid);
                            if(data.data.user.user_tel){
                                $('.mobile').html(data.data.user.user_tel);
                                $('.mobiletxt').html("");
                            }else{
                                $('.mobiletxt').html("该会员未关联手机号码与密码，请补充信息");
                                $('.mobile').html("");
                            }
                            $('.showUser').removeClass('hide');
                            if(data.data.user.user_tel == ''){
                                $('.addiphone').removeClass('hide');
                                $("#iphone").attr('required', 'required');
                                $('.addpassword').removeClass('hide');
                                $("#password").attr('required', 'required');
                            }else{
                                $('.addiphone').addClass('hide');
                                $("#iphone").removeAttr('required');
                                $('.addpassword').addClass('hide');
                                $("#password").removeAttr('required');
                            }
                        }
                    });
                }
            },'large')
        });
        $(document).ready(function(){
            var apply_type = $('input[name=apply_type]:checked').val();
            if(apply_type==1){
                $('.J-per').show();
                $('.J-company').hide();
            }else{
                $('.J-per').hide();
                $('.J-company').show();
            }
        });
        var pid=0,cid=0,aid=0;
        initProvince("#selProvinces");
        function initProvince(obj){
            pid = $('#pid').val();
            $.ajax({
                type : "post",
                url : "<?php echo $getProvinceUrl; ?>",
                dataType : "json",
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            if(pid == data[i].province_id){
                                str += '<option selected value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }
                        }
                        $(obj).append(str);
                    }
                }
            });
        }
        getProvince();
        //选择省份弹出市区
        $('.getProvince').on('change', function () {
            var id = $('#selProvinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo $getCityUrl; ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#selCities').html(str);
                    }
                }
            });
        })
        function getProvince() {
            var id = $('#selProvinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo $getCityUrl; ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#selCities').html(str);
                    }
                }
            });
        };
        getSelCity();
        //选择市区弹出区域
        $('.getSelCity').on('change', function () {
            var id = $('#selCities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo $getDistrictUrl; ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#selDistricts').html(str);
                    }
                }
            });
        })
        function getSelCity() {
            var id = $('#selCities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo $getDistrictUrl; ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#selDistricts').html(str);
                    }
                }
            });
        }
        
        $('input[name=apply_type]').change(function(){
            if($(this).val()==='1'){
                $('.J-per').show();
                $('.J-company').hide();
            }else{
                $('.J-per').hide();
                $('.J-company').show();
            }
        });
       
        //添加店铺
        util.validate($('.form-validate'), function (form) {
            var shop_id = $("#shop_id").val();
            console.log('shop_id',shop_id)
            if(!shop_id){
                var mobile = $(".mobile").html();
                var uid = $(".uid").html();
                if(uid == ''){
                    util.message('请选择会员','danger');
                    return false;
                }
                if(mobile == ''){ //会员手机为空 则需要手动输入信息 校验手机 密码
                    var user_account = $("#iphone").val();
                    var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
                    if (!myreg.test(user_account)) {
                        util.message('请输入正确的手机号码','danger');
                        return false;
                    }
                    var user_pwd = $("#password").val();
                    var patrn=/^(\w){6,20}$/; 
                    if (!patrn.exec(user_pwd)){
                        util.message('密码只能由6-20个字母、数字、下划线组成','danger');
                        return false;
                    }
                }
            }
            

            
            var apply_type = $('input[name=apply_type]:checked').val(); 
            
            
            var shop_name = $("#shop_name").val();
            var shop_group_id = $("#shop_group_id").val();
            var shop_type = $("#shop_type").val();
            var shop_platform_commission_rate = $("#shop_platform_commission_rate").val();
            var margin = $("#margin").val();
            var shop_sort = $("#shop_sort").val();
            var shop_state = 0;
            var shop_audit = 0;
            if($("#shop_state").is(":checked")){
                shop_state = 1;
            }
            if($("#shop_audit").is(":checked")){
                shop_audit = 1;
            }
            
            var company_name = $("#company_name").val();
            var company_province_id = $("#selProvinces").val();
            var company_city_id = $("#selCities").val();
            var company_district_id = $("#selDistricts").val();
            var company_type = $("#company_type").val();
            var company_address_detail = $("#company_address_detail").val();
            var company_phone = $("#company_phone").val();
            var company_employee_count = $("#company_employee_count").val();
            var company_registered_capital = $("#company_registered_capital").val();
            var contacts_name = $("#contacts_name").val();
            var contacts_phone = $("#contacts_phone").val();
            var contacts_email = $("#contacts_email").val();
            //营业执照信息（副本）
            var business_licence_number = $("#business_licence_number").val();
            var business_sphere = $("#business_sphere").val();
            var business_licence_number_electronic = $("#business_licence_number_electronic").find('img').attr('src');
            var contacts_card_no = $("#contacts_card_no").val();
            var contacts_card_electronic_1 = $("#contacts_card_electronic_1").find('img').attr('src');
            var contacts_card_electronic_2 = $("#contacts_card_electronic_2").find('img').attr('src');
            var contacts_card_electronic_3 = $("#contacts_card_electronic_3").find('img').attr('src');
            
            $.ajax({
                type: "post",
                url: "<?php echo $addPlatformShopUrl; ?>",
                data: {
                    'shop_id' : shop_id,
                    'uid' : uid,
                    'shop_name': shop_name,
                    'apply_type': apply_type,
                    'shop_group_id': shop_group_id,
                    'shop_type': shop_type,
                    'user_account': user_account,
                    'user_pwd': user_pwd,
                    'shop_platform_commission_rate': shop_platform_commission_rate,
                    'margin': margin,
                    'shop_sort': shop_sort,
                    'shop_state': shop_state,
                    'shop_audit': shop_audit,
                    'company_name': company_name,
                    'company_type': company_type,
                    'company_province_id': company_province_id,
                    'company_city_id': company_city_id,
                    'company_district_id': company_district_id,
                    'company_address_detail': company_address_detail,
                    'company_phone': company_phone,
                    'company_employee_count': company_employee_count,
                    'company_registered_capital': company_registered_capital,
                    'contacts_name': contacts_name,
                    'contacts_phone': contacts_phone,
                    'contacts_email': contacts_email,
                    'business_licence_number': business_licence_number,
                    'business_sphere': business_sphere,
                    'business_licence_number_electronic': business_licence_number_electronic,
                    'contacts_card_no': contacts_card_no,
                    'contacts_card_electronic_1': contacts_card_electronic_1,
                    'contacts_card_electronic_2': contacts_card_electronic_2,
                    'contacts_card_electronic_3': contacts_card_electronic_3,
                    'website_id': '<?php echo $website_id; ?>'
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message('操作成功', 'success', "<?php echo __URL('ADDONS_MAINshopList'); ?>");
                    }else if(data["code"]==-3) {
                        util.message('该手机已经是商城用户', 'danger');
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
    });
</script>
