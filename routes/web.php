<?php
use App\Models\Category;
use App\Models\Post; //クラスのインポートをしている
use Illuminate\Support\Facades\Route; //クラスのインポートをしている


Route::get('/', function () { //Routクラスのstaticメソッド getを呼び出している。
    return view('posts', [
        'posts' => Post::all() //Postクラスのstaticメソッド all（全てのPostを出力）を呼び出している。
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