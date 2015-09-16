<header class="main-header" style="background-image: url(/images/banner_bg.jpg)">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <img src="/images/banner.png">
        </div>
    </div>
</div>
</header>
<!-- end header -->

<!-- start navigation -->
<nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                        </span>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="menu">
                        <li <?php if($menu == "blog"):?> class="nav-current" <?php endif;?>><a href="/">文章</a></li>
                        <li <?php if($menu == "library"):?> class="nav-current" <?php endif;?>><a href="/library/index">图书馆</a></li>
                        <!--<li role="presentation"><a href="/default/media">多媒体</a></li>-->
                        <li <?php if($menu == "about"):?> class="nav-current" <?php endif;?> role="presentation"><a href="/default/about">关于</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end navigation -->