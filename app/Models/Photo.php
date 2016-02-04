<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
//    protected $table = 'datas';
    
    public function user()
    {
//        外部鍵，本地鍵的定義是根據 一對多 的上層來定義，這邊的上層指的是 User
//        users 外部：photos.by_user（預設：photos.user_id)
//        users 本地：users.user_name（預設：users.id）
        return $this->belongsTo('App\Models\User','by_user','user_name');
    }
}
