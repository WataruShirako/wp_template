<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="archivement" class="archive">

    <div class="wrapper subp">
        <section class="archivements">
            <h2 class="section__title container">
                Archivements
                <span>制作実績</span>
            </h2>
            <ul class="arc__container container">
                <?php

                $args = array(
                    'post_type' => 'archivements',
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
                                    <img src="<?php echo $uri; ?>/assets/img/noimage.webp" alt="no-image" />
                                <?php endif; ?>
                                <h3 class="arc__list__title"><?php the_title(); ?></h3>
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

<?php get_template_part("parts/footer/footer"); ?>