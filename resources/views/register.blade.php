@extends("layouts.master")

@section('title', '注册')

@section("button")
    <a href="./login" class="btn btn-default btn-lg" style='margin-right:20px;'>登 录</a>

    <a href="#register_sec" class="btn btn-outlined btn-lg" style='margin-right:20px;'>注 册</a>
@endsection


@section("content")
    <section id="register_sec" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="caption gray">为您方便快捷的提供高铁列车快餐服务</h3>
                </div><!-- /.col-md-12 -->

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">

                                <div data-role="page">
                                    <div data-role="header">

                                        <h1>高铁乘客欢迎您，注册成为会员</h1>
                                    </div>
  <div data-role="content" align="center">

      <div class="ui-field-contain">
          <p style="margin-top:20px">
        <label for="fname">用户昵称：</label>
        <input type="text" name="fname1" id="username" data-clear-btn="true" style="width:300px;color:black" placeholder="6-20个字符">
          </p>
          <p style="margin-top:20px">
        <label for="lname">输入密码：</label>
        <input type="password" name="pwd" id="password" data-clear-btn="true" style="width:300px;color:black" placeholder="6-20个字符">
          </p>
          <p style="margin-top:20px">
        <label for="lname">确认密码：</label>
        <input type="password" name="pwd1" id="password2" data-clear-btn="true" style="width:300px;color:black">
          </p>
      </div>

      <p style="margin-top:20px">
          <a class="btn btn-default btn-lg" href="javascript:sub()">注 册</a>
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

        function sub() {

            if ($("#username").val().length <6 || $("#username").val().length >20) {

                alert("用户昵称长度不正确");

                return;

            }

            if ($("#password").val().length <6 || $("#password").val().length > 20) {

                alert("密码长度不正确");

                return;
            }

            if ($("#password").val() != $("#password2").val()) {

                alert("两次密码输入不一致");
                return;
            }

            $.ajax({
                type:'post',
                url:'./register_check',
                data:{"username":$("#username").val(), "password":$("#password").val()},
                success:function(json){
                    //var json = JSON.parse(msg);

                    if (json.status == 2) {

                        alert("用户已经存在");

                        return;
                    } else if (json.status == 1) {

                        alert("注册成功");

                        window.location = "./login";
                    } else {

                        alert("注册失败");

                        return;
                    }

                }
            });

        }

    </script>
@endsection