<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/www.tuandr.com/addons/poster/template/platform/poster.html";i:1587970154;}*/ ?>
<form class="form-horizontal padding-15 form-validate widthFixedForm">
    <div id="content_type">
        <ul class="nav nav-tabs v-nav-tabs" role="tablist" style="margin-left: 14px;margin-right: 14px;">
            <li role="presentation" class="active">
                <a href="#base" aria-controls="base" role="tab" data-toggle="tab"
                   data-type="1" class="flex-auto-center">基本设置</a>
            </li>
            <li role="presentation">
                <a href="#poster_design" aria-controls="poster_design" role="tab" data-toggle="tab"
                   data-type="2" class="flex-auto-center">海报设计</a>
            </li>
            <li role="presentation">
                <a href="#award" aria-controls="award" role="tab" data-toggle="tab"
                   data-type="3" class="flex-auto-center J-only-follow hide">奖励设置</a>
            </li>
            <li role="presentation">
                <a href="#push_setting" aria-controls="push_setting" role="tab"
                   data-toggle="tab" data-type="4" class="flex-auto-center J-only-follow hide">推送设置</a>
            </li>
            <li role="presentation">
                <a href="#notice_setting" aria-controls="notice_setting" role="tab"
                   data-toggle="tab" data-type="5" class="flex-auto-center J-only-follow hide">通知设置</a>
            </li>
            <li role="presentation">
                <a href="#distribute_setting" aria-controls="distribute_setting"
                   role="tab" data-toggle="tab" data-type="6" class="flex-auto-center J-only-follow hide">分销设置</a>
            </li>
        </ul>
        <div class="template-list tab-content">
            <div class="tab-pane fade in active" id="base">
                <ul class="template-list-ul clearfix">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>海报名称</label>
                        <div class="col-md-5">
                            <input type="text" id="poster_name" class="form-control" name="poster_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><span class="text-bright">*</span>海报类型</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" name="type" id="type_1" value="1" checked> 商城海报
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" id="type_2" value="2"> 商品海报
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" id="type_3" value="3"> 关注海报
                            </label>
                            <label class="radio-inline J-micro-shop hide">
                                <input type="radio" name="type" id="type_4" value="4"> 微店海报
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">回复关键字</label>
                        <!--<label class="col-md-2 control-label"><span class="text-bright">*</span>回复关键字</label>-->
                        <div class="col-md-5">
                            <input type="text" id="key" name="key" class="form-control">
                            <p class="help-block mb-0">公众号生成海报关键词，若是商品海报，则回复关键词是 关键词+商品ID</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">是否默认</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" name="is_default" id="is_default_1" value="1" checked> 是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_default" id="is_default_0" value="0"> 否
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">生成时等待文字</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="waiting_reply" id="waiting_reply" rows="4"></textarea>
                            <p class="help-block mb-0">例:您的专属海报正在玩命生成中,请等待片刻..</p>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="tab-pane fade" id="poster_design">
                <ul class="template-list-ul clearfix">
                    <table style='width:100%;'>
                        <tr>
                            <td style='width:320px;' valign='top'>
                                <div id='poster'>
                                    <img src="" class='bg'/>
                                </div>
                            </td>
                            <td valign='top'>
                                <div class='panel panel-default' style="min-height: 504px">
                                    <div class='panel-body'>
                                        <div class="form-group" id="pxselect">
                                            <label class="col-sm-2 control-label">分辨率</label>
                                            <label class="radio-inline" style="padding-left:38px;">
                                                <input type="radio" name="pxselect" value="1" checked=""> 640 * 1008
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="pxselect" value="2"> 1080 * 1920
                                            </label>
                                        </div>
                                        <div class="form-group" id="bgset">
                                            <label class="col-sm-2 control-label">背景图片</label>
                                            <div class="col-sm-8">
                                                <div class="input-group ">
                                                    <input type="text" name="bg" value="" class="form-control goods-pic"
                                                           autocomplete="off" readonly>
                                                    <span class="input-group-btn">
                                                        <a href="javascript:void(0);" id=""
                                                           class="btn btn-primary mr-04"
                                                           data-toggle="editPosterPicture">选择图片</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary clearPic">清除图片</a>
			                                        </span>
                                                </div>
                                                <!--<p class="help-block mb-0">背景图片建议尺寸640 * 1008</p>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">海报元素</label>
                                            <div class="col-sm-8">
                                                <button class='btn btn-default btn-com' type='button' data-type='head'>
                                                    头像
                                                </button>
                                                <button class='btn btn-default btn-com' type='button'
                                                        data-type='nickname'>昵称
                                                </button>
                                                <button class='btn btn-default btn-com' type='button' data-type='qr'>
                                                    二维码
                                                </button>
                                                <button class='btn btn-default btn-com' type='button' data-type='img'>
                                                    图片
                                                </button>
                                                <span id="goodsparams">
                                                    <button class='btn btn-default btn-com' type='button'
                                                            data-type='title'>商品名称</button>
                                                    <button class='btn btn-default btn-com' type='button'
                                                            data-type='goods-img'>商品图片</button>
                                                    <button class='btn btn-default btn-com' type='button'
                                                            data-type='marketprice'>商品现价</button>
                                                    <button class='btn btn-default btn-com' type='button'
                                                            data-type='productprice'>商品原价</button>
                                                </span>
                                                <button class='btn btn-default btn-com' type='button' data-type='words'>
                                                    文字</button>
                                            </div>
                                        </div>
                                        <div id='wordset' style='display:none'>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">字体颜色</label>
                                                <div class="col-sm-8 wid100">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" name="color" placeholder="请选择颜色" value="">
                                                        <span class="input-group-addon" style="width:35px;border-left:none;background-color:"></span>
                                                        <span class="input-group-btn">
										                    <button class="btn btn-default colorpicker" type="button">选择颜色 ▼</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">字体大小</label>
                                                <div class="col-sm-8">
                                                    <div class='input-group wid100'>
                                                        <input type="number" name="namesize" id="namesize1" class="form-control namesize"
                                                               placeholder="例如: 14,16"/>
                                                        <div class='input-group-addon'>px</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">文字内容</label>
                                                <div class="col-sm-8">
                                                    <div class="flex">
                                                        <textarea class="form-control bbrr0" rows="8" name="wordContent" id="wordContent">文字内容111</textarea>
                                                        <div class="variate-choice">
                                                            <p>添加变量</p>
                                                            <div class="variate-choice-item">
                                                                <a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="[昵称]">昵称</a>
                                                                <a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="[等级]">等级</a>
                                                                <a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="[手机号]">手机号</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div id='nameset' style='display:none'>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">昵称颜色</label>
                                                <div class="col-sm-8 wid100">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" name="color"
                                                               placeholder="请选择颜色" value="">
                                                        <span class="input-group-addon"
                                                              style="width:35px;border-left:none;background-color:"></span>
                                                        <span class="input-group-btn">
										                    <button class="btn btn-default colorpicker" type="button">选择颜色 ▼</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">昵称大小</label>
                                                <div class="col-sm-8">
                                                    <div class='input-group wid100'>
                                                        <input type="number" name="namesize" id="namesize" class="form-control namesize"
                                                               placeholder="例如: 14,16"/>
                                                        <div class='input-group-addon'>px</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="imgset" style="display:none">
                                            <label class="col-sm-2 control-label">图片设置</label>
                                            <div class="col-sm-8">
                                                <div class="input-group ">
                                                    <input type="text" name="img" value=""
                                                           class="form-control goods-pic" autocomplete="off" readonly>
                                                    <span class="input-group-btn">
									                    <a class="btn btn-primary mr-04"
                                                           data-toggle="editPosterPicture1">选择图片</a>
                                                        <!--<a href="javascript:void(0);" class="btn btn-primary clearPic1">清除图片</a>-->
								                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </ul>
            </div>
            <div class="tab-pane fade J-only-follow hide" id="award">
                <ul class="template-list-ul clearfix">
                    <div class="form-group J-award" data-obj="1">
                        <label class="col-md-2 control-label">推荐人</label>
                        <div class="col-md-8">
                            <div class="form-additional">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">送积分</label>
                                    <div class="input-group w-200">
                                        <input type="hidden" name="award_id">
                                        <input type="number" name="point" class="form-control" min="0">
                                        <div class="input-group-addon">个</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">送余额</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <input type="number" name="balance" class="form-control" min="0">
                                            <div class="input-group-addon">元</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">送微信红包</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <input type="number" name="wchat_red_packet" class="form-control" min="0">
                                            <div class="input-group-addon">元</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">增加成长值</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <input type="number" name="growth" class="form-control" min="0" int="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group J-gift-voucher hide">
                                    <label class="col-md-2 control-label">送礼品券</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <select name="gift_voucher_id" class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group J-coupon-type hide">
                                    <label class="col-md-2 control-label">送优惠券</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <select name="coupon_type_id" class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group J-award" data-obj="2">
                        <label class="col-md-2 control-label">被推荐人</label>
                        <div class="col-md-8">
                            <div class="form-additional">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">送积分</label>
                                    <div class="input-group w-200">
                                        <input type="hidden" name="award_id">
                                        <input type="number" name="point" class="form-control" min="0" int="true">
                                        <div class="input-group-addon">个</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">送余额</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <input type="number" name="balance" class="form-control" min="0" int="true">
                                            <div class="input-group-addon">元</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">送微信红包</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <input type="number" name="wchat_red_packet" class="form-control" min="0"
                                                   int="true">
                                            <div class="input-group-addon">元</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">增加成长值</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <input type="number" name="growth" class="form-control" min="0" int="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group J-gift-voucher hide">
                                    <label class="col-md-2 control-label">送礼品券</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <select name="gift_voucher_id" class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group J-coupon-type hide">
                                    <label class="col-md-2 control-label">送优惠券</label>
                                    <div>
                                        <div class="input-group w-200">
                                            <select name="coupon_type_id" class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="tab-pane fade J-only-follow hide" id="push_setting">
                <ul class="template-list-ul clearfix">
                    <div class="form-group">
                        <label class="col-md-2 control-label">推送类型</label>
                        <div class="col-md-5">
                            <label class="radio-inline">
                                <input type="radio" name="push_type" id="push_type_1" value="1" checked> 图文消息
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="push_type" id="push_type_2" value="2"> 文本消息
                            </label>
                        </div>
                    </div>
                    <div class="form-group J-push-type-2 hide">
                        <label class="col-md-2 control-label">推送文本</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="push_text" id="push_text" rows="4"></textarea>
                            <p class="help-block mb-0">如果内容为空，则不推送消息</p>
                        </div>
                    </div>
                    <div class="form-group J-push-type-1">
                        <label class="col-md-2 control-label">推送标题</label>
                        <div class="col-md-5">
                            <input type="text"
                                   class="form-control" id="push_title" name="push_title">
                        </div>
                    </div>
                    <div class="form-group J-push-type-1">
                        <label class="col-md-2 control-label">推送封面</label>
                        <div class="col-md-8">
                            <div class="mb-20">
                                <div class="picture-list">
                                    <a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture">
                                        <i class="icon icon-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="help-block mb-0">图片建议尺寸：850像素*350像素，大小不超过2M。</p>
                        </div>
                    </div>
                    <div class="form-group J-push-type-1">
                        <label class="col-md-2 control-label">推送描述</label>
                        <div class="col-md-5">
                            <input type="text" id="push_desc" name="push_desc" class="form-control">
                        </div>
                    </div>
                    <div class="form-group J-push-type-1">
                        <label class="col-md-2 control-label">推送链接</label>
                        <div class="col-md-5">
                            <input type="text" id="push_link" name="push_link" class="form-control">
                        </div>
                    </div>
                </ul>
            </div>
            <div class="tab-pane fade J-only-follow hide" id="notice_setting">
                <ul class="template-list-ul clearfix">
                    <div class="form-group">
                        <label class="col-md-2 control-label">通知类型</label>
                        <div class="col-md-5">
                            <!--<label class="radio-inline">-->
                                <!--<input type="radio" name="notice_type" id="notice_type_1" value="1" checked> 模板消息-->
                            <!--</label>-->
                            <label class="radio-inline">
                                <input type="radio" name="notice_type" id="notice_type_2" value="2" checked> 客服消息
                            </label>
                        </div>
                    </div>
                    <!--<div class="form-group J-notice-type-1">-->
                        <!--<label class="col-md-2 control-label">模板消息ID</label>-->
                        <!--<div class="col-md-5">-->
                            <!--<input type="text" class="form-control" name="notice_template_id" id="notice_template_id">-->
                            <!--<p class="help-block">在公众平台微信模版消息搜索“任务完成通知”，找到编号：OPENTM410037016，添加成功后复制模版ID填写即可。</p>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="form-group J-notice-type-2 hide">-->
                    <div class="form-group J-notice-type-2">
                        <label class="col-md-2 control-label">推荐者通知</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="reco_notice" id="reco_notice" rows="4"></textarea>
                            <p class="help-block">例如：[nickname] 通过您的二维码关注了公众号! 获得了 [credit] 个积分,[money]元奖励!<br>
                                [nickname]:扫码者昵称 [credit]:奖励的积分 [money]:奖励的余额 [redpack]:微信红包金额<br>
                                [growth]:奖励的成长值 [couponname]:奖励的优惠券名称 [giftvouchername]:奖励的礼品券
                            </p>
                        </div>
                    </div>
                    <!--<div class="form-group J-notice-type-2 hide">-->
                    <div class="form-group J-notice-type-2">
                        <label class="col-md-2 control-label">关注者通知</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="follow_notice" id="follow_notice" rows="4"></textarea>
                            <p class="help-block">例如：[nickname] 通过您的二维码关注了公众号! 获得了 [credit] 个积分,[money]元奖励!<br>
                                [nickname]:扫码者昵称 [credit]:奖励的积分 [money]:奖励的余额 [redpack]:微信红包金额<br>
                                [growth]:奖励的成长值 [couponname]:奖励的优惠券名称 [giftvouchername]:奖励的礼品券
                            </p>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="tab-pane fade J-only-follow hide" id="distribute_setting">
                <ul class="template-list-ul clearfix">
                    <div class="form-group">
                        <label class="col-md-2 control-label">权限设置</label>
                        <div class="col-md-5">
                            <!--<label class="radio-inline">
                                <input type="radio" name="is_perm" id="is_perm_1" value="1" checked> 开启
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_perm" id="is_perm_0" value="0"> 关闭
                            </label>-->
                            <div class="switch-inline">
                                <input type="checkbox" name="is_perm" id="is_perm" checked>
                                <label for="is_perm" class=""></label>
                            </div>
                            <p class="help-block mb-0">是否允许非分销商生成自己的海报</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">未开放时客服消息</label>
                        <div class="col-md-5">
                            <input type="text" id="customer_service_message" name="customer_service_message"
                                   class="form-control">
                            <p class="help-block mb-0">例：您还不是分销商，去努力成为分销商，拥有你的专属海报吧！</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">未开放时说明链接</label>
                        <div class="col-md-5">
                            <input type="text" id="explanation_link" name="explanation_link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group" id="sub_to_down">
                        <label class="col-md-2 control-label">扫码关注成为下线</label>
                        <div class="col-md-5">
                            <!--<label class="radio-inline">
                                <input type="radio" name="is_sub" id="is_sub_1" value="1" checked> 开启
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_sub" id="is_sub_0" value="0"> 关闭
                            </label>-->
                            <div class="switch-inline">
                                <input type="checkbox" name="is_sub" id="is_sub" checked>
                                <label for="is_sub" class=""></label>
                            </div>
                            <p class="help-block mb-0">扫码关注直接成为推荐人的下线</p>
                        </div>
                    </div>
                    <div class="form-group" id="sub_to_distribution">
                        <label class="col-md-2 control-label">扫码关注成为分销商</label>
                        <div class="col-md-5">
                            <!--<label class="radio-inline">
                                <input type="radio" name="is_distribution" id="is_distribution_1" value="1" checked> 开启
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_distribution" id="is_distribution_0" value="0"> 关闭
                            </label>-->
                            <div class="switch-inline">
                                <input type="checkbox" name="is_distribution" id="is_distribution" checked>
                                <label for="is_distribution" class=""></label>
                            </div>
                            <p class="help-block mb-0">扫码关注直接成为推荐人的下线并成为分销商</p>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary add" type="submit">保存</button>
        </div>
    </div>
</form>

<script id="tpl_drag" type="text/html">
    <%each items as item index%>
    <div class="drag" index="<%item.index%>" style="<%item.style%>"
         size="<%item.size%>" item-color="<%item.color%>">
        <%if item.type == 'img' || item.type == 'qr' || item.type == 'head' || item.type == 'thumb'%>
        <img src="<%item.img%>">
        <%else%>
        <div class="text"
             style="font-size: <%item.size%>pt;
              color: <%item.color%>">
            <%item.string%>
        </div>
        <%/if%>
        <div class="rRightDown"></div>
        <div class="rLeftDown"></div>
        <div class="rRightUp"></div>
        <div class="rLeftUp"></div>
        <div class="rRight"></div>
        <div class="rLeft"></div>
        <div class="rUp"></div>
        <div class="rDown"></div>
    </div>
    <%/each%>
</script>

<script id="tpl_coupon_type" type="text/html">
    <%each data as item index%>
    <option value="<%item.coupon_type_id%>" <%if item.coupon_type_id ==  selected_id%>selected<%/if%>><%item.coupon_name%></option>
    <%/each%>
</script>

<script id="tpl_gift_voucher" type="text/html">
    <%each data as item index%>
    <option value="<%item.gift_voucher_id%>" <%if item.gift_voucher_id == selected_id%>selected<%/if%>><%item.giftvoucher_name%></option>
    <%/each%>
</script>

<script>
    require(['util', 'poster', 'tpl', 'insertContent'], function (util, poster, tpl, insertContent) {

        init('<?php echo $poster_id; ?>')
        //如果设置了关注海报->分销设置中：允许非分销商生成自己的海报，则扫码成为下线、扫码关注成为分销商选项去掉。
        // alert(999);
        // console.log($('#is_perm').attr('checked'));

        $('.variate-choice-item').on('click','.variate-choice-code',function(){
            var code = $(this).data('code');
            var contents = $(this).parents('.variate-choice').siblings('#wordContent');
            contents.insertContent(code);
        })
        //点击分辨率，切换宽高 360*640
        $('input[name=pxselect]').change(function(){
            if($(this).val() == '1'){
                //320*504
                $('#poster').attr('style','width:320px;height:504px;')
                var drag = $('.drag');
                drag.each(function(i, v){
                    var width1 = 320;
                    var height1 = 504;
                    var this_top = parseFloat($(this).css('top')) + parseFloat($(this).css('height'));
                    var this_left = parseFloat($(this).css('left')) + parseFloat($(this).css('width'));
                    var last_top = parseFloat($(this).css('top'));
                    var last_left =parseFloat($(this).css('left'));
                    if(this_top > height1){
                        last_top = height1 - parseFloat($(this).css('height'));
                    }
                    if(this_left > width1){
                        last_left = width1 - parseFloat($(this).css('width'));
                    }
                    $(this).css('left', last_left);
                    $(this).css('top', last_top);
                })
            }else{
                //360*640
                $('#poster').attr('style','width:360px;height:640px;')
            }
        })

        $('#is_perm:checked').change(function(){
            if($('#is_perm:checked').val() == 'on'){
                $('#sub_to_down').hide();
                $('#sub_to_distribution').hide();
            }else{
                $('#sub_to_down').show();
                $('#sub_to_distribution').show();
            }
        })

        if ('<?php echo $is_coupon_type; ?>' == 1) {
            // 存在优惠券应用
            $('.J-coupon-type').removeClass('hide')
            var coupon_type_list = <?php echo $coupon_type_list; ?>;
            // console.log(coupon_type_list)
            $('select[name=coupon_type_id]').html(tpl('tpl_coupon_type', {'data': coupon_type_list}))
        }
        if ('<?php echo $is_gift_voucher; ?>' == 1) {
            // 存在礼品券应用
            $('.J-gift-voucher').removeClass('hide')
            var gift_voucher_list = <?php echo $gift_voucher_list; ?>;
            // console.log(gift_voucher_list)
            $('select[name=gift_voucher_id]').html(tpl('tpl_gift_voucher', {'data': gift_voucher_list}))
        }
        if ('<?php echo $is_micro_shop; ?>' == 1) {
            $('.J-micro-shop').removeClass('hide')
        }

        // 切换海报类型
        $('input[name=type]').on('change', function () {
            switchPosterType();
        })
        // 切换通知类型
        $('input[name=notice_type]').on('change', function () {
            switchNoticeType();
        })
        // 切换
        $('input[name=push_type]').on('change', function () {
            switchPushType();
        })

        function checkKey(){
            var key_words = $('input[name=key]').val();
            var poster_id = '<?php echo $poster_id; ?>';
            var result;
            if(key_words == ''){
                return;
            }
            $.ajax({
                url:'<?php echo $isRepeatKeyword; ?>',
                async:false,
                type:'post',
                data:{keyword:key_words,poster_id:poster_id},
                success:function(res){
                    result = res;
                }
            })
            return result;
        }

        //提交数据
        var flag = false;
        util.validate($('.form-validate'), function (form) {
            res = checkKey();
            if(res && res['code'] < 0){
                var obj = $('input[name=key]');
                obj.val('');
                util.message(res['message'], 'danger', ""); return;
            }
            var px_type = $('input[name=pxselect]:checked').val();
            var push_cover_num = $(".picture-list img").length
            var type = $('input[name=type]:checked').val()
            var push_type = $('input[name=push_type]:checked').val()
            var push_title = $('#push_title').val()
            // console.log(push_title)
            var push_desc = $('#push_desc').val()
            var push_link = $('#push_link').val()
            if (type == 3 &&
                push_type == 1 &&
                ((push_cover_num == 0 || push_title == '' || push_desc == '' || push_link == '') &&
                    !(push_cover_num == 0 && push_title == '' && push_desc == '' && push_link == ''))
            ) {
                //海报是关注海报 && 推送类型是图文消息 && (只能是全部为空 || 全不为空)
                util.message("推送类型是图文消息时,推送内容全部为空或者全不为空");
                return false;
            }

            if (!flag){
                flag = true
                $.ajax({
                    type: "post",
                    url: '<?php echo $savePosterUrl; ?>',
                    data: {
                        'poster_id': '<?php echo $poster_id; ?>',
                        'px_type':px_type,
                        'poster_name': $('#poster_name').val(),
                        'type': type,
                        'key': $('#key').val(),
                        'is_default': $('input[name=is_default]:checked').val(),
                        'waiting_reply': $("#waiting_reply").val(),
                        'poster_data': poster.posterData(),
                        'award_data': awardData(),
                        'push_type': push_type,
                        'push_text': $('#push_text').val(),
                        'push_title': push_title,
                        'push_cover_id': $('.picture-list').find('i').data('id'),
                        'push_desc': push_desc,
                        'push_link': push_link,
                        'notice_type': $('input[name=notice_type]:checked').val(),
                        'notice_template_id': $('#notice_template_id').val(),
                        'reco_notice': $("#reco_notice").val(),
                        'follow_notice': $("#follow_notice").val(),
                        'is_perm': $('input[name=is_perm]').is(':checked')?1:0,
                        'customer_service_message': $('#customer_service_message').val(),
                        'explanation_link': $('#explanation_link').val(),
                        'is_sub': $('input[name=is_sub]').is(':checked')?1:0,
                        'is_distribution': $('input[name=is_distribution]').is(':checked')?1:0,
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINposterList'); ?>");
                            // util.message(data["message"], 'success');
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            }
        })

        // 初始化编辑的数据
        function init(poster_id) {
            if(!poster_id){
                switchPosterType();
                switchPushType();
                return;
            }
            // 海报数据
            $.ajax({
                type: "post",
                url: '<?php echo $posterUrl; ?>',
                data: {
                    'poster_id': poster_id
                },
                success: function (data) {
                    $('#poster_name').val(data.poster_name)
                    $('#type_' + data.type).prop('checked', true)
                    $('#key').val(data.key)
                    $('#is_default_' + data.is_default).prop('checked', true)
                    poster.initPoster($.parseJSON(data.poster_data))
                    $("#waiting_reply").val(data.waiting_reply)
                    $.each(data.poster_award, function (k, award_obj) {
                        var obj = award_obj.award_obj
                        $.each(award_obj, function (key, item) {
                            $('.J-award[data-obj="' + obj + '"] input[name=' + key + ']').val(item)
                            $('.J-award[data-obj="' + obj + '"] select[name=' + key + ']').val(item)
                        })
                    })
                    $('#push_title').val(data.push_title)
                    $('.picture-list').find('i').attr('data-id', data.push_cover_id)
                    if (data.push_cover_id) {
                        $('.picture-list').html('<a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="' + data.push_cover.pic_cover + '"></a>');
                    }
                    $('#push_type_' + data.push_type).prop('checked', true)
                    $('#push_text').val(data.push_text)
                    $('#push_desc').val(data.push_desc)
                    $('#push_link').val(data.push_link)
                    $('#notice_type_' + data.notice_type).prop('checked', true)
                    $('#notice_template_id').val(data.notice_template_id)
                    $("#reco_notice").val(data.reco_notice)
                    $("#follow_notice").val(data.follow_notice)
                    if(data.is_perm==1){
                        $('#is_perm').prop('checked', true)
                        $('#sub_to_down').hide();
                        $('#sub_to_distribution').hide();
                    }
                    else{
                        $('#is_perm').prop('checked', false)
                        $('#sub_to_down').show();
                        $('#sub_to_distribution').show();
                    }
                    // $('#is_perm_' + data.is_perm).prop('checked', true)
                    $('#customer_service_message').val(data.customer_service_message)
                    $('#explanation_link').val(data.explanation_link)
                    // $('#is_sub_' + data.is_sub).prop('checked', true)
                    if(data.is_sub==1){
                        $('#is_sub').prop('checked', true)
                    }
                    else{
                        $('#is_sub').prop('checked', false)
                    }
                    $('input[name=pxselect]').each(function(i,v){
                        if($(this).val() == data.px_type){
                            if(data.px_type == 2){
                                $('#poster').attr('style','width:360px;height:640px;')
                            }
                            $(this).attr('checked', 'checked');

                        }
                    })
                    // $('#is_distribution_' + data.is_distribution).prop('checked', true)
                    if(data.is_distribution==1){
                        $('#is_distribution').prop('checked', true)
                    }
                    else{
                        $('#is_distribution').prop('checked', false)
                    }
                    switchPosterType(data.type)
                    // switchNoticeType(data.notice_type)
                    switchPushType(data.push_type)
                }
            });
        }

        // 获取奖励设置数据
        function awardData() {
            var award_data = {}
            $('.J-award').each(function () {
                var this_award = $(this)
                var obj = this_award.data('obj')
                award_data[obj] = {}
                award_data[obj]['award_obj'] = obj
                this_award.find('input').each(function () {
                    var this_input = $(this)
                    var name = this_input.attr('name')
                    award_data[obj][name] = this_input.val()
                })
                this_award.find('select').each(function () {
                    var this_input = $(this)
                    var name = this_input.attr('name')
                    award_data[obj][name] = this_input.val()
                })
            })
            // console.log(award_data)
            return award_data
        }

        // 切换通知类型
        function switchNoticeType(notice_type) {
            var notice_type = notice_type ? notice_type : $('input[name=notice_type]:checked').val()
            if (notice_type == 1) {
                $('.J-notice-type-2').addClass('hide')
                $('.J-notice-type-1').removeClass('hide')
            } else {
                $('.J-notice-type-1').addClass('hide')
                $('.J-notice-type-2').removeClass('hide')
            }
        }

        // 切换海报类型
        function switchPosterType(type) {
            var type = type ? type : $('input[name=type]:checked').val()
            if (type == 3) {
                // 关注海报
                $('.J-only-follow').removeClass('hide')
            } else {
                $('.J-only-follow').addClass('hide')
            }
            if (type == 2) {
                //商品海报
                $('#goodsparams').removeClass('hide')
            } else {
                $('#goodsparams').addClass('hide')
            }
        }

        // 切换通知类型
        function switchPushType(push_type) {
            var push_type = push_type ? push_type : $('input[name=push_type]:checked').val()
            if (push_type == 1) {
                $('.J-push-type-2').addClass('hide')
                $('.J-push-type-1').removeClass('hide')
            } else {
                $('.J-push-type-1').addClass('hide')
                $('.J-push-type-2').removeClass('hide')
            }
        }


    });
</script>