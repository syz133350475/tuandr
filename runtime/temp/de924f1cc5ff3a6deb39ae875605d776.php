<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/www.tuandr.com/addons/store/template/platform/addStore.html";i:1586931646;}*/ ?>

<!-- page -->
<form class="form-horizontal form-validate pt-15 widthFixedForm">
    <input type="hidden" class="form-control"  id="store_id" name="store_id" value="<?php echo $store_info['store_id']; ?>">
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>门店名称</label>
        <div class="col-md-8">
            <input type="text" class="form-control"  id="store_name" name="store_name" required value="<?php echo $store_info['store_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>门店图片</label>
        <div class="col-md-8">
            <div class="border-default padding-15">
                <div class="mb-20">
                    <div class="picture-list">
                        <?php if(count($store_info['img_temp_array']) > 0): foreach($store_info["img_temp_array"]  as $vo): ?>
                        <a href="javascript:void(0);" id="goods_pic_list" style="margin-right:10px;">
                            <i class="icon icon-danger" style="right:-15px;" title="删除"></i>
                            <img src="<?php echo __IMG($vo['pic_cover']); ?>" />

                        </a>
                        <input type="hidden" name="upload_img_id" value="<?php echo $vo['pic_id']; ?>" />
                        <?php endforeach; endif; ?>
                        <a href="javascript:void(0);" class="plus-box" data-toggle="multiPicture"><i class="icon icon-plus"></i></a>
                    </div>
                </div>
                <p class="small-muted text-center">至少上传1张门店内景图最多5张，建议上传尺寸750px * 420px</p>
            </div>
            <input type="text" class="visibility" name="picture" data-visi-type="multiPicture">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>门店电话</label>
        <div class="col-md-8">
            <input type="text" class="form-control" placeholder="020-xxxxxxxx 或 11位手机号码"  id="store_tel" name="store_tel" required value="<?php echo $store_info['store_tel']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>门店地址</label>
        <div class="col-md-8">
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
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="address" name="address" placeholder="请输入门店详细地址" value="<?php echo $store_info['address']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>地址定位</label>
        <div class="col-md-5">
            <div class="input-group">
                <div class="input-group-addon">lat(纬度)</div>
                <input type="text" class="form-control w-200 inline-block" id="store_lat" name="store_lat" required value="<?php echo $store_info['lat']; ?>">
                <div class="input-group-addon">lng(经度)</div>
                <input type="text" class="form-control w-200 inline-block" id="store_lng" name="store_lng" required value="<?php echo $store_info['lng']; ?>">
            </div>
        </div>
    </div>
    <div class="form-group mb-0">
        <label class="col-md-2 control-label" style="width: 204px"></label>

        <div class="col-md-8" style="width: 592px;border: 1px solid #ddd;border-bottom: none">
            <div class="input-group search-input-group" style="margin: 10px 0;width: auto">
                <input type="text" class="form-control" id="search_text" name="search_text">
                <span class="input-group-btn "><a class="btn btn-primary search J-search">搜索</a></span>
            </div>
        </div>
    </div>
    <div class="form-group mb-0">
        <label class="col-md-2 control-label" style="width: 204px"></label>
        <div class="col-md-8 map_div" id="map" style="width: 592px;">

        </div>


    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" style="width: 204px"></label>
        <div class="col-md-8 plpr-0"  style="border:1px solid #ddd;width: 592px;">
            <div class="map_location"></div>
        </div>


    </div>
    <?php if($store_info): ?>
    <div class="form-group">
        <label class="col-md-2 control-label">营业状态</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="status" value="1" <?php if($store_info['status']): ?> checked <?php endif; ?>> 营业
            </label>
            <label class="radio-inline">
                <input type="radio" name="status" value="0" <?php if(!$store_info['status']): ?> checked <?php endif; ?>> 歇业
            </label>
            <div class="help-block mb-0">若为门店营业状态，则视为支持O2O线下服务。</div>
        </div>
    </div>
    <?php else: ?>
    <div class="form-group">
        <label class="col-md-2 control-label">营业状态</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="status" value="1" checked> 营业
            </label>
            <label class="radio-inline">
                <input type="radio" name="status" value="0" > 歇业
            </label>
            <div class="help-block mb-0">若为门店营业状态，则视为支持O2O线下服务。</div>
        </div>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label class="col-md-2 control-label">营业时段</label>
        <div class="col-md-5">
        <span class="pr">
            <input type="text" id="startTime" name="startTime" placeholder="开始时间" class="ol_datewidth" value="<?php echo $store_info['start_time']; ?>" autocomplete="off" data-types="time" required>
            <label for="startTime"><i class="fa icon-calendar"></i></label>
        </span>
        <span>~</span>
        <span class="pr">
            <input type="text" id="finishTime" name="finishTime" placeholder="结束时间" class="ol_datewidth" value="<?php echo $store_info['finish_time']; ?>" autocomplete="off" data-types="time" required>
            <label for="finishTime"><i class="fa icon-calendar"></i></label>
        </span>
        </div>
    </div>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary J-submit" type="submit"><?php if($store_info): ?>保存<?php else: ?>添加<?php endif; ?></button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>
    <input type="hidden" id="pid" name="pid" value="<?php echo $store_info['province_id']; ?>">
    <input type="hidden" id="cid" name="cid" value="<?php echo $store_info['city_id']; ?>">
    <input type="hidden" id="aid" name="aid" value="<?php echo $store_info['district_id']; ?>">
</form>

<!-- page end -->


<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=t16W0CsDyfV8QjlSgS17lgsI"></script>
<script>
    require(['util'], function (util) {

    if($('.picture-list').find("input[name='upload_img_id']").length > 4){
        $('.picture-list').find(".plus-box").hide();
    }
    // 有图片则开启验证
    $('.picture-list').bind('DOMNodeInserted',function(e){
        if($(this).find("input").attr('name')=='upload_img_id'){
            $('.visibility').removeAttr('required');
            var lengths=$(this).find("input[name='upload_img_id']").length;
            if(lengths>4){
                $(this).find(".plus-box").fadeOut();
            }
        }
    });
     $('.picture-list').bind('DOMNodeRemoved',function(e){
         if($(this).find("input").attr('name')=='upload_img_id'){
            $('.visibility').attr('required','required');
            var lengths=$(this).find("input[name='upload_img_id']").length;
            if(lengths<5){
                $(this).find(".plus-box").show();
            }
         }
     });

        util.layDate1('#startTime');
        util.layDate1('#finishTime');
        util.validate($('.form-validate'), function (form) {
            var btnHtml = $('.J-submit').html();
            if($('.J-submit').attr('disabled')==='disabled'){
                return false;
            }
            var store_id = $("#store_id").val();
            var store_name = $("#store_name").val();
            var store_tel = $("#store_tel").val();
            var store_lng = $("#store_lng").val();
            var store_lat = $("#store_lat").val();
            var province_id = $("#selProvinces").val();
            var city_id = $("#selCities").val();
            var district_id = $("#selDistricts").val();
            var address = $("#address").val();
            var start_time = $("#startTime").val();
            var finish_time = $("#finishTime").val();
            var status = $('input[name=status]:checked').val();
            var img_id = [];
            $("input[name='upload_img_id']").each(function () {
                img_id.push($(this).val());
            });
            var pic_length = $(".picture-list #goods_pic_list");
            var length = pic_length.size();
            if (length > 5) {
                util.message("门店图片不能超过5张");
                return false;
            }
            if (length < 1) {
                util.message("请选择门店图片");
                return false;
            }
            $('.J-submit').attr({disabled: "disabled"}).html('提交中...');
            $.ajax({
                type: "post",
                url: "<?php echo $addOrUpdateStoreUrl; ?>",
                data: {
                    'store_id': store_id,
                    'store_name': store_name,
                    'store_tel': store_tel,
                    'province_id': province_id,
                    'city_id': city_id,
                    'district_id': district_id,
                    'address': address,
                    'status': status,
                    'img_id_array': img_id,
                    'store_lng': store_lng,
                    'store_lat': store_lat,
                    'start_time': start_time,
                    'finish_time': finish_time
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINstoreList'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                        $('.J-submit').removeAttr('disabled').html(btnHtml);
                    }
                }

            });
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
        });
        function getProvince() {
            var id = $('#selProvinces').val();
            if(id==-1){
                id = pid;
            }
            if(!id){
                return;
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
        });
        function getSelCity() {
            var id = $('#selCities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            if(!id){
                return;
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
        var map = new BMap.Map("map");
        map.centerAndZoom("广州", 12);
        map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
        map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

        map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
        map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
        map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开
        var localSearch = new BMap.LocalSearch(map);
        localSearch.enableAutoViewport(); //允许自动调节窗体大小

        $('.J-search').click(function(){
            map.clearOverlays();//清空原来的标注
            var keyword = $('#search_text').val();
            localSearch.setSearchCompleteCallback(function (searchResult) {
                console.log(searchResult);
                var html='';
                for(var i=0;i<searchResult.getCurrentNumPois();i++){
                    // s.push(searchResult.getPoi(i).title + ", " + searchResult.getPoi(i).address)
                    html+='<div class="map_location_box" data-lat=" '+searchResult.getPoi(i).point.lat+' " data-lng="'+searchResult.getPoi(i).point.lng+'" data-title="'+searchResult.getPoi(i).title+'"><p>'+searchResult.getPoi(i).title+'</p><p>'+searchResult.getPoi(i).address+'</p></div>';
                }
                $('.map_location').html(html);

                var poi = searchResult.getPoi(0);
                $('#store_lat').val(poi.point.lat);
                $('#store_lng').val(poi.point.lng);
                map.centerAndZoom(poi.point, 13);
                var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  // 创建标注，为要查询的地方对应的经纬度
                map.addOverlay(marker);
                var content = $('#search_text').val() + "<br/><br/>经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
                var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + content + "</p>");
                marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
                // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
            });
            localSearch.search(keyword);
        });

        $('body').on('click','.map_location_box',function(){
            var lng=$(this).attr('data-lng');
            var lat=$(this).attr('data-lat');
            var title=$(this).attr('data-title');
            $('#store_lat').val(lat);
            $('#store_lng').val(lng);
            $('#search_text').val(title);
        })
        
    });
    
</script>
