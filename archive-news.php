<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="news" class="news">

    <div class="wrapper subp">
        <section class="news">
            <h2 class="section__title container">
                News
                <span>新着情報</span>
            </h2>
            <ul class="news__container container">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 12 //表示件数（-1で全ての記事を表示）
                );
                query_posts($args);
                ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <a class="news__list" href="<?php the_permalink(); ?>">
                            <p class="news__list__date"><?php echo get_the_date("Y.m.d") ?></p>
                            <h2 class="news__list__title"><?php the_title(); ?></h2>
                        </a>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>投稿はありません。</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>

        </section>


</main>

<?php get_template_part("parts/footer/footer"); ?>