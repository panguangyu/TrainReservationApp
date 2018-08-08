<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Cart;
use App\Dish;
use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function addDish() {

        $dish = Dish::get();

        $dingdan = Order::where("type", 1)->get();

        $order = array();

        foreach ($dingdan as $key => $dd) {
            $order[$key]['id'] = $dd->id;
            $order[$key]['username'] = $dd->name;

            $order[$key]['contact'] = $dd->contact;
            $order[$key]['remark'] = $dd->remark;

            $location = explode(",", $dd->location);

            $order[$key]['location'] = $location[0]."车厢".$location[1]."号";

            $dishids = explode(",", $dd->dish_id);

            array_pop($dishids);

            $dishname = "";

            foreach ($dishids as $dishid){

                $name = Dish::where("id", $dishid)->get()->first();

                if ($name) {

                    $name = $name->name;

                } else {

                    $name = "";
                }

                if ($dishid) {
                    $dishname .= $name." ";
                }

            }

            $order[$key]['dishname'] = $dishname;

            $order[$key]['status'] = $dd->status;
        }



      //var_dump($order);exit;
        return view("admin.adddish", ['dish' => $dish, 'order' => $order]);
    }

    public function addDishAction(Request $request) {
        $train_id = $request->input("train_id");
        $name = $request->input("name");
        $price = $request->input("price");
        $sells = $request->input("sells");
        $desc = $request->input("desc");
        $pic = $request->input("pic");

        if (!$train_id || !$name || !$price || !$sells || !$desc || !$pic) {
            return array("status" => 0);
        }

        $dish = new Dish();
        $dish->name = $name;
        $dish->desc = $desc;
        $dish->price = $price;
        $dish->sells = $sells;
        $dish->train_id = $train_id;
        $dish->pic = $pic;
        $dish->time = date("Y-m-d H:i:s");

        $dish->save();
        return array("status" => 1);

    }

    function searchAction(Request $request) {
        $dishid = $request->input("dishid");
        $dishname = $request->input("name");

        $dish = Dish::whereRaw("1 = 1");
        if ($dishid) {

            $dish->where("id", $dishid);

        }
        if ($dishname) {

            $dish->where("name", "like", "%{$dishname}%");
        }

        $dish = $dish->get();

        $res = array();
        foreach ($dish as $di) {
            $res[] = $di;
        }
        return $res;
    }

    function jiedan(Request $request) {

        $id = $request->input("id");

        $order = Order::where("id", $id)->update(['status' => 1]);

    }

    function deldish(Request $request)
    {

        if (!session("admin")) {

            return redirect(view("adminlogin"));
        }


        $dish_id = $request->input("dish_id");

        $del = Dish::where("id", $dish_id)->delete();

        if ($del) {

            return array("status" => 1);
        } else {

            return array("status" => 0);
        }
    }

    function login(Request $request) {

        if (session("admin")) {

            return redirect(view("admin"));
        }


        $username = $request->input("username");
        $password = $request->input("password");

        $admin = Admin::where("username", $username)->where("password", md5($password))->get()->first();

        if ($admin) {

            session(['admin' => $username]);

            return array("status" => 1);

        } else {

            return array("status" => 0);
        }


    }

    public function logout(Request $request) {

        $request->session()->forget('admin');

        return redirect(route("adminlogin"));
    }

    public function changePassword(Request $request) {

        if (!session("admin")) {

            return redirect(view("adminlogin"));
        }

        $oldPassowrd = $request->input("oldPassword");

        $newPassword = $request->input("newPassword");

        // 查看数据库中旧密码是否正确

        $check = Admin::where("username", session("admin"))->get()->first();

        if (($check->password) == md5($oldPassowrd)) {

            Admin::where("username", session("admin"))->update(['password' => md5($newPassword)]);

            // 清除原来cookie重新登录

            $request->session()->forget('admin');

            return array("status" => 1);
        } else {

            return array("status" => 0);
        }

    }

    public function sellList(Request $request) {

      //  $year = $request->input("year");
        //$month = $request->input("month");
        //$day = $request->input("day");

        $date = $request->input("date");
        //$date = $year."-".$month."-".$day;

        $orders = Order::whereRaw("Date(time) = '$date'")->where("type", 1)->get();

        if ($orders->isEmpty()) {

            return array("status" => 0);
        }

        //var_dump($orders);
        //找出每一份菜

        $result = array();

        foreach ($orders as $key => $order) {

            $dishid = explode(",", $order->dish_id);

            array_pop($dishid);

            foreach ($dishid as $dd) {

                $result[$dd]['orderid'] = $order->id;

                $result[$dd]['dishid'] = $dd;

                $result[$dd]['dishname'] = Dish::where("id", $dd)->get()->first()->name;

                $result[$dd]['price'] = Dish::where("id", $dd)->get()->first()->price;

                if (isset($result[$dd]['sells'])) {

                    $result[$dd]['sells']++;

                } else{

                    $result[$dd]['sells'] = 1;
                }

                if (isset($result[$dd]['money'])) {

                    $result[$dd]['money'] += $result[$dd]['price'];

                } else {

                    $result[$dd]['money'] = $result[$dd]['price'];
                }
               // $result[$key]['sells'] = $order->
            }

        }

        return array_values($result);


    }

    public function export(Request $request) {

        $date = $request->input("date");
        $orders = Order::whereRaw("Date(time) = '{$date}'")->whereRaw("type = 1")->get();

        if ($orders->isEmpty()) {

            return array("status" => 0);
        }

        //var_dump($orders);
        //找出每一份菜

        $result = array();

        foreach ($orders as $key => $order) {

            $dishid = explode(",", $order->dish_id);

            array_pop($dishid);

            foreach ($dishid as $dd) {

                $result[$dd]['orderid'] = $order->id;

                $result[$dd]['dishid'] = $dd;

                $result[$dd]['dishname'] = Dish::where("id", $dd)->get()->first()->name;

                $result[$dd]['price'] = Dish::where("id", $dd)->get()->first()->price;

                if (isset($result[$dd]['sells'])) {

                    $result[$dd]['sells']++;

                } else{

                    $result[$dd]['sells'] = 1;
                }

                if (isset($result[$dd]['money'])) {

                    $result[$dd]['money'] += $result[$dd]['price'];

                } else {

                    $result[$dd]['money'] = $result[$dd]['price'];
                }
                // $result[$key]['sells'] = $order->
            }

        }

        //var_dump($result);

        //$list = array(array('id'=>1,'username'=>'YQJ','sex'=>'男','age'=>24));

        $filename = "报表";
        //菜品ID	菜名	销量	单价	销售额
        $header = array("订单编号", "菜名ID", "菜名", "销量", "单价", "销售额");
        $index = array('orderid', 'dishid','dishname','sells','price','money');
        $this->createtable($result, $filename, $header, $index);
    }

    protected function createtable($list,$filename,$header=array(),$index = array()){
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=".$filename.".xls");
        $teble_header = implode("\t",$header);
        $strexport = $teble_header."\r";
        foreach ($list as $row){
            foreach($index as $val){
                $strexport.=$row[$val]."\t";
            }
            $strexport.="\r";

        }
        $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);
        exit($strexport);
    }


}
