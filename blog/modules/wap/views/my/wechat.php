<?php
use \common\service\GlobalUrlService;
$wx_urls = [
    "my" => GlobalUrlService::buildStaticUrl("/images/weixin/my.jpg"),
    "imguowei" => GlobalUrlService::buildStaticUrl("/images/weixin/imguowei_888.jpg"),
    "starzone" => GlobalUrlService::buildStaticUrl("/images/weixin/mystarzone.jpg"),
];
?>
<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
    <h2 class="am-titlebar-title ">
        联系方式
    </h2>
</div>
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
    <div class="am-list-news-bd">
        <ul class="am-list">
            <li class="am-g am-list-item-dated">
                <a href="javascript:void(0);" class="am-list-item-hd ">
                    邮箱：apanly@163.com
                </a>
            </li>
            <li class="am-g am-list-item-dated">
                <a href="javascript:void(0);" class="am-list-item-hd ">
                    个人微信号：apanly
                </a>
            </li>
            <li class="am-g am-list-item-dated">
                <a href="javascript:void(0);" class="am-list-item-hd ">
                    微信服务号：imguowei_888
                </a>
            </li>
            <li class="am-g am-list-item-dated">
                <a href="javascript:void(0);" class="am-list-item-hd ">
                    赞助：请加个人微信，如果你觉得本站对你有用
                </a>
            </li>
        </ul>
    </div>
</div>

<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
    <h2 class="am-titlebar-title ">
        微信二维码
    </h2>
</div>
<figure data-am-widget="figure" class="am am-figure am-figure-default">
    <img src="<?=$wx_urls["my"];?>" alt="个人微信号：apanly"/>

    <img src="<?=$wx_urls["imguowei"];?>" alt="微信服务号：imguowei_888"/>
</figure>
