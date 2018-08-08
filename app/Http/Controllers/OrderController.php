<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Comment;
use App\Dish;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function checkout() {

        $username = session("login");

        if (!session("login")) {

            return redirect(route("login"));
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        // 获取订单的信息

        $order = Order::where("user_id", $user_id)->where("type", 0)->orderBy("time", "desc")->get()->first();

        if (!$order) {

            return redirect(route("chooseTrain"));
        }

        $dishid = explode(",", $order->dish_id);
        $dishnumber = explode(",", $order->number);

        //var_dump($dishid);
       // var_dump($dishnumber);exit;

        $dishes = array();

        foreach ($dishid as $key => $dish) {

            if ($dish!=''){

                $dishes[$key]['name'] = Dish::where("id", $dish)->get()->first()->name;
                $dishes[$key]['price'] = Dish::where("id", $dish)->get()->first()->price;
                $dishes[$key]['pic'] = Dish::where("id", $dish)->get()->first()->pic;
                $dishes[$key]['number'] = $dishnumber[$key];
            }

        }

        //var_dump($dishes);exit;

        return view("checkout", ['dishes' => $dishes, 'money' => (($order->total_money)+1.5)]);
    }

    public function submit(Request $request) {

        $chex = $request->input("chex");
        $zuow = $request->input("zuow");
        $name = $request->input("name");
        $contact = $request->input("contact");
        $remark = $request->input("remark");

	date_default_timezone_set('PRC');

        $username = session("login");

        if (!session("login")) {

            return redirect(route("login"));
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        // 获取订单的信息

        $order = Order::where("user_id", $user_id)->where("type", 0)->get()->first();

        $order->name = $name;
        $order->contact = $contact;
        $order->remark = $remark;
        $order->location = $chex.",".$zuow;
        $order->type = 1;
        $order->time = date("Y-m-d H:i:s");
        $order->save();

        // 删除type为0的订单
        $order = Order::where("user_id", $user_id)->where("type", 0)->delete();

        // 清空购物车
        $cart = Cart::where("user_id", $user_id)->delete();

    }

    public function orderList(Request $request){

        $username = session("login");

        if (!session("login")) {

            return redirect(route("login"));
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        // 找出全部订单
        $type = $request->input("type");

        if ($type == ''){

            $orderList = Order::where("user_id", $user_id)->get();
        } else{

            $orderList = Order::where("user_id", $user_id)->where("type", $type)->get();
        }

       // var_dump($orderList);exit;

        $result = array();

        $loop = 0;

        foreach ($orderList as $orderKey => $order) {

            $ids = explode(",", $order->dish_id);
            array_pop($ids);
            $numbers = explode(",", $order->number);
            array_pop($numbers);
            $price = explode(",", $order->price);
            array_pop($price);
            //var_dump($ids);exit;
            $count = $orderKey+$loop;

            //var_dump($price);exit;

            for($key=0;$key<count($ids);$key++){

                $dish = Dish::where("id", $ids[$key])->get()->first();
                //var_dump($dish->name);exit;
		
		if ($dish){

                $result[$count]['pic'] = $dish->pic;
                $result[$count]['number'] = $numbers[$key];

                $result[$count]['price'] = $price[$key];
                $result[$count]['name'] = $dish->name;
                $result[$count]['type'] = $order->type;
                $result[$count]['time'] = $order->time;
                $result[$count]['id'] = $dish->id;

                $loop++;
		}

            }
        }
        //var_dump($result);exit;

        return view("orderList", ["result" => $result]);
    }


    public function comment(Request $request) {

        $username = session("login");

        if (!session("login")) {

            return redirect(route("login"));
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        // 获取dish_id和

        $dish_id = $request->input("dish_id");

        if (!$dish_id) {

            return redirect(route("chooseTrain"));
        }

        // 需要判断用户当前订单type是否为1并且该订单中存在该商品

        $dishids = Order::where("user_id", $user_id)->where("type",1)->get()->first()->dish_id;

        $dishids = explode(",", $dishids);

        array_pop($dishids);

        if (in_array($dish_id, $dishids)) {

            // 找出dish的图片

            $pic = Dish::where("id", $dish_id)->get()->first()->pic;

            return view("comment", ['pic' => $pic, 'dish_id' => $dish_id]);

        } else{

            exit;
        }


    }

    public function saveComment(Request $request) {

        $dish_id = $request->input("dish_id");

        $comment_content = $request->input("comment");

        $username = session("login");

        if (!session("login")) {

            return array("status" => 0);
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->dish_id = $dish_id;
        $comment->comment = $comment_content;
        $comment->date = date("Y-m-d");

        $comment->save();


        // 更新订单的状态为2完成

        $check = Order::where("user_id", $user_id)->where("type",1);

        $dishids = $check->get()->first()->dish_id;

        $dishids = explode(",", $dishids);

        array_pop($dishids);

        if (in_array($dish_id, $dishids)) {

            // 更新该订单

            $check->update(['type' => 2]);

        }

        return array("status" => 1);
    }
}
