@extends("layouts.tiny")

@section('title', '我的订单')

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
                <a style="padding:3px 10px 3px 10px;background-color: red" href="./orderList" data-icon="bars">全部</a>
                <a style="padding:3px 10px 3px 10px;background-color: red" href="./orderList?type=0" data-icon="bars">待提交</a>
                <a style="padding:3px 10px 3px 10px;background-color: red" href="./orderList?type=1" data-icon="clock">待收餐</a>
                <a style="padding:3px 10px 3px 10px;background-color: red" href="./orderList?type=2" data-icon="comment">已完成</a>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">

<div data-role="page" id="pagenine">
    <div data-role="header">
        <h1>我的订单</h1>

    </div>
    <div data-role="main" class="ui-content">
        <table width="100%" border="0">
            @foreach($result as $res)
                @if($res['type'] == 1)
            <tr style="height:120px;">
                <td width="110"><a href="./dish?id={{ $res['id'] }}"><img src="{{ $res['pic'] }}" width="100" height="100"></a></td>
                <td width="260" style="text-align: left;padding-left:10px"><h2 style="color:black">{{ $res['name'] }}</h2>
                    <span style="color:black">下单时间：{{ $res['time'] }} , 总价：￥{{ $res['price'] }}</span> </td>

                <td><a style="font-size: 20px;color:black">待收餐</a><br><br><a href="./comment?dish_id={{ $res['id'] }}" style="color:#FF9900">确认评价</a></td>
            </tr>
                @endif
                @if($res['type'] == 2)
            <tr style="height:120px;">
                <td width="110"><a href="./dish?id={{ $res['id'] }}"><img src="{{ $res['pic'] }}" width="100" height="100"></a></td>
                <td width="260" style="text-align: left;padding-left:10px"><h2 style="color:black">{{ $res['name'] }}</h2>
                    <span style="color:black">下单时间：{{ $res['time'] }} , 总价：￥{{ $res['price'] }}</span></td>

                <td><a style="font-size: 20px;color:#0066FF">已完成</a><br><br><a href="./dish?id={{ $res['id'] }}" style="color:#FF9900">再来一单</a></td>
            </tr>
                    @endif
                    @if($res['type'] == 0)
            <tr style="height:120px;">
                <td width="110"><a href="./dish?id={{ $res['id'] }}"><img src="{{ $res['pic'] }}" width="100" height="100"></a></td>
                <td width="260"  style="text-align: left;padding-left:10px"><h2 style="color:black">{{ $res['name'] }}</h2>
                    <span style="color:black">数量：{{ $res['number'] }} , 总价：￥{{ $res['price'] }}</span></td>

                <td><a style="font-size: 20px;color:#0066FF">待提交</a><br><br><a href="./checkout" style="color:orange">付 款</a></td>
            </tr>
                    @endif
                @endforeach
        </table>
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
    function back() {

        window.history.back(-1);
    }

</script>
@endsection
