<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{ //Databaseの中身を整形して取ってくる。DBの中身はdatabase/migrations/対応するディレクトリから参照
    //なので、Post:: としてstaticメソッドを使用して中身を取り出したり、初期化してsave()メソッドを使うだけでDBへの登録ができる。
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body']; 
    //createメソッドでmass assignを行う場合は、各キーをここに登録しなければならない。
    protected $guarded = [];  
    //guarrdedプロパティを使えば、逆に登録したくないキーだけを指定できる。ただリスキー

    public function category() //外部キーとの接続
    {
        return $this->belongsTo(Category::class); //実行中のPostインスタンスにCategoryクラスを紐づける。紐づいたクラスのプロパティ、メソッドはメンバー式として使用可能
        //hasOne, hasMany (thisが親),   belongsTo, belongsToMany (foreign classが親)
    }

    public function author() //通常、author_idを参照してキー接続される
    {
        return $this->belongsTo(User::class, 'user_id');//第二引数で任意の外部キーを使用できる 
    }


}
