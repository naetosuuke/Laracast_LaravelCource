<x-layout>  
  <!--x-layoutタグを使うと、layout.blade.phpファイルの中身を引用でき、間に囲われている要素はlayout中のslotに格納される-->

@foreach ($posts as $post)
    <!--foreach ($posts as $post): のbladeによる記述方法　framework配下にコンパイルされたphpファイルがある-->
        <article class="{{ $loop->even ? 'foobar' : ''}}"> <!--不明　HTMLタグへの埋め込み効果を確認-->
        <h1>
                <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
                 <!--echo $post->title; のbladeによる記述方法　framework配下にコンパイルされたphpファイルがある-->
                </a>
        </h1>
        
      <p>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
      </p>


        <div>
             {{ $post->excerpt }}      
        </div>


        </article>
  @endforeach
</x-layout>
