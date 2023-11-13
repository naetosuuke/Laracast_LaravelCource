<?php
use App\Models\Post; //クラスのインポートをしている
use Illuminate\Support\Facades\Route; //クラスのインポートをしている


// $posts = array_map(function($file){
//     $document = YamlFrontMatter::parseFile($file);
//     return new Post( //Postクラスの各プロパティにデータ投入
//         $document->title,
//         $document->excerpt,
//         $document->date,
//         $document->body(),//YAMLの所持するメソッドでBodyを渡す
//         $document->slug
//     );
// }, $files);

Route::get('/', function () { //Routクラスのstaticメソッド getを呼び出している。
    return view('posts', [
        'posts' => Post::all() //Postクラスのstaticメソッド all（全てのPostを出力）を呼び出している。
    ]);
});


Route::get('posts/{post}', function($slug){ //get 第一引数の最後を{}で囲うことでワイルドカード化し、かつfuncの引数$slugとして渡すことができる。 ???リファレンス見つからず???

    return view('post', [ // 第2引数で第1引数と変数の紐付けをしている
        'post' => Post::find($slug) //file_get_contents($path))を返してる
    ]);
    //whereメソッドを実行し、ワイルドカード部分のValidationを行える。!!!要リファレンス!!!
})->where('post', '[A-z_\-]+');  // 英語の大文字小文字、_\-使用可能、1文字以上、というValidation