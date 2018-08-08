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
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="./cart">我的购物车</a>
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="./changePassword">修改密码</a>
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="./orderList">我的订单</a>
                <a style="padding:3px 10px 3px 10px;background-color: orange" href="./logout">退出系统</a>

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
<div data-role="page" id="pagefour">
  <div data-role="header" data-position="fixed">

    <h2>{{ $login }}，你好，欢迎来到高铁点餐主页</h2>


  </div>
  <div data-role="content">
  <div id="search">
     <input id="searchBar" type="text" value="" style="color:black;width:100px;" />
      <a class="btn-default" id="searchButt" style="padding:3px 10px 3px 10px;">查 询</a>
      <a href="./chooseTrain" class="btn-default" style="padding:3px 10px 3px 10px;background-color: blue">其他列车</a>

     <table width="100%" style="margin-top: 35px;border:0px solid grey" border="0">
         @foreach($dishes as $dish)
       <tr style="height:120px;">
        <td><img src="{{ $dish->pic }}" width="100" height="100"></td>
        <td style="text-align:left"><h3><a href="./dish?id={{ $dish->id }}" style="color:black">{{ $dish->name }}</a></h3><br />
            <h5 style="color:black;">￥：{{ $dish->price }} , 月销{{ $dish->sells }}份</h5>
        </td>
       </tr>
         @endforeach
     </table>

      @if(count($dishes) == 0)
          <div style="margin:10px;font-weight: bold;width:100%;color:black">暂无该菜系提供</div>
          @endif
  </div><!--content -->

</div><!-- page -->

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
    $("#searchButt").click(function(){

        var search = $("#searchBar").val().trim();

        if (search == '') {

            alert("请输入关键词");
            return;
        }

        window.location = "./index?train={{ $train_id }}&search="+search;
    });

</script>
@endsection