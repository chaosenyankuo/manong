<div class="am-container header">
    <ul class="message-l">
        <div class="topMessage">
            <div class="menu-hd">
            @if(Session::has('nickname'))
                <a href=" " target="_top" class="h">你好: {{Session::get('nickname')}}</ a>
                <a href="/home/logout">&nbsp;&nbsp;&nbsp;退出</a>  
            @endif        
            @if(!Session::has('nickname'))
                <a href="/home/login" target="_top" class="h">请登录</a>
                <a href="/home/zhuce" target="_top">免费注册</a>
            @endif
            </div>
        </div>
    </ul>
    <ul class="message-r">
        <div class="topMessage home">
            <div class="menu-hd">
                <a href="/" target="_top" class="h">商城首页</a>
            </div>
        </div>
        <div class="topMessage my-shangcheng">
            <div class="menu-hd MyShangcheng">
                <a href="/home/index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
            </div>
        </div>
        <div class="topMessage mini-cart">
            <div class="menu-hd">
                <a id="mc-menu-hd" href="#" target="_top">
                        <i class="am-icon-shopping-cart  am-icon-fw"></i>
                        <span>购物车</span>
                        <strong id="J_MiniCartNum" class="h">0</strong>
                    </a>
            </div>
        </div>
        <div class="topMessage favorite">
            <div class="menu-hd">
                <a href="#" target="_top">
                        <i class="am-icon-heart am-icon-fw"></i>
                        <span>收藏夹</span>
                    </a>
            </div>
    </ul>
    </div>
    <!--悬浮搜索框-->
    <div class="nav white">
        
        <div class="logoBig">
            <li><img src="/home/images/logobig.png" /></li>
        </div>
        <div class="search-bar pr">
            <a name="index_none_header_sysc" href="#"></a>
            <form action="/" method="get">
                <input id="searchInput" name="keywords" type="text" placeholder="搜索" value="{{request()->keywords}}" autocomplete="off">
                <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
            </form>
        </div>
    </div>
    <div class="clear"></div>