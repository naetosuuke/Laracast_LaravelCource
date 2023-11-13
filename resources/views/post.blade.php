<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="/app.css"> <!--適用するCSSのリンク-->
    <!-- <script src="app.js"></script> 適用するJSのリンク 使わないのでコメントアウト-->

</head>
<body>
    <article>
    <h1><?= $post->title; //modelのpost.phpから渡された$postの中身を展開 ?></h1>

    <div>
        <?= $post->body;?>
    </div>

    </article>

<a href="/">Go Back</a>

</body>
</html>