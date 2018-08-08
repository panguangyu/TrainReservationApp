@extends("layouts.tiny")

@section('title', '选择列车')

@section("content")
    <section id="login_sec" class="services content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="caption gray">为您方便快捷的提供高铁列车快餐服务</h3>
                </div><!-- /.col-md-12 -->

                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="row services-item text-center wow flipInX" data-wow-offset="10">
<div data-role="page" id="pagesix" style="margin-top:40px;">
  <div data-role="header">

  <h1>请选择列车车次</h1>
  </div>
    <table border="1" style="color:black" width="100%">
        <tr style="color:black;height:50px;background-color: orange">
            <td>高铁（G/C）</td>
            <td>动车（D）</td>
            <td>普通（Z/K/T）</td>
            <td>其他（L/Y等）</td>
        </tr>
        <tr style="color:black;height:50px;">
            <td><a href="./index?train=C6972" style="color:black">C6972</a></td>
            <td><a href="./index?train=D1245" style="color:black">D1245</a></td>
            <td><a href="./index?train=K777" style="color:black">K777</a></td>
            <td><a href="./index?train=Y156" style="color:black">Y156</a></td>
        </tr>
        <tr style="color:black;height:50px;">
            <td><a href="./index?train=G1536" style="color:black">G1536</a></td>
            <td><a href="./index?train=D6985" style="color:black">D6985</a></td>
            <td><a href="./index?train=K811" style="color:black">K811</a></td>
            <td><a href="./index?train=Y248" style="color:black">Y248</a></td>
        </tr>
    </table>
    <br />
    <a class="btn btn-default btn-lg" href="javascript:back()">返 回</a>
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