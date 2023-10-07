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
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/animations/loading.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/animations/noise.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/parts/header.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/parts/navigation.css" />
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/parts/footer.css" />

    <!-- 404ページの場合 -->
    <?php if (is_404()) : ?>
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/pages/page-404.css" />
    <?php endif; ?>
    <!-- アーカイブニュースの場合 -->
    <?php if (is_post_type_archive('news')) : ?>
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/archives/archive-news.css" />
    <?php endif; ?>
    <!-- アーカイブ実績の場合 -->
    <?php if (is_post_type_archive('archivements')) : ?>
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/archives/archive-archivements.css" />
    <?php endif; ?>
    <!-- シングルページの場合すべて -->
    <?php if (is_single()) : ?>
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/singles/single-archivements.css" />
    <?php endif; ?>
    <!-- シングルnewsページの場合 -->
    <?php if (is_single() && 'news' == get_post_type()) : ?>
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/singles/single-news.css" />
    <?php endif; ?>
    <!-- シングルarchivementsページの場合 -->
    <?php if (is_single() && 'archivements' == get_post_type()) : ?>
    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/singles/single-archivements.css" />
    <?php endif; ?>


    <link rel="stylesheet" href="<?php echo $uri; ?>/assets/css/pages/page-contact.css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver"
        crossorigin="anonymous" defer></script>
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBQF2GGV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
        <div class="header__inner">
            <div class="header__logo">
                <a href="<?php echo $home; ?>">
                    <img src="<?php echo $uri; ?>/assets/img/logo.svg" alt="ノラスのロゴ">
                </a>
            </div>
    </header>

    <?php echo get_template_part("parts/header/navigation") ?>
    <?php echo get_template_part("parts/animations/noise") ?>