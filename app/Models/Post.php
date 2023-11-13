<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{

    public $title; //記事のメタデータ 
    public $excerpt; //記事のメタデータ
    public $date; //記事のメタデータ
    public $body; //記事本体
    public $slug; //記事のメタデータ URI表記

    public function __construct($title, $excerpt, $date, $body, $slug){ //初期化する時に必ず実行される。
        $this->title = $title;
        $this->excerpt = $excerpt; 
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
        return cache()->rememberForever('posts.all', function(){ //posts.allというファイルに全ての記事のキャッシュを格納
            return collect(File::files(resource_path("posts"))) 
            ->map(fn($file) =>  YamlFrontMatter::parseFile($file)) //短縮クロージャ
            ->map(fn($document) => new Post( //Run a map over each of the items.(Definision参照)ファイルを渡してマップしている
                    //Postクラスの各プロパティにデータ投入
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),//YAMLの所持するメソッドでBodyを渡す
                    $document->slug
                ))//Post型の連想配列がreturnされる
                ->sortByDesc('date'); //要素 dateの順で並び替え sortBy()だと古い（小さい）順
        });
    }


    public static function find($slug){

        return static::all() //全ての投稿のうち
        ->firstWhere('slug', $slug); //連想配列のキー(1)と値(2)が一致し、かつ最初の記事を探して返す

        // if (! file_exists($path = resource_path("posts/{$slug}.html"))) { //パスの先にファイルが存在しなければ(resource_pathはリソース配下のアイテムのパスを返す)
        //     throw new ModelNotFoundException(); // 他　redirect('/'); ルートに返す or abort(404); 404を表示する 
        // }

        // //このメソッドでページのキャッシュを保持 
        // //引数1:アドレス,2:保持する時間(数字で書くと1200(秒)),3:クロージャ省略形(キャッシュ後に実行、結果を変数に返している)
        // return cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path)); 
    }
}



