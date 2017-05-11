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
//$api = app('api.router');
//$api->version('v1', function ($api) {
//    $api->get('products','Api\V1\ProductController@index');
//});
function rq($key=null,$default=null){
    if(!$key) return Request::all();
    return Request::get($key,$default);
}
function user_ins()
{
    return new App\User;
}
function article_ins(){
    return new App\article;
}
Route::get('/', function () {
    return view('welcome');
});
Route::any('api',function (){
    return ['api'=>1.0];
});
Route::any('api/user',function (){
      return user_ins()->sig();
});
Route::any('api/login',function (){
    return user_ins()->login();
});

Route::any('api/logout',function (){
    return user_ins()->logout();
});
Route::any('api/admin/article',function (){
    return article_ins()->add();
});
