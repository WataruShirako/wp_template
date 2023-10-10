<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());
$contact = esc_url(home_url("/contact/"));

?>

<?php get_template_part("parts/header/header"); ?>
<?php echo get_template_part("parts/header/loader") ?>

<main>

    <?php echo get_template_part("/parts/top/news") ?>

    <div class="wrapper">
        <section class="fv">
            <div class="fv__inner">
                <h1 class="fv__text__h1">
                    <span>N</span><span>o</span><span>r</span><span>a</span><span>s</span><span>&nbsp;</span><span>I</span><span>n</span><span>c</span><span>.</span>
                </h1>
                <img class="fv__img" src="<?php echo $uri; ?>/assets/img/fv_img.webp" />
            </div>
            <div class="mouse"></div>
        </section>

        <section class="archivements">
            <h2 class="container section__title">
                Achivement
            </h2>
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

        <section class="services">
            <h2 class="container section__title">
                Service
            </h2>
            <div id="slider" class="container">
                <!-- slider用のシェーダー -->
                <?php
                get_template_part("parts/shader/vShaderSlide");
                get_template_part("parts/shader/fShaderSlide");
                ?>
                <div class="slider__img">
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_1.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_2.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_3.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_4.webp" />
                </div>
                <div class="slider__content ">
                    <div id="slider__text">
                        <div id="slide-status">01</div>
                        <span data-slide-status="0">01</span>
                        <span data-slide-status="1">02</span>
                        <span data-slide-status="2">03</span>
                        <span data-slide-status="3">04</span>
                        <h2 id="slide-title">アプリ開発</h2>
                        <span data-slide-title="0">アプリ開発</span>
                        <span data-slide-title="1">ウェブデザイン</span>
                        <span data-slide-title="2">映像制作</span>
                        <span data-slide-title="3">古民家再生</span>
                    </div>
                    <div id="pagination">
                        <button class="active" data-slide="0"></button>
                        <button data-slide="1"></button>
                        <button data-slide="2"></button>
                        <button data-slide="3"></button>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main>

<?php
get_template_part("parts/shader/vShaderArc");
get_template_part("parts/shader/fShaderArc");
?>

<?php get_template_part("parts/footer/footer"); ?>