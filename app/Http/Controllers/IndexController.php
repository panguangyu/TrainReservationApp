<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Dish;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $request){


        //获取列车号，查询列车号对应的菜单信息
        $train_id = $request->input("train");

        $search = $request->input("search");

        $noResult = 0;

        if (!session("login")) {

            return redirect(route("login"));
        }


        if ($train_id!='') {

            $dishes = Dish::where("train_id", $train_id);

            if ($dishes->get()->isEmpty()) {

                return redirect(route("chooseTrain"));
            }



            if ($search != '') {

                $dishes = $dishes->where("name", "like", "%{$search}%")->get();

            } else {

                $dishes = $dishes->get();
            }

        } else {

            return redirect(route("chooseTrain"));
        }


        if (session("login")) {

            $login = session("login");

            return view("index", ['dishes' => $dishes, 'train_id' => $train_id, 'login' => $login]);

        } else {
            return redirect(route("login"));
        }
    }

    public function dish(Request $request) {

        $dish_id =  $request->input("id");

        $dish = Dish::where("id", $dish_id)->get()->first();

        if (!$dish->id){

            return redirect(route("chooseTrain"));
        } else{

            $comment_arr = array();
            $comm = array();
            $dish_pic = $dish->pic;
            $dish_price = $dish->price;
            $dish_desc = $dish->desc;
            $comment = Comment::where("dish_id", $dish_id)->orderBy("date", "desc")->get();

            foreach ($comment as $ct) {

                $username = User::where("id", $ct->user_id)->get()->first()->username;

                $comment_arr['name'] = $username;
                $comment_arr['date'] = $ct->date;
                $comment_arr['comment'] = $ct->comment;

                $comm[] = $comment_arr;
            }

           // var_dump($comm);exit;

            return view("dish", [
                'dish_pic' => $dish_pic,
                "dish_price" => $dish_price,
                "comment" => $comm,
                "dish_id" => $dish_id,
                "dish_desc" => $dish_desc,
            ]);
        }


    }
}