<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="home">


    <div class="wrapper">
        <div class="fv">
            <div class="fv__inner">
                <img class="fv__img" src="<?php echo $uri; ?>/assets/img/noras_fv.png" />
                <p>
                    ノラスは、ウェブコンテンツ制作、アプリ開発、<br class="sp" />
                    デザイン制作を行う会社です。
                </p>
            </div>
        </div>
        <section class="archivements">
            <h2 class="container section__title">
                Archivements
                <span>制作事例</span>
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
                        <img src="<?php bloginfo('template_url'); ?>/img/noimage.gif" alt="デフォルト画像" />
                        <?php endif; ?>
                        <h3 class="arc__list__title"><?php the_title(); ?></h3>
                        <p class="caption__text"><?php echo get_the_excerpt(); ?></p>
                        </ぢ>
                </li>
                <?php endwhile; ?>
                <?php else : ?>
                <p>投稿はありません。</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </section>

        <div style="margin-top: 120px;"></div>
        <section class="services">

            <h2 class="container section__title">
                Services
                <span>事業内容</span>
            </h2>

            <div id="slider" class="container">

                <div class="slider__img">
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_1.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_2.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_3.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_4.webp" width="1280"
                        height="720" />
                </div>

                <div class="slider__content ">

                    <div id="slider__text">
                        <div class="meta">Service</div>
                        <div id="slide-status">01</div>
                        <span data-slide-status="0">01</span>
                        <span data-slide-status="1">02</span>
                        <span data-slide-status="2">03</span>
                        <span data-slide-status="3">04</span>
                        <h2 id="slide-title">アプリ開発</h2>
                        <span data-slide-title="0">アプリ開発</span>
                        <span data-slide-title="1">ウェブデザイン</span>
                        <span data-slide-title="2">映像制作</span>
                        <span data-slide-title="3">古民家のらり</span>

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

        <section class="contact">
            <div class="container">
                <a href="https://forms.gle/u9gzotRGtMFtZrQB6" target="_blank" class="button__g__border"
                    id="contact__button">
                    <span class="contact__btn__caption">Contact</span>
                    <span class="contact__btn__text">お問い合わせ</span>
                    <span class="contac__btn__click pc">お問い合わせはこちらをクリックしてください</span>
                </a>
                <p class="contact__bottom__text">営業時間<br class="sp" /> 9:00-18:00(土日祝含む)</p>
            </div>
        </section>

    </div>

</main>

<?php get_template_part("parts/footer/footer"); ?>