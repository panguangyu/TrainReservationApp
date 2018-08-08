@extends("layouts.tiny")

@section('title', '菜品详情')

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

<div data-role="page" id="ou">
    <div data-role="header">
        <h1>菜品详情</h1>
    </div>
    <div data-role="content">
        <div id="imageou"><img src="{{ $dish_pic }}" width="80%" height="300"></div>
        <br />
        <table border="0" width="100%">
            <tr>
                <td><span style="color:red;font-size:30px;font-weight:bold;vertical-align:inherit !important;">￥：{{ $dish_price }}</span>
                    <span>
                        <a class="btn btn-default" name="addcar" value="加入购物车" style="margin-left:20px; background-color:#F00;" id="add">加入购物车</a>
                    </span></td>
            </tr>
            <tr style="height:30px;"></tr>
            <tr>
                <td style="color:black;line-height:25px;text-align: left">{{ $dish_desc }}</td>

            </tr>
        </table>
        <hr>

        @foreach($comment as $ct)
        <table>
            <tr style="height:40px;">
                <td><span style="color:black;font-size:20px;font-weight: bold;margin-left:10px;">{{ $ct['name'] }} , {{ $ct['date'] }}</span> </td>
            </tr>
            <tr style="height:40px;">
                <td colspan="2"><span style="color:black;font-size:14px;">{{ $ct['comment'] }}</span></td>
            </tr>
        </table>

        <hr />
        @endforeach
    </div>
    <div data-role="footer"></div>
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

    $("#add").click(function () {
        var dish_id = <?php echo $dish_id;?>;
        $.ajax({
            type:'post',
            url:'./addCart',
            data:{"dish_id":dish_id},
            success:function (json) {
                if (json.status ==0) {

                    wndow.location = "./login";
                } else {

                    window.location = "./cart";
                }

            }
        });
    })
</script>
@endsection