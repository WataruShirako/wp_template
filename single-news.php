<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main>

    <div class="wrapper subp single">
        <section class="single__news">
            <div class="single__news__title">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="single__news__date">
                <p><?php echo get_the_date("Y.m.d") ?></p>
            </div>
            <div class="single__news__content">
                <?php the_content(); ?>
            </div>
        </section>
    </div>

</main>

<?php

get_template_part("parts/footer/footer");
?>