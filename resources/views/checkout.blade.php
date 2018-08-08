@extends("layouts.tiny")

@section('title', '结算')

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
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="javascript:window.history.back(-1);">返回上一页</a>

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">

<div data-role="page" id="pageeight">
    <div data-role="header">
        <h1>结 算</h1>
    </div>
    <div data-role="main" class="ui-content">
        <form method="post" action="">
            <div data-role="fieldcontain">
                <fieldset data-role="controlgroup" data-type="horizontal" >
                    <label for="chexiang" style="color:black;">选择车厢：</label>
                    <select name="chexiang" id="chex" style="color:black;">
                        <option value="1">01车厢</option>
                        <option value="2">02车厢</option>
                        <option value="3">03车厢</option>
                        <option value="4">04车厢</option>
                        <option value="5">05车厢</option>
                        <option value="6">06车厢</option>
                        <option value="7">07车厢</option>
                    </select>
                    ,
                    <label for="zuowei" style="color:black;">选择座位号：</label>
                    <select name="zuowei" id="zuow" style="color:black;">
                        <option value="112">112</option>
                        <option value="113">113</option>
                        <option value="114">114</option>
                        <option value="115">115</option>
                        <option value="116">116</option>
                        <option value="117">117</option>
                        <option value="118">118</option>
                        <option value="119">119</option>
                        <option value="120">120</option>
                    </select>
                </fieldset>
            </div>
        </form>
        <hr>
        <table width="100%" align="center" border="0">
            @foreach($dishes as $dish)
            <tr align="left" style="height:120px;">
                <td width="100"><img src="{{ $dish['pic'] }}" width="100" height="100"></td>
                <td style="text-align: left;padding-left:20px"><h3 style="color:darkslategrey;">{{ $dish['name'] }}</h3>
                    <span style="color:purple;font-weight: bold;font-size:18px;">X&nbsp;{{ $dish['number'] }}</span></td>
                <td style="color:orange;font-weight:bold;font-size:22px;">￥：&nbsp;{{ $dish['price'] }}</td>
            </tr>
            @endforeach
        </table>

        <table border="0" width="100%" style="margin-top:30px;border:3px dotted red">
            <tr style="height:10px;"></tr>
            <tr style="height:30px;">
                <td style="color:black;width:20%">包装费用</td>
                <td style="color:black;">￥1.5</td>
            </tr>
            <tr style="height:30px;">
                <td style="color:black;">配送费用</td>
                <td style="color:black;">￥0</td>
            </tr>
            <tr style="height:30px;">
                <td style="color:black;">支付方式</td>
                <td style="color:black;">餐到付款</td>
            </tr>
            <tr style="height:50px;">
                <td style="color:black;">下单备注</td>
                <td  style="color:black;"><input type="text" placeholder="口味偏好及用餐人数" id="remark" style="color:black;"></td>
            </tr>
            <tr style="height:50px;">
                <td style="color:black;">您的姓名</td>
                <td><input type="text" id="name" style="color:black;"></td>
            </tr>
            <tr style="height:50px;">
                <td style="color:black;">联系方式</td>
                <td><input type="text" id="contact" style="color:black;"></td>
            </tr>
            <tr>
                <td style="color:black;">马上支付</td>
                <td style="color:black;"><br />
                    约20分钟后送达！祝您旅途愉快！<br /><br />
                    合计：￥{{ $money }}  <a href="javascript:submit()" class="btn btn-default" style="margin-left:10px;font-size:large; background-color:#F60" name="sum" value="jiesuan" >提交订单</a></td>
            </tr>
            <tr style="height:10px;"></tr>
        </table>
    </div>
    <div data-role="footer" align="center">
        <table width="470">
            <tr>
                <td width="300" align="right" style="color:black;"></td>
                <td width="120" align="right" style="color:black;"></td>
            </tr>
        </table>
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
    function submit() {

        var chex = $("#chex").val();
        var zuow = $("#zuow").val();
        var name = $("#name").val();
        var contact = $("#contact").val();
        var remark = $("#remark").val();

        if (!name || !contact) {

            alert("联系人和联系方式都必填");
            return;
        }

        $.ajax({
            type:'post',
            url:"./submitCheckout",
            data:{"chex":chex, "zuow":zuow, "name":name, "contact":contact, "remark":remark},
            success:function (json) {
                alert("提交成功");

                window.location = "./checkoutSuccess";
            }
        });

    }
    function back() {

        window.history.back(-1);
    }
</script>
@endsection