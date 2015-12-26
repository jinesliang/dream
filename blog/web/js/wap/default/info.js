;
var default_info_ops = {
    init: function () {
        this.eventBind();
        this.adaptVideo();
        this.ifram_bug();//手机端专门修复的
    },
    eventBind: function () {
        $("article .am-article-bd img").each(function(){
            $(this).attr("title","点击查看大图");
            $(this).attr("alt","点击查看大图");
            var image_url = $(this).attr("src");
            var target = $('<a class="zoom" href="'+image_url+'" data-lightbox="roadtrip"></a>');
            $( this).clone(true).appendTo(target);
            target.insertBefore(  $(this) );
            $(this).hide();
        });
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    },
    adaptVideo: function () {
        var width = $(window).width();
        width = (width > 1000) ? 1000 : width;
        height = Math.ceil(width * 0.3);
        var dpi = window.devicePixelRatio;
        if (dpi) {
            height = height * dpi;
        }
        $("iframe").each(function () {
            $(this).attr("width", "100%");
            if( $(this).attr("src").indexOf("v.qq.com/iframe") > -1 ){
                $(this).attr("height", height);
            }
            if( $(this).hasClass("iframe_bug") ){
                $(this).hide();
            }
        });
    },
    ifram_bug:function(){
        var width = $(document).width() - 20;
        $("iframe.iframe_bug").each(function(){
            var url = common_ops.getHostUrl("/public/iframe") + "?width=" +width+ "&url=" + $(this).attr("src");
            $(this).attr("src",url);
            $(this).show();
        });
    }
};

$(document).ready(function () {
    default_info_ops.init();
});