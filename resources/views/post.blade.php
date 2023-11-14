<x-layout>

    <article>
    <h1>{{ $post->title }}</h1> <!--bladeによる記載  HTMLタグのパースを認めない。スクリプト埋め込みを回避できる-->
    
    <p>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> <!--カテゴリ名とリンクを表示-->
    </p>

    <div>
        {!! $post->body !!} <!--bladeによる記載  HTMLタグのパースを認める-->
        
    </div>

    </article>

    <a href="/">Go Back</a>

</x-layout>
