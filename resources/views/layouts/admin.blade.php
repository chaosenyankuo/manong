<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- 生日 start -->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <link rel="stylesheet" type="text/css" href="/time/shijian.css" />
    <script src="/time/jquery.min.js"></script>
    <!-- 生日 end -->
    <!-- 地址 start -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
    <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
    <script src="/dizhi/js/distpicker.data.js"></script>
    <script src="/dizhi/js/distpicker.js"></script>
    <script src="/dizhi/js/main.js"></script>
    <!-- 地址 end -->
    <!-- 拉动条 start -->
    <script type="text/javascript" src="/js/scroll.min.js"></script>
    <!-- 拉动条 end -->
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/assets/js/Lightweight-Chart/cssCharts.css">
</head>

<body>
    <div id="wrapper" style="max-height:1000px;">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand waves-effect waves-dark" href="/admin"><i class="large material-icons">track_changes</i> <strong>MaNong</strong></a>
                <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{Session::get('nickname')}}</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">

            <li><a href="/admin/setting"><i class="fa fa-sign-out fa-fw"></i> 设置</a>
            <li><a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
            </li>

            </li>
        </ul>
        <ul id="dropdown2" class="dropdown-content w250">
            <li>
                <div>
                    <i class="fa fa-comment fa-fw"></i> New Comment
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                    <span class="pull-right text-muted small">12 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-tasks fa-fw"></i> New Task
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
            </li>
        </ul>
        <ul id="dropdown3" class="dropdown-content dropdown-tasks w250">
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 1</strong>
                            <span class="pull-right text-muted">60% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 2</strong>
                            <span class="pull-right text-muted">28% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                <span class="sr-only">28% Complete</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 3</strong>
                            <span class="pull-right text-muted">60% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (warning)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 4</strong>
                            <span class="pull-right text-muted">85% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                <span class="sr-only">85% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
        </ul>
        <ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
            <li>
                <div>
                    <strong>John Doe</strong>
                    <span class="pull-right text-muted">


                        <em>Today</em>
                    </span>
                </div>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <strong>John Smith</strong>
                    <span class="pull-right text-muted">



                        <em>Yesterday</em>
                    </span>
                </div>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <strong>John Smith</strong>
                        <span class="pull-right text-muted">



                            <em>Yesterday</em>
                        </span>
                    </div>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">


                    <strong>Read All Messages</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse" id="scrollbox">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu waves-effect waves-dark" href="/admin"><i class="fa fa-dashboard"></i>操作菜单</a>
                    </li>
                    @include('layouts.admin._menu')
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="position: relative;left:0px;top:-900px;">
            <div class="header">
                @if(Session::has('success'))
                <div class="col-xs-12" id="xiaoshi" style="padding:10px;">
                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-stacked blue">
                            <div class="card-content" style="text-align: center;line-height:95px;color:white">
                                <h3>{{Session::get('success')}} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endif @if(Session::has('error'))
                <div class="col-xs-12" id="xiaoshi" style="padding:10px;">
                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-stacked red">
                            <div class="card-content" style="text-align: center;line-height:95px;color:white">
                                <h3>{{Session::get('error')}} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <h2 class="page-header">
                    @section('title')
                    欢迎回到后台
                    @show
                </h2>
            </div>
            @section('content')
            <div id="page-inner">
                <div class="dashboard-cards">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="card horizontal cardIcon waves-effect waves-dark">
                                <div class="card-image red">
                                    <i class="material-icons dp48">import_export</i>
                                </div>
                                <div class="card-stacked red">
                                    <div class="card-content">
                                        <h3>84,198</h3>
                                    </div>
                                    <div class="card-action">
                                        <strong>REVENUE</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="card horizontal cardIcon waves-effect waves-dark">
                                <div class="card-image orange">
                                    <i class="material-icons dp48">shopping_cart</i>
                                </div>
                                <div class="card-stacked orange">
                                    <div class="card-content">
                                        <h3>36,540</h3>
                                    </div>
                                    <div class="card-action">
                                        <strong>SALES</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="card horizontal cardIcon waves-effect waves-dark">
                                <div class="card-image blue">
                                    <i class="material-icons dp48">equalizer</i>
                                </div>
                                <div class="card-stacked blue">
                                    <div class="card-content">
                                        <h3>24,225</h3>
                                    </div>
                                    <div class="card-action">
                                        <strong>PRODUCTS</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="card horizontal cardIcon waves-effect waves-dark">
                                <div class="card-image green">
                                    <i class="material-icons dp48">supervisor_account</i>
                                </div>
                                <div class="card-stacked green">
                                    <div class="card-content">
                                        <h3>88,658</h3>
                                    </div>
                                    <div class="card-action">
                                        <strong>VISITS</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="cirStats">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="card-panel text-center">
                                        <h4>Profit</h4>
                                        <div class="easypiechart" id="easypiechart-blue" data-percent="82"><span class="percent">82%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="card-panel text-center">
                                        <h4>No. of Visits</h4>
                                        <div class="easypiechart" id="easypiechart-red" data-percent="46"><span class="percent">46%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="card-panel text-center">
                                        <h4>Customers</h4>
                                        <div class="easypiechart" id="easypiechart-teal" data-percent="84"><span class="percent">84%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="card-panel text-center">
                                        <h4>Sales</h4>
                                        <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span class="percent">55%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-image donutpad">
                                        <div id="morris-donut-chart"></div>
                                    </div>
                                    <div class="card-action">
                                        <b>Donut Chart Example</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-image">
                                <div id="morris-line-chart"></div>
                            </div>
                            <div class="card-action">
                                <b>Line Chart</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-image">
                                <div id="morris-bar-chart"></div>
                            </div>
                            <div class="card-action">
                                <b> Bar Chart Example</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-image">
                                <div id="morris-area-chart"></div>
                            </div>
                            <div class="card-action">
                                <b>Area Chart</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-action">
                                <b>Tasks Panel</b>
                            </div>
                            <div class="card-image">
                                <div class="collection">
                                    <a href="#!" class="collection-item">Red<span class="new badge red" data-badge-caption="red">4</span></a>
                                    <a href="#!" class="collection-item">Blue<span class="new badge blue" data-badge-caption="blue">4</span></a>
                                    <a href="#!" class="collection-item"><span class="badge">1</span>Alan</a>
                                    <a href="#!" class="collection-item"><span class="new badge">4</span>Alan</a>
                                    <a href="#!" class="collection-item">Alan<span class="new badge blue" data-badge-caption="blue">4</span></a>
                                    <a href="#!" class="collection-item"><span class="badge">14</span>Alan</a>
                                    <a href="#!" class="collection-item">Custom Badge Captions<span class="new badge" data-badge-caption="custom caption">4</span></a>
                                    <a href="#!" class="collection-item">Custom Badge Captions<span class="badge" data-badge-caption="custom caption">4</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-action">
                                <b>User List</b>
                            </div>
                            <div class="card-image">
                                <ul class="collection">
                                    <li class="collection-item avatar">
                                        <i class="material-icons circle green">track_changes</i>
                                        <span class="title">Title</span>
                                        <p>First Line
                                            <br> Second Line
                                        </p>
                                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                                    </li>
                                    <li class="collection-item avatar">
                                        <i class="material-icons circle">folder</i>
                                        <span class="title">Title</span>
                                        <p>First Line
                                            <br> Second Line
                                        </p>
                                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                                    </li>
                                    <li class="collection-item avatar">
                                        <i class="material-icons circle green">track_changes</i>
                                        <span class="title">Title</span>
                                        <p>First Line
                                            <br> Second Line
                                        </p>
                                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                                    </li>
                                    <li class="collection-item avatar">
                                        <i class="material-icons circle red">play_arrow</i>
                                        <span class="title">Title</span>
                                        <p>First Line
                                            <br> Second Line
                                        </p>
                                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="fixed-action-btn horizontal click-to-toggle">
                    <a class="btn-floating btn-large red">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li>
                        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                    </ul>
                </div>
            </div>
            @show
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/materialize/js/materialize.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/assets/js/morris/morris.js"></script>
    <script src="/assets/js/easypiechart.js"></script>
    <script src="/assets/js/easypiechart-data.js"></script>
    <script src="/assets/js/Lightweight-Chart/jquery.chart.js"></script>
    <!-- Custom Js -->
    <script src="/assets/js/custom-scripts.js"></script>
    <script>
    setTimeout(function() {
        $('#xiaoshi').css('display', 'none');
    }, 2000);
    scrollY("#scrollbox"); //单个Y轴
    </script>
</body>

</html>