<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Request;
use Hash;
class User extends Model
{   //注册api

    public function sig()
    {
        $user=$this->user();
        if (array_key_exists('status', $user)){ //判断返回的键是错误的还是真确的
            return ($user) ;
        }else{
            $hashed_password=bcrypt($user[1]);//Hash::make  加密
            $this->PassWord= $hashed_password;
            $this->UserName= $user[0];
//        $this->email=null;
//        $this->phone=null;
//        $this->avatar_url=null;
//        $this->intro=null;
            if($this->save())//保存
            {
                return ['status'=>1,'id'=>$this->id];
            }else{
                return ['status'=>0,'msg'=>'存入失败'];
            };
        }
       //加密密码

    }
    public function login()
    {

        $user=$this->user_and_user();
        if (array_key_exists('status', $user)){ //判断返回的键是错误的还是真确的
            return ['status'=>0,'msg'=>'用户未登录'] ;
        }
        $users=$this->where('UserName',$user[0])->first();
        if (!$users){
            return ['status'=> 0,'msg'=>'用户名不存在'];
        }
        $hashed_PassWord=$users->PassWord;
        if(!Hash::check($user[1],$hashed_PassWord))
        {
            return ['status'=> 0,'msg'=>'用户密码错误'];
        }
        //写入session
            session()->put('UserName',$users->UserName);
            session()->put('user_id',$users->id);
            return ['status'=>1,'id'=>$users->id];

    }
    public function logout()
    {
        session()->forget('UserName');
        session()->forget('user_id');
        //        return redirect('/');     //跳转首页
       return ['status'=>1];
       //session()->flush;
    }
    public function is_logged_in()
    {
        return session('user_id') ?:false;
    }

    /**
     *
     */
    public function aa(){
        return ['status'=>0,'msg'=>'用户名或密码不存在'];
    }
    public function user()
    {
       $user=$this->user_and_user();

          $users=$this->where('UserName',$user[0])->exists();
          if ($users){
              return ['status'=> 0,'msg'=>'用户名以存在'];
          }else{
              return $user;
          }

    }
    public function user_and_user()
    {
        $UserName=rq('UserName');
        $PassWord=rq('PassWord');
        if($UserName&&$PassWord)
        {
            return [$UserName,$PassWord];
        }else{
            return ['status'=>0,'msg'=>'用户名或密码不存在'];
        }
    }

}
