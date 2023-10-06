<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url("/"));
$archive = esc_url(get_post_type_archive_link('archivements'));
$blog = esc_url(get_post_type_archive_link('blog'));
$contact = esc_url(home_url("/contact/"));

?>
<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo wp_get_document_title(); ?></title>
    <meta name="description" content="<?php echo wp_get_document_title(); ?>">
    <link rel="shortcut icon" href="<?php echo $uri; ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $uri; ?>/assets/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/base.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/noise.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/404.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/single.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/contact.css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver" crossorigin="anonymous" defer></script>
    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script defer src="<?php echo $uri; ?>/assets/js/index.js" type="module"></script>
    <?php wp_head(); ?>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WBQF2GGV');
    </script>
</head>

<body data-barba="wrapper">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBQF2GGV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
        <div class="header__inner">
            <div class="header__logo">
                <a href="<?php echo $home; ?>">
                    <img src="<?php echo $uri; ?>/assets/img/logo.svg" alt="ノラスのロゴ">
                </a>
            </div>
    </header>

    <div class="header__nav">
        <div id="header__nav__button">
            <span class="nav__line">\</span>&nbsp;<span id="header__nav__button__text">MENU</span>&nbsp;<span class="nav__line">\</span>
        </div>
    </div>

    <div class="noise ">
        <div class="noise__item1"></div>
        <div class="noise__item2"></div>
    </div>

    <div class="nav">
        <div class="nav__bg"></div>
        <div class="nav__inner wrapper">
            <ul class="nav__list">
                <?php
                $menu_items = array(
                    'TOP' => $home,
                    // 'ARCHIVEMENTS' => $archive,
                    'CONTACT' => $contact,
                );
                $menu_items_jp = array(
                    'TOP' => 'ホーム',
                    // 'ARCHIVEMENTS' => '制作事例',
                    'CONTACT' => 'お問い合わせ',
                );
                foreach ($menu_items as $name => $link) :
                ?>
                    <li class="">
                        <a href="<?php echo $link; ?>" class="header__nav__list__item" data-barba-prevent>
                            <span>
                                <span class="nav__line">\</span>
                                <span><?php echo $name; ?></span>
                                <span class="nav__line">\</span>
                            </span>
                            <span>
                                <span><?php echo $menu_items_jp[$name]; ?></span>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>