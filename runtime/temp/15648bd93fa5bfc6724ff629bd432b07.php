<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"template/platform/common/videoDialog.html";i:1583811744;}*/ ?>

<!-- 图片空间 -->
<div class="picture-dialog">
    <div class="picture-header flex flex-pack-end padding-15">
        <div>
            <a href="javascript:void(0);" class="btn btn-primary" id="createAlbum">创建相册</a>
            <button class="btn btn-info btn-file">上传视频<input id="fileupload" class="fileupload" type="file" name="file_upload"></button>
        </div>
    </div>
    <div class="picture-body">
        <div class="picture-sidebar border-right">
            <div class="list-group album_id" id="album_id">
            </div>
        </div>
        <div class="picture-container">
            <ul class="album-list clearfix"></ul>
            <input type="hidden" id="pageIndex">
            <input type="hidden" id="selectedData">
        </div>
    </div>
    <nav aria-label="Page navigation" class="clearfix">
        <ul id="page-pictureDialog" class="pagination pull-right"></ul>
    </nav>
</div>


<script type="text/javascript">
    require(['util'], function (util) {
        $(function () {
            selectAlbum();
            util.initPage(changedpic, 'page-pictureDialog');
            // 跳转相册
            $('.picture-dialog').on('click', '.album_category', function () {
                $(this).addClass('active').siblings().removeClass('active');
                localStorage.setItem("video_album_id_<?php echo $website_id; ?>", $(this).data('album_id'));
                util.initPage(changedpic, 'page-pictureDialog');
            });
            // 点击上传图片
            $('.btn-file').click(function () {
                var album_id = $(".picture-dialog .list-group .active").attr("data-album_id");
                var dataAlbum = {
                    "album_id": album_id,
                    "file_type": 1
                };
                if (album_id > 0) {
                    var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadFile'); ?>";
                    util.fileuploadVideo(path, dataAlbum, function (file_url) {
                        if (file_url.state == '1') {
                            changedpic(1);
                        }
                    });
                }
            })
        });

        var storage = new util.Storage('session');
        var img_array = new Object();
        img_array["id"] = new Array();
        img_array["path"] = new Array();
        var count = $("input[name='upload_video_id']").length;
        var maxCount = 5;
        function selectAlbum() {
            var album_id = localStorage.getItem("video_album_id_<?php echo $website_id; ?>");
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/system/albumList'); ?>",
                data: {"page_size": 0},
                async: false,
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            if (album_id) {
                                if (data['data'][i]['album_id'] == album_id) {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category active" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                } else {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                }
                            } else {
                                if (i == 0) {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category active" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                } else {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                }
                            }
                        }
                    }
                    $('.album_id').html(html);
                }
            });
        }

        //创建相册
        $('#createAlbum').on('click', function () {
            var html = '<form class="form-horizontal padding-15" >';
            html += '<div class="form-group"><label class="col-md-3 control-label">相册名称</label><div class="col-md-8"><input type="text" class="form-control albumName" /></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label">排序</label><div class="col-md-8"><input type="text" class="form-control sort" /></div></div>';
            html += '</form>';
            util.confirm('创建相册', html, function () {
                var name = this.$content.find('.albumName').val();
                var sort = this.$content.find('.sort').val();
                if (!name) {
                    util.message('内容不能为空');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/system/addalbumclass'); ?>",
                    data: {
                        "album_name": name,
                        "sort": sort
                    },
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        if (data) {
                            localStorage.setItem("video_album_id_<?php echo $website_id; ?>", data["code"]);
                            util.message('创建成功', 'success', function () {
                                selectAlbum();
                                util.initPage(changedpic, 'page-pictureDialog');
                            });
                        }
                    }
                })
            })
        });

        /* 切换图片库 */
        function changedpic(page_index) {
            /*
             ** val 表示选中图片库的值
             ** sort 弹出图片库选中筛选排序值
             */
            var album_id = $('body').find(".list-group").children('.active').data("album_id");
            $('#pageIndex').val(page_index ? page_index : '1');

            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/system/getalbunpic'); ?>",
                data: {"page_index": page_index, "page_size": $("#showNumber").val(), "album_id": album_id, "file_type": 1},
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<li class="item albumItem" data-path="' + __IMG(data["data"][i]["pic_cover"]) + '" data-id="' + data["data"][i]["pic_id"] + '"><video width="100%" height="100%" src="' + __IMG(data["data"][i]["pic_cover"]) + '"></video></li>';
                        }
                    } else {
                        html += '<div class="empty-box">暂无符合条件的数据记录</div>';
                    }
                    $('#page-pictureDialog').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $(".album-list").html(html);
                }
            });
        }

        //选择图片
        $('.album-list').on('click', '.albumItem', function () {
            var id = $(this).data("id").toString();
            var path = $(this).data("path");
            if (storage.getKey('multiple') && storage.getItem('multiple') === '1') {
                //多选图片
                if ($(this).hasClass("active")) {
                    // 取消选中
                    $(this).removeClass("active");
                    var index = $.inArray(id, img_array["id"]);
                    img_array["id"].splice(index, 1);
                    img_array["path"].splice(index, 1);
                    --count;
                } else {
                    // 选中图片
                    if (count > maxCount - 1) {
                        util.message('最多可选择' + maxCount + '张图片')
                        return false;
                    }
                    $(this).addClass("active");
                    img_array["id"].push(id);
                    img_array["path"].push(path);
                    ++count;
                }
            } else {

                //单选图片
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    img_array["id"] = [];
                    img_array["path"] = [];
                } else {
                    $(this).addClass("active").siblings().removeClass('active');
                    img_array["id"][0] = id;
                    img_array["path"][0] = path;
                }
            }

            $('#selectedData').data(img_array);
        });

    });
</script>