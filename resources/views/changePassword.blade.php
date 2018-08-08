@extends("layouts.tiny")

@section('title', '主页')

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
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
<div data-role="page" id="pageseven">
    <div data-role="header">
        <h1>修改密码</h1>
    </div>
    <div data-role="content" align="center">
            <div class="ui-field-contain">
                <p style="height:50px;"><label for="fname">原始密码：</label>
                <input type="text" name="fname1" id="oldPassword" data-clear-btn="true" style="color:black;"></p>
                <p style="height:50px;"><label for="lname">新的密码：</label>
                <input type="password" name="pwd" id="newPassword" data-clear-btn="true" style="color:black;"></p>
                <p style="height:50px;"><label for="lname">确认密码：</label>
                <input type="password" name="pwd1" id="newPassword2" data-clear-btn="true" style="color:black;"></p>
            </div>
            <br />
            <a id="submit" class="btn btn-default" style="margin-right:30px">提交</a> <a href="./index" class="btn btn-default">返回首页</a>
    </div>
    <div data-role="footer">
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

    $("#submit").click(function () {

        if (($("#newPassword").val() == $("#newPassword2").val()) && $("#newpassword").val()!='') {


        }else{
            alert("两次密码不一致");
            return;
        }

        $.ajax({
            type:'post',
            url:'./changePassword_check',
            data:{"oldPassword":$("#oldPassword").val(), "newPassword":$("#newPassword").val()},
            success:function(json){

                if (json.status == 1) {

                    alert("修改成功");

                    window.location = "./login";

                } else {

                    alert("修改失败，旧密码有误");

                    return;
                }

            }
        });

    });

</script>
    @endsection