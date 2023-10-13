<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main>

    <div class="wrapper subp">
        <section class="single__fv">
            <?php
            get_template_part("parts/shader/vShaderFv");
            get_template_part("parts/shader/fShaderFv");
            ?>
            <img class="fv__img" src="<?php echo $uri; ?>/assets/img/service/service_1.webp" alt="">
            <div class="single__fv__text">
                <h1>
                    sabak
                </h1>
                <span class="caption__text">
                    もう迷わない、プロジェクト管理ツール
                </span>
            </div>
        </section>
        <section class="container">
            <div class="grid grid1">
                <img class="single__img__1" src="<?php echo $uri; ?>/assets/img/single/noimg1.webp" alt="">
                <img class="single__img__2" src="<?php echo $uri; ?>/assets/img/single/noimg2.webp" alt="">
            </div>
            <div class="grid grid2">
                <img class="single__img__3" src="<?php echo $uri; ?>/assets/img/single/noimg3.webp" alt="">
            </div>
            <div class="grid grid3">
                <img class="single__img__4" src="<?php echo $uri; ?>/assets/img/single/noimg1.webp" alt="">
                <img class="single__img__5" src="<?php echo $uri; ?>/assets/img/single/noimg1.webp" alt="">
            </div>
            <div class="grid grid4">
                <img class="single__img__6" src="<?php echo $uri; ?>/assets/img/single/noimg1.webp" alt="">
                <img class="single__img__7" src="<?php echo $uri; ?>/assets/img/single/noimg1.webp" alt="">
            </div>
            <div class="single__text__content">
                <p>
                    ここにテキストが入ります。
                </p>
            </div>
        </section>
        <section>
            <a href="" class="button__back">
                戻る
            </a>
        </section>
    </div>

</main>

<?php

get_template_part("parts/footer/footer");
?>