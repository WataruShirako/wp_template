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
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/noise.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <?php if (is_archive() || is_single()) : ?>
        <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/archive.css">
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.23/bundled/lenis.min.js"></script>
    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script type="importmap">
        {
		"imports": {
			"three": "https://unpkg.com/three/build/three.module.js"
		}
	}
</script>

    <script defer src="<?php echo $uri; ?>/assets/js/three/main.js" type="module"></script>
    <script defer src="<?php echo $uri; ?>/assets/js/index.js"></script>
    <?php wp_head(); ?>
</head>

<body data-barba="wrapper">

    <header>
        <!-- ヘッダーの中身 -->
        <div class="header__inner">
            <div class="header__logo">
                <a href="<?php echo $home; ?>">
                    <img src="<?php echo $uri; ?>/assets/img/logo.svg" alt="ノラスのロゴ">
                </a>
            </div>
            <div class="header__nav">
                <p>\ MENU \</p>
            </div>
    </header>


    <div class="noise">
        <div class="noise__item1"></div>
        <div class="noise__item2"></div>
        <div class="noise__item3"></div>
    </div>