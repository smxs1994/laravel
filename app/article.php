<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    public function add(){
        if(!user_ins()->is_logged_in()){
            return ['status'=>0,'msg'=>'login required'];
        };
        if(!rq('title'))
           return ['status'=>0,'msg'=>'login title'];
        if(!rq('text'))
            return ['status'=>0,'msg'=>'login text'];
        $this->title=rq('title');
        $this->author=rq('author');
        $this->mg_url=rq('mg_url');
        $this->cate_id=rq('cate_id');
        $this->text=rq('text');
        $this->author=rq('author');
        return $this->save()?
            ['status'=>1,'msg'=>$this->id]:
            ['status'=>1,'msg'=>'db insert failed'];
    }
}
