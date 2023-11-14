<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     //!!  シード値　多すぎる(=50)とエラーがおきてた（DBからpostが読み取れなくなる）  !!//

    public function run(): void
    {   
        //User::truncate(); //重複を避けられる
        //Category::truncate(); //重複を避けられる

        // 現在、PostFactoryを使えば、User、Categoryも自動で生成される。単体で生成したい場合は、それぞれのFactoryを使う
        // また、データに規定値を与えたければ、Createの引数に登録すれば反映してくれる。
        // $user = User::factory()->create([
        //      'name' => 'John Doe'
        // ]);
        
        Post::factory(5)->create([ //$userを作成し、生成されたidをuserIDとして渡せば、結果的に外部連結データも指定できる
            // 'user_id' => $user->id
        ]);

        //factoryメソッド Userクラスを自動作成するメソッド 引数にintを入れると生成数を決めれる
        //createメソッド インスタンス上で生成されたデータをDBに渡す

    }
}
