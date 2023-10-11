<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main class="archive">

    <div class="wrapper subp">
        <section class="archivements">
            <ul class="arc__container container">
                <!-- imagePlane用のシェーダー -->
                <?php
                $args = array(
                    'post_type' => 'achivement',
                    'posts_per_page' => 3 //表示件数（-1で全ての記事を表示）
                );
                query_posts($args);

                ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="arc__list">
                            <div href="" class="arc__list__image__wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('', ['class' => 'sh__img']); ?>
                                <?php else : ?>
                                    <img src="<?php bloginfo('template_url'); ?>/img/noimage.gif" alt="デフォルト画像" />
                                <?php endif; ?>
                                <h2 class="arc__list__title"><?php the_title(); ?></h2>
                                <p class="caption__text"><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>投稿はありません。</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>

        </section>


</main>

<?php

get_template_part("parts/shader/vShaderArc");
get_template_part("parts/shader/fShaderArc");

get_template_part("parts/footer/footer");
?>