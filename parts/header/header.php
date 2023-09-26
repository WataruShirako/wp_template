<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>合同会社ノラス</title>
    <link rel="stylesheet" href="<?php echo $uri; ?>/asetts/css/style.css">
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <!-- ヘッダーの中身 -->
        <div class="header">
            <div class="header__logo">
                <a href="<?php echo $home; ?>">
                    <img src="<?php echo $uri; ?>/asetts/img/logo.png" alt="ノラスのロゴ">
                </a>
            </div>
            <div class="header__nav">
                <ul>
                    <li><a href="<?php echo $home; ?>">ホーム</a></li>
                    <li><a href="<?php echo $home; ?>/about">会社概要</a></li>
                    <li><a href="<?php echo $home; ?>/service">事業内容</a></li>
                    <li><a href="<?php echo $home; ?>/recruit">採用情報</a></li>
                    <li><a href="<?php echo $home; ?>/contact">お問い合わせ</a></li>
                </ul>
            </div>
    </header>