<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="news" class="news">
    <div class="wrapper subp">
        <section class="news">
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

                        <a href="<?php the_permalink(); ?>" class="arc__news__content">
                            <p class="date"><?php echo get_the_date("Y.m.d") ?></p>
                            <h2><?php the_title() ?></h2>
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