<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/gaotieapp', function () {
    return redirect(route("login"));
});

Route::get("/gaotieapp/login", ['as' => 'login', function() {

    if (session("login")) {

        return redirect(route('chooseTrain'));
    }

    return view("login");

}]);

Route::post("/gaotieapp/login_check", "LoginController@login");

Route::get("/gaotieapp/register", function(){

    if (session("login")) {

        return redirect(route("chooseTrain"));
    }

    return view("register");
});

Route::post("/gaotieapp/register_check", "LoginController@register");

Route::get("/gaotieapp/chooseTrain", ['as' => 'chooseTrain', function(){

    //if (session("login")) {
        return view("chooseTrain");
   // } else {
    //    return redirect(view("login"));
  //  }

}]);

Route::get("/gaotieapp/index", "IndexController@index");

Route::get("/gaotieapp/changePassword", function(){

    if (session("login")) {

        return view("changePassword");

    } else {
        return redirect(view("login"));
    }

});

Route::get("/gaotieapp/logout", "LoginController@logout");

Route::post("/gaotieapp/changePassword_check", "LoginController@changePassword");

Route::get("/gaotieapp/cart", "CartController@index");

Route::post("/gaotieapp/balance", "CartController@balance");

Route::get("/gaotieapp/checkout", "OrderController@checkout");

Route::get("/gaotieapp/checkoutSuccess", function (){

    return view("checkout_success");
});

Route::post("/gaotieapp/submitCheckout", "OrderController@submit");

Route::get("/gaotieapp/orderList", "OrderController@orderList");

Route::get("/gaotieapp/comment", "OrderController@comment");

Route::post("/gaotieapp/saveComment", "OrderController@saveComment");

Route::get("/gaotieapp/dish", "IndexController@dish");

Route::post("/gaotieapp/addCart", "CartController@add");

Route::get("/gaotieapp/admin", function (){
    return redirect(route("adminlogin"));
});

Route::get("/gaotieapp/admin/adddish", "AdminController@addDish")->name("admin");

Route::post("/gaotieapp/admin/adddish_action", "AdminController@addDishAction");

Route::post("/gaotieapp/admin/search_action", "AdminController@searchAction");

Route::post("/gaotieapp/admin/jiedan", "AdminController@jiedan");

Route::get("/gaotieapp/admin/sellTable", "AdminController@sellTable");

Route::get("/gaotieapp/admin/login", ['as' => 'adminlogin', function() {

    if (session("admin")) {

        return redirect(route('admin'));
    }

    return view("admin.login");

}]);

Route::post("/gaotieapp/admin/loginaction", "AdminController@login");

Route::get("/gaotieapp/admin/logout", "AdminController@logout");

Route::post("/gaotieapp/admin/changepassword", "AdminController@changePassword");

Route::get("/gaotieapp/admin/sellList", "AdminController@sellList");

Route::get("/gaotieapp/admin/export", "AdminController@export");

Route::post("/gaotieapp/admin/deldish_action", "AdminController@deldish");