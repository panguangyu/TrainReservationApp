@extends("layouts.admin")

@section('title', '登录')

@section("button")
    <a class="btn btn-default btn-lg" href="#logindiv">登 录</a>
    @endsection

@section("content")
    <style>
        #desc:hover{

            background-color: white;
        }

    </style>
    <section id="logindiv" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="caption gray">为您方便快捷的提供高铁列车快餐服务</h3>
                </div><!-- /.col-md-12 -->

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
<h1 align="center">登录高铁点餐系统</h1>
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
                                    <a class="btn btn-default btn-lg" id="butt">登 录</a>
                                </p>


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
    $("#butt").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();

        $.ajax({
            type:"post",
            url:"./loginaction",
            data:{"username":username, "password":password},
            success:function (json) {
                if (json.status == 1) {
                    window.location = "./adddish";

                }else {
                    alert("登陆失败");
                    return;
                }
            }

        });
    })
</script>
@endsection
