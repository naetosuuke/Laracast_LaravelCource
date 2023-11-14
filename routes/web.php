<?php
use App\Models\Category;
use App\Models\Post; //クラスのインポートをしている
use App\Models\User;
use Illuminate\Support\Facades\Route; //クラスのインポートをしている


Route::get('/', function () { //Routクラスのstaticメソッド getを呼び出している。

    \Illuminate\Support\Facades\DB::listen(function($query){
        logger($query->sql, $query->bindings); //Storage/logs/laravel.logに残すことができる。
    });


    return view('posts', [
        'posts' => Post::with(['category', 'author'])->get() //Postクラスのstaticメソッド 連携しているcategoryテーブルのデータと一緒に、全てのポストを取得<get()>?
        //生成されるSQLクエリ
        //SELECT * FROM `posts`;
        //SELECT * FROM `categories`.`id` in (1,2,3);
        //SELECT * FROM `author`.`id` in (1,2,3);
    ]);
});

//{post:slug} はエイリアスの設定
Route::get('posts/{post:slug}', function(Post $post){ //Post::where('slug, $post)->firstOrFail() DBにあるデータをslugで検索している。
    return view('post', [ // 第2引数で第1引数と変数(記事データ)の紐付けをしている
        'post' =>  $post //slugを元に記事データを探してくる
    ]);
    
}); 

//whereメソッドを実行し、ワイルドカード部分のValidationを行える。!!!要リファレンス!!!
// ""->where('post', '[A-z_\-]+')""  英語の大文字小文字、_\-使用可能、1文字以上、というValidation


Route::get('categories/{category:slug}', function (Category $category) { //Post::where('slug, $category)->firstOrFail() DBにあるデータをslugで検索している。
    return view('posts', [
        'posts' => $category->posts //Postクラスのstaticメソッド all（全てのPostを出力）を呼び出している。
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    //dd($author);
    return view('posts', [
        'posts' => $author->posts //Postクラスのstaticメソッド all（全てのPostを出力）を呼び出している。
    ]);
});
