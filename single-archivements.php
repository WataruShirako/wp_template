<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="single-archivements" class="single">


    <div class="wrapper">

        <!-- サムネイル -->
        <div class="thumbnail__content">
            <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="">
        </div>

        <div class="container">

            <div class="single__title">
                <h1>Sabak開発</h1>
                <p class="caption__text">
                    2020年にリリースしたプロジェクト管理ツール。
                </p>
            </div>

            <div class="content__top__img">
                <img src="<?php echo $uri; ?>/assets/img/noise-web.webp" alt="">
                <img src="<?php echo $uri; ?>/assets/img/noise-web.webp" alt="">
            </div>

        </div>

    </div>

</main>

<?php get_template_part("parts/footer/footer"); ?>