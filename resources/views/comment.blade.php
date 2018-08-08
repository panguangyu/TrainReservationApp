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
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="./chooseTrain">返回主页</a>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">

<div data-role="page" id="pageten">
    <div data-role="header">
        <h1>发表评价</h1>

    </div>
    <div data-role="main" class="ui-content">
        <table width="100%" align="center">
            <tr>
                <td><img src="{{ $pic }}" width="80%" height="300px"></td>
            </tr>
            <tr>
                <td colspan="7">
                    <br />
                    <textarea style="width:100%;height: 92px; color:black;" data-role="none" data-theme="a" id="comment"></textarea>
                    <br /><br />
                    <a href="javascript:save()" class="btn btn-default">评价并确认</a>
                </td>
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
    function save() {
        var dish_id = <?php echo $dish_id;?>;
        var comment = $("#comment").val();
        $.ajax({
            type:'post',
            url:'./saveComment',
            data:{"dish_id":dish_id, "comment":comment},
            success:function (json) {
                if (json.status ==0) {

                    wndow.location = "./login";
                } else {

                    alert("发布成功");

                    window.location = "./dish?id="+dish_id;
                }

            }
        });
    }

</script>
@endsection