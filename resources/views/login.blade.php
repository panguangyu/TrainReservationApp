@extends("layouts.master")

@section('title', '登录')

@section("button")
                <a href="#login_sec" class="btn btn-default btn-lg" style='margin-right:20px;'>登 录</a>

                <a href="./register" class="btn btn-outlined btn-lg" style='margin-right:20px;'>注 册</a>
@endsection

@section("content")
    <section id="login_sec" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="caption gray">为您方便快捷的提供高铁列车快餐服务</h3>
                </div><!-- /.col-md-12 -->

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10"><!-- start -->

                                <div data-role="page">
                                    <div data-role="header">

                                        <h1>欢迎登录高铁点餐系统</h1>
                                    </div>
                                <div data-role="main" class="ui-content" align="center" >
                                    <div class="ui-field-contain">
                                        <p style="margin-top:20px">
                                        <label for="fname">用户名：</label>
                                        <input type="text" name="fname" id="username" data-clear-btn="true" style="width:300px;color:black" required>
                                        </p>
                                        <p style="margin-top:20px">
                                        <label for="lname">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
                                        <input type="password" name="pwd" id="password" data-clear-btn="true" style="width:300px;color:red" required>
                                        </p>
                                    </div>
                                    <p style="margin-top:20px">
                                        <a class="btn btn-default btn-lg" id="login">登 录</a>
                                    </p>
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
    <script>



        $("#login").click(function () {

            $.ajax({
                type:'post',
                url:'./login_check',
                data:{"username":$("#username").val(), "password":$("#password").val()},
                success:function(json){

                    if (json.status == 1) {

                        // alert("注册成功");

                        window.location = "./chooseTrain";

                    } else {

                        alert("登录失败，账号或密码有误");

                        return;
                    }

                }
            });

        });

    </script>
@endsection