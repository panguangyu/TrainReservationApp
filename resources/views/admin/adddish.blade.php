@extends("layouts.admin")

@section('title', '登录')

@section("button")
    <a class="btn btn-default btn-lg" href="./logout">退出登录</a>
@endsection

@section("content")
    <section id="adddishdiv" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="caption gray">为您方便快捷的提供高铁列车快餐服务</h3>
                </div><!-- /.col-md-12 -->

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">

    <div id="tabs-1">
            <h3>添加菜品</h3>
            <table align="center" border="0" style="width:100%">
                <tr style="height:30px;">
                    <td style="color:black">所属车厢：</td>
                    <td style="color:black"><select id="train_id" style="width:70%;color:black">
                            <option value="C6972">C6972</option>
                            <option value="G1536">G1536</option>
                            <option value="D1245">D1245</option>
                            <option value="D6985">D6985</option>
                            <option value="K777">K777</option>
                            <option value="K811">K811</option>
                            <option value="Y156">Y156</option>
                            <option value="Y248">Y248</option>
                        </select></td>
                </tr>

                <tr style="height:30px;color:black">
                    <td>菜品名字：</td>
                    <td><input type="text" name="name2"  id="name" style="width:70%;color:black"/></td>
                </tr>

                <tr style="height:30px;color:black">
                    <td>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</td>
                    <td><input type="text" name="name2"  id="price" style="width:70%;color:black"/></td>
                </tr>

                <tr style="height:30px;color:black">
                    <td>销&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量：</td>
                    <td><input type="text" name="name3"  id="sells" style="width:70%;color:black"/></td>
                </tr>

                <tr style="height:30px;color:black">
                    <td>菜品描述：</td>
                    <td><textarea name="name4" row="5" cols="18" id="desc" style="width:70%;color:black"/></textarea></td>
                </tr>

                <tr style="height:30px;color:black">
                    <td>菜品图片URL：</td>
                    <td><input type="text" id="pic" style="width:70%;color:black" /></td>
                </tr>

                <tr style="height:80px;color:black">
                    <td colspan="2">
                        <a class="btn btn-default" onclick="adddish()">提 交</a></td>
                </tr>
            </table>
    </div>


</div><!-- /.row -->
                            </div><!-- /.col-md-4 -->


                        </div><!-- /.row -->
                    </div><!-- /.container -->

                </div><!-- /.row -->
            </div><!-- /.container -->
    </section><!-- /.section -->

    <section id="weihudiv" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
    <div id="tabs-2">
        <h3>菜品维护</h3>
        <div id="tabs-2-1"><span class="ui-icon ui-icon-search "></span>
            <input type="search" placeholder="菜品ID..." id="dishid" style="color:black;width:20%;">&nbsp;&nbsp;&nbsp;
            <input type="search" placeholder="查找菜名..." id="dishname" style="color:black;width:40%;">
            <a id="search" class="btn-default" style="padding:3px 10px 3px 10px;background-color: orange">搜 索</a>
        </div>
            <table id="customers" width="100%" border="0" style="margin-top:30px;">
                <tr id="header">
                    <th style="text-align: center;color:black">菜品ID</th>
                    <th style="text-align: center;color:black">图片</th>
                    <th style="text-align: center;color:black">菜名</th>
                    <th style="text-align: center;color:black">单价</th>
                    <th style="text-align: center;color:black">月销量</th>
                    <th style="text-align: center;color:black">操作</th>
                </tr>
                @foreach($dish as $di)
                <tr style="height:120px;">
                    <td style="text-align: center;color:black">{{ $di->id }}</td>
                    <td><img src="{{ $di->pic }}" width="80" height="80"></td>
                    <td style="text-align: center;color:black">{{ $di->name }}</td>
                    <td style="text-align: center;color:black">{{ $di->price }}</td>
                    <td style="text-align: center;color:black">{{ $di->sells }}</td>
                    <td><a href='javascript:del({{ $di->id }})' style="color:red">删除</a></td>
                </tr>
                    @endforeach
            </table>

    </div>

                            </div><!-- /.row -->
                        </div><!-- /.col-md-4 -->


                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.section -->

    <section id="dingdandiv" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
                                <h3>订单管理</h3>
        <table id="tabs-3-1" style="width:100%;color:black;margin-top: 30px" border="0">
            <tr style="height:42px;">
                <th width="15%" style="text-align: left;font-size:15px;">订单号</th>
                <th width="9%" style="text-align: left;font-size:15px;">姓名</th>
                <th width="18%" style="text-align: left;font-size:15px;">联系方式</th>
                <th width="15%" style="text-align: left;font-size:15px;">位置</th>
                <th width="15%" style="text-align: left;font-size:15px;">菜品</th>
                <th width="13%" style="text-align: left;font-size:15px;">备注</th>
                <th width="15%" style="text-align: left;font-size:15px;">操作</th>
            </tr>
            @foreach($order as $od)
            <tr style="height:35px;">
                <td style="text-align: left;font-size:17px;">{{ $od['id'] }}</td>
                <td style="text-align: left;font-size:17px;">{{ $od["username"] }}</td>
                <td style="text-align: left;font-size:17px;">{{ $od['contact'] }}</td>
                <td style="text-align: left;font-size:17px;">{{ $od['location'] }}</td>
                <td style="text-align: left;font-size:17px;">{{ $od['dishname'] }}</td>
                <td style="text-align: left;font-size:17px;">{{ $od['remark'] }}</td>
                <td style="text-align: left;font-size:17px;"><span class="ui-icon ui-icon-clock"></span>
                    @if($od['status'] == 1)
                    <a>已接单</a>
                    @endif
                    @if($od['status'] == 0)
                    <a href="javascript:jiedan({{ $od['id'] }});" style="color:red;font-weight:bold">接单</a>
                    @endif
                    </td>

            </tr>
                @endforeach
        </table>

                            </div><!-- /.row -->
                        </div><!-- /.col-md-4 -->


                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.section -->


    <section id="daochudiv" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
                                <h3>销售报表</h3>
    <div id="tabs-4">
        <div id="tabs-4-1">
            <input type="text" placeholder="日期格式为：2018-06-13" id="date" style="color:black"/>
            <a class="btn-default" style="padding:3px 10px 3px 10px;background-color: red" id="searchSell">搜 索</a> <a href="javascript:exporter()" class="btn-default" style="padding:3px 10px 3px 10px;background-color: orange">导出报表</a>
        </div>
        <table id="selllist" border="0" style="margin-top:35px;width:100%;text-align:center;border:1px solid grey"></table>
    </div>

                            </div><!-- /.row -->
                        </div><!-- /.col-md-4 -->


                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.section -->


    <section id="daochudiv" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
                                <h3>修改密码</h3>
    <div id="tabs-5">
        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr style="height:40px;">
                <td style="color:black;font-size:18px;">原&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" id="oldpassword"/></td>
            </tr>
            <tr style="height:40px;">
                <td  style="color:black;font-size:18px;">新&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" id="newpassword"/></td>
            </tr>
            <tr style="height:40px;">
                <td style="color:black;font-size:18px;">确认密码：<input type="password" id="newpassword2"/></td>
            </tr>

            <tr align="center" style="height:80px;">
                <td style="color:black"><a href="javascript:changepassword()" class="btn btn-default">修 改</a>
            </tr>
        </table>
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
    function adddish(){
        var train_id = $("#train_id").val();
        var name = $("#name").val();
        var price = $("#price").val();
        var sells = $("#sells").val();
        var desc = $("#desc").val();
        var pic = $('#pic').val();

        if (!train_id || !name || !price || !sells || !desc || !pic) {
            alert("请输入所有必填项");
            return;
        }

        //console.log(pic);
        $.ajax({
            type:"post",
            url:"./adddish_action",
            data:{"train_id":train_id, "name":name, "price":price, "sells":sells, "desc":desc, "pic":pic},
            success:function (json) {
                if (json.status == 1) {
                    alert("添加成功");
                    window.location = "./adddish";
                } else {
                    alert("添加失败");
                }
            }
        });
    }

    function del(id) {
        if(window.confirm('你确定要删除该菜品吗？')){
            $.ajax({
                type:"post",
                url:"./deldish_action",
                data:{"dish_id":id},
                success:function (json) {
                    if (json.status == 1) {
                        alert("删除成功");
                        window.location = "./";
                    } else {
                        alert("删除失败");
                    }
                }
            });
            return true;
        }else{

            return false;
        }
    }

    function jiedan(id) {

        $.ajax({
            type:"post",
            url:"./jiedan",
            data:{"id":id},
            success:function (json) {
                alert("接单成功");
            }

        });

    }

    $("#search").click(function () {
       var dishid = $("#dishid").val();
       var name = $("#dishname").val();
        $.ajax({
            type:"post",
            url:"./search_action",
            data:{"dishid":dishid, "name":name},
            success:function (json) {

                var arr = json;

                $("#customers").html(" ");

                $("#customers").append("               <tr id=\"header\">\n" +
                    "                    <th style=\"text-align: center;color:black\">菜品ID</th>\n" +
                    "                    <th style=\"text-align: center;color:black\">图片</th>\n" +
                    "                    <th style=\"text-align: center;color:black\">菜名</th>\n" +
                    "                    <th style=\"text-align: center;color:black\">单价</th>\n" +
                    "                    <th style=\"text-align: center;color:black\">月销量</th>\n" +
                    "                    <th style=\"text-align: center;color:black\">操作</th>\n" +
                    "                </tr>");

                for(var i=0;i<arr.length;i++){
                    $("#customers").append("<tr><td>"+json[i]['id']+"</td><td><img src='"+json[i]['pic']+"' width=\"80\" height=\"80\"></td> " +
                        "<td>"+json[i]['name']+"</td><td>"+json[i]['price']+"</td><td>"+json[i]['sells']+"份</td>" +
                        "<td><span class='ui-icon ui-icon-pencil'></span>" +
                        "<span class='ui-icon ui-icon-trash'></span><font color='#FF0000'>删除</font></td>" +
                        "</tr>");

                }

            }
        });

    });

    function changepassword() {
        var oldpassword = $("#oldpassword").val();
        var newpassword = $("#newpassword").val();

        if ((newpassword == $("#newpassword2").val()) && newpassword!='') {


        }else{
            console.log(newpassword);
            console.log($("#newPassword2").val());

            alert("两次密码不一致");
            return;
        }

        $.ajax({
            type:"post",
            url:"./changepassword",
            data:{"oldPassword":oldpassword, "newPassword":newpassword},
            success:function (json) {

                if (json.status == 1) {

                    alert("修改成功");

                    window.location = "./login";

                } else {

                    alert("修改失败，旧密码有误");

                    return;
                }
            }

        });
    }

    function exporter(){
        var date = $("#date").val();

        var expr = /^([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8])))$/;

        if(!expr.test(date)) {

            alert("日期格式有误，格式应为2018-06-13");

            return;
        }

        window.location = "./export?date="+date;
    }

    $("#searchSell").click(function () {

        var date = $("#date").val();

        var expr = /^([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8])))$/;

        if(!expr.test(date)) {

            alert("日期格式有误，格式应为2018-06-13");

            return;
        }

        $.ajax({
            type:"get",
            url:"./sellList",
            data:{"date":date},
            success:function (jsonx) {

                if (jsonx.status == 0) {

                    alert("无该数据日期");
                }

               // var json = JSON.parse(json);

                $("#selllist").html(" ");

                $("#selllist").append("            <tr style='background-color: green;color:white;height:40px;'>\n" +
                    "                <th width=\"12%\" style='font-size:16px;padding-left:10px;'>订单编号</th>\n" +
                    "                <th width=\"12%\" style='font-size:16px;padding-left:10px;'>菜品ID</th>\n" +
                    "                <th width=\"24%\" style='font-size:16px;padding-left:10px;'>菜名</th>\n" +
                    "                <th width=\"13%\" style='font-size:16px;padding-left:10px;'>销量</th>\n" +
                    "                <th width=\"18%\" style='font-size:16px;padding-left:10px;'>单价</th>\n" +
                    "                <th width=\"21%\" style='font-size:16px;padding-left:10px;'>销售额</th>\n" +
                    "            </tr>\n");


                var len = Object.keys(jsonx).length;

               // console.log(jsonx[2]['dishid']);

                for(var i=0;i<=len;i++) {

                    $("#selllist").append("           <tr style='height:40px;'>\n" +
                        "                <td style='color:black;font-size:16px;text-align:left;padding-left:10px;'>"+jsonx[i]['orderid']+"</td>\n" +
                        "                <td style='color:black;font-size:16px;text-align:left;padding-left:10px;'>"+jsonx[i]['dishid']+"</td>\n" +
                        "                <td style='color:black;font-size:16px;text-align:left;padding-left:10px;'>"+jsonx[i]['dishname']+"</td>\n" +
                        "                <td style='color:black;font-size:16px;text-align:left;padding-left:10px;'>"+jsonx[i]['sells']+"份</td>\n" +
                        "                <td style='color:black;font-size:16px;text-align:left;padding-left:10px;'>￥"+jsonx[i]['price']+"</td>\n" +
                        "                <td style='color:black;font-size:16px;text-align:left;padding-left:10px;'>"+jsonx[i]['money']+"元</td>\n" +
                        "            </tr>");

                }

            }
        });

    })
</script>
@endsection