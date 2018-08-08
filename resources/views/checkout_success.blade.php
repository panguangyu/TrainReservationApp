@extends("layouts.tiny")

@section('title', '结算成功')

@section("content")
    <style>
        #desc:hover{

            background-color: white;
        }

    </style>
    <section id="dsec" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="caption gray">为您方便快捷的提供高铁列车快餐服务</h3>
                </div><!-- /.col-md-12 -->
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="./chooseTrain">返回主页</a>

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">

<div data-role="page" id="pageten">
    <div data-role="header">
        <h1>结算成功</h1>
        <h4>约20分钟后送达！祝您旅途愉快！</h4>
    </div>
</div>

                            </div><!-- /.row -->
                        </div><!-- /.col-md-4 -->


                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.section -->

@endsection

@section("js")

@endsection