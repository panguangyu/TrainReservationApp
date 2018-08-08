<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index() {

        // 获取购物车
        $username = session("login");

        if (!session("login")) {

            return redirect(route("login"));
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        $cart = Cart::where("user_id", $user_id)->get();

        $cart_array = array();

        foreach ($cart as $key => $ca) {

            $dishName = Dish::where("id", $ca->dish_id)->get()->first()->name;

            $dishPrice = Dish::where("id", $ca->dish_id)->get()->first()->price;

            $dishpic = Dish::where("id", $ca->dish_id)->get()->first()->pic;

            $cart_array[$key]['dishname'] = $dishName;

            $cart_array[$key]['dishprice'] = $dishPrice;

            $cart_array[$key]['num'] = $ca->number;

            $cart_array[$key]['dishid'] = $ca->dish_id;

            $cart_array[$key]['pic'] = $dishpic;

        }

        return view("cart", ['carts' => $cart_array]);

    }

    public function balance(Request $request){

        $dishid = $request->input("dishid");

        $dishnumber = $request->input("dishnumber");

        $totalMoney = $request->input("totalMoney");

        if (!$totalMoney) {

            return array("status" => 0);
        }

        // 获取购物车
        $username = session("login");

        if (!session("login")) {

            return redirect(route("login"));
        }

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        $deleteCart = Cart::where("user_id", $user_id)->delete();

        $newTotalDishes = count($dishid);

        $dishid_string = "";

        $dishnumber_string = "";

        $dishprice_string = "";

        for($i=0;$i<$newTotalDishes;$i++) {

            $cart = new Cart();
            $cart->dish_id = $dishid[$i];
            $cart->number = $dishnumber[$i];
            $cart->user_id = $user_id;
            $cart->save();

            // 根据dish_id查看dish_number并统计每个菜对应数量的价格
            $price = Dish::where("id", $dishid[$i])->get()->first()->price;

            $dishprice_string .= ($price*$dishnumber[$i]).",";

            $dishid_string .= $dishid[$i].",";
            $dishnumber_string .= $dishnumber[$i].",";
        }

        // 添加到order表

        $order = new Order();
        $order->user_id = $user_id;
        $order->dish_id = $dishid_string;
        $order->number = $dishnumber_string;
        $order->price = $dishprice_string;
        $order->total_money = $totalMoney;
        $order->type = 0;
        $order->time = date("Y-m-d H:i:s");
        $order->save();

        return array("status" => 1);

    }

    public function add(Request $request) {

        $dish_id = $request->input("dish_id");

        $username = session("login");

        $user_obj = User::where("username", $username)->get()->first();

        $user_id = $user_obj->id;

        if (!session("login")) {

            return array("status" => 0);
        } else{

            $cart = new Cart();
            $cart->dish_id = $dish_id;
            $cart->user_id = $user_id;
            $cart->number = 1;
            $cart->save();

            return array("status" => 1);
        }

    }
}
