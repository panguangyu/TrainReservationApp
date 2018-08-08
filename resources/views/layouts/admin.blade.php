<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>高铁订餐系统 - 后台管理 - @yield("title")</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://139.199.178.177/public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main stylesheet -->
    <link href="http://139.199.178.177/public/assets/css/hallooou.css" rel="stylesheet">

    <!-- Color stylesheet -->
    <link href="http://139.199.178.177/public/assets/css/colors.css" rel="stylesheet">
    <link href="http://139.199.178.177/public/assets/css/colors_2.css" rel="stylesheet">
    <!-- <link href="http://139.199.178.177/public/assets/css/colors_3.css" rel="stylesheet"> -->
    <!-- <link href="http://139.199.178.177/public/assets/css/colors_4.css" rel="stylesheet"> -->


    <!-- Plugin stylesheets -->
    <link href="http://139.199.178.177/public/assets/css/plugins/owl.carousel.css" rel="stylesheet">
    <link href="http://139.199.178.177/public/assets/css/plugins/owl.theme.css" rel="stylesheet">
    <link href="http://139.199.178.177/public/assets/css/plugins/owl.transitions.css" rel="stylesheet">
    <link href="http://139.199.178.177/public/assets/css/plugins/animate.css" rel="stylesheet">
    <link href="http://139.199.178.177/public/assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <link href="http://139.199.178.177/public/assets/css/plugins/jquery.mb.YTPlayer.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="http://139.199.178.177/public/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script>
        document.createElement('video');
    </script>
    <![endif]-->

</head>

<body id="home">
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header pull-left">
            <a class="navbar-brand page-scroll" href="#page-top">
                <!-- replace with your brand logo/text -->
                <span class="brand-logo">高铁订餐online</span>
            </a>
        </div>
        <div class="main-nav pull-right">
            <div class="button_container toggle">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
        </div>
        <div class="overlay" id="overlay">
            <nav class="overlay-menu">
                <ul>
                    <li><a href="#adddishdiv">添加菜品</a></li>
                    <li><a href="#weihudiv">菜品维护</a></li>
                    <li><a href="#dingdandiv">订单管理</a></li>
                    <li><a href="#daochudiv">销售报表</a></li>
                    <li><a href="#changediv">修改密码</a></li>
                </ul>
            </nav>
        </div>
    </div><!-- /.container -->
</nav>



<!-- Intro Header -->
<!-- Full Page Image Background Carousel Header -->
<header id="intro-carousel" class="carousel slide">
    <!-- Optional Indicators -->
    <!-- <ol class="carousel-indicators">
            <li data-target="#intro-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#intro-carousel" data-slide-to="1"></li>
            <li data-target="#intro-carousel" data-slide-to="2"></li>
        </ol> -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('http://139.199.178.177/public/assets/images/bg.jpg');"></div>
            <div class="carousel-caption">
                <h1 class="animated slideInDown">高铁列车订餐应用 <span class="highlight">后台管理</span></h1>
                <p class="intro-text animated slideInUp">欢迎使用高铁列车订餐系统，享受移动互联网时代，在线精选套餐，多样选择，立即送达</p>

                @yield("button")

            </div>
            <div class="overlay-detail"></div>
        </div><!-- /.item -->

    </div>

    <div class="mouse"></div>
</header>


@yield("content");

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 segment">
                <p class="white">Welcome to the use of high speed iron ordering web system</p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row text-center">
            <div class="col-md-12 social segment">
                <h4>欢迎使用高铁订餐web系统软件</h4>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="copynote">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">Copyright &copy; 2018 高铁订餐在线web系统</div><!-- /.col-md-12 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.copynote -->

    <div class="nav pull-right scroll-top">
        <a href="#home" title="Scroll to top">↑</a>
    </div>

</footer><!-- /.footer -->



    <!-- jQuery -->
    <script src="http://139.199.178.177/public/assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://139.199.178.177/public/assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://139.199.178.177/public/assets/js/plugins/wow.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/owl.carousel.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.parallax-1.1.3.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.mb.YTPlayer.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.countTo.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.inview.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/pace.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.easing.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/jquery.validate.min.js"></script>
    <script src="http://139.199.178.177/public/assets/js/plugins/additional-methods.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoVKfEihX__NdMwdDysA6Vve6PE9Ierj4"></script>

    <!-- Custom JavaScript -->
    <script src="http://139.199.178.177/public/assets/js/hallooou.js"></script>

@yield("js")
</body>

</html>
