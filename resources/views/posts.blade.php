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
  <?php foreach ($posts as $post) : ?>
        <article>
        <h1>
                <a href="/posts/<?= $post->slug; ?>">
                <?= $post->title;?>
                </a>
        </h1>
        
        <div>
                 <p><?= $post->excerpt;?></p>        
        </div>

        </article>
  <?php endforeach ;?>

</body>
</html>