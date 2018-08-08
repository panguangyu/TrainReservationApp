@extends("layouts.tiny")

@section('title', '购物车')

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
<div data-role="page" id="pagefive">
    <div data-role="header">
        <h1>我的购物车</h1>
    </div>
    <div data-role="content" align="center">
        <table align="center" width="100%">
            @foreach($carts as $key => $cart)
            <tr style="height: 120px;">
                <td width="40"><input type="checkbox" name="r1" class="dishes" id="dishes_{{ $key }}" style="color:black" ></td>
                <td width="110"><img src="{{ $cart['pic'] }}" width="100" height="100"></td>
                <td width="160"><h3 style="color:black">{{ $cart['dishname'] }}</h3>

                    <span style="color:orange;font-weight:bold">￥：</span><span id="count_price_{{ $key }}" style="color:orange;font-weight:bold">{{ $cart['dishprice'] }}</span> <span id="dishes_id_{{ $key }}" style="display: none">{{ $cart['dishid'] }}</span></td>
                <td width="160">
                    <a style="color:black" href="javascript:minus({{ $key }})" class="ui-btn ui-corner-all ui-icon-minus ui-btn-icon-notext ui-btn-inline">━</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="color:black"  class="count" id="count_{{ $key }}">{{ $cart['num'] }}</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color:black" href="javascript:plus({{ $key }})" class="ui-btn ui-corner-all ui-icon-plus ui-btn-icon-notext ui-btn-inline">┼</a></td>
            </tr>

            @endforeach
        </table>
    </div>
    <div data-role="footer" data-position="fixed" style="margin-top:30px;">
        <hr />
        <table width="100%" align="center">
            <tr>
                <td width="150">
                    <label style="height:20px; font-size:16px"> <input type="checkbox" id="selectAll" style="color:black"> <span style="color:black">全选</span></label></td>
                <td width="200" align="right" style="color:black;padding-right:30px;">合计：￥<span id="totalCount" style="color:black"></span></td>
                <td width="120" align="right">

                    <a href="javascript:balance()" class="btn-default" style="font-size:large; background-color:#F60;padding:3px 10px 3px 10px;">结算</a>
                    <a href="javascript:back()" class="btn-default" style="font-size:large; padding:3px 10px 3px 10px;">返回</a>
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
    function minus(num) {

        var oldNumber = $("#count_"+num).html();

        var newNumber = parseInt(oldNumber)-1;

        if (newNumber < 0) {

            return;
        }

        $("#count_"+num).html(newNumber);

        countTotalMoney();
    }

    function plus(num) {

        var oldNumber = $("#count_"+num).html();

        var newNumber = parseInt(oldNumber)+1;

        $("#count_"+num).html(newNumber);

        countTotalMoney();

    }

    $("#selectAll").click(function () {

        $(".dishes").attr("checked", true);

        countTotalMoney();

    });

    function countTotalMoney(){

       // console.log(1);

        var count = <?php echo count($carts);?>;

        var money = 0;

        for(var i=0;i<count;i++) {

            //console.log($("#dishes_"+i).is(":checked"));

            if ($("#dishes_"+i).is(":checked")) {

                number = $("#count_"+i).html();

                price = $("#count_price_"+i).html();

                money = money + parseFloat(parseInt(number)*parseFloat(price));
            }

        }

        $("#totalCount").html(money);
    }

    $(".dishes").click(countTotalMoney);
    
    function balance() {

        var count = <?php echo count($carts);?>;

        var money = 0;

        var ids = [];

        var numbers = [];

        for(var i=0;i<count;i++) {

            var id = $("#dishes_id_"+i).html();

            var number = $("#count_"+i).html();

            ids.push(id);

            numbers.push(number);
            //ids[id] = number;

        }

        //console.log(ids);
        //console.log(numbers);
        $.ajax({
            type:'post',
            url:'./balance',
            data:{'dishid':ids, "dishnumber":numbers, "totalMoney":$("#totalCount").html()},
            success:function (json) {

                if (json.status == 1) {

                    window.location = "./checkout";

                } else {

                    alert("金额不能为0");

                    return;
                }
            }

        });
    }

    function back() {

        window.history.back(-1);
    }

</script>
@endsection
