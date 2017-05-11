<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::group(['middleware' => 'cors'], function(Router $router){
//    $router->get('api', 'ApiController@index');
//});
//Route::post('login', function (\App\Http\Requests\LoginRequest $request) {
//    // 获取到通过请求的两个字段
//    $checkInfo = \Illuminate\Support\Facades\Input::only('mobile', 'password');
//    try {
//        // 为该用户验证，验证通过则生成token，失败返回错误提示
//        if (!$token = JWTAuth::attempt($checkInfo)) {
//            return Response::json(['error' => '账号或密码错误'], 401);
//        }
//        return [
//            'user'=>JWTAuth::toUser($token),
//            'token'=>$token
//        ];
//    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
//        // 返回捕获的异常
//        return Response::json($e->getMessage(), 500);
//    }
//});


