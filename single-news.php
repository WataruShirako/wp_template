<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="single-archivements">

    <div class="wrapper subp">
        <section class="single__news">
            <div class="single__news__title">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="single__news__date">
                <p><?php echo get_the_date("Y.m.d") ?></p>
            </div>
            <div class="single__text__content">
                <?php the_content(); ?>
            </div>
        </section>

        <section>
            <a href="" class="button__back">
                一覧に戻る
            </a>
        </section>
    </div>

</main>

<?php

get_template_part("parts/footer/footer");
?>