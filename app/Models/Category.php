<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; //これがついていると、同じ名前のfactoryファイルがああれば呼び出すことが可能

    public function posts() //外部キーとの接続
    {
        return $this->hasMany(Post::class); //実行すると、Categoryクラスを持つPostをすべて入手(postsプロパティを押すと、外部キーで連結したデータもメンバー式として出力)
        //hasOne, hasMany (thisが親),   belongsTo, belongsToMany (foreign classが親)

    }
}
