<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());
$category = get_the_category();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 13,
    'orderby' => 'date',
    'order' => 'DESC',
);
$the_query = new WP_Query($args);


?>
<?php get_template_part("parts/header/blogHeader"); ?>

<div class="wrapper">

    <main class="arc__blog">

        <!-- 現在のカテゴリ名を表示 -->
        <h2 class="arc__blog__category category__blog">
            <?php
            echo '「' . $_GET['s'] . '」の記事：' . $wp_query->found_posts . '件';
            ?>
        </h2>

        <!-- 全記事一覧を表示 -->
        <ul class="blog__list__container">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <li class="blog__list">
                <div href="" class="blog__list__image__wrapper">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('', ['class' => 'blog__thumbnail']); ?>
                    <?php else : ?>
                    <img src="<?php echo $uri; ?>/assets/img/noimage.webp" alt="no-image" class="blog__thumbnail" />
                    <?php endif; ?>
                    <div class="blog__list__info">

                        <div class="blog__list__info__top">
                            <h2 class="blog__list__info__title">
                                <!-- タイトルが32文字以上の場合は...をつけて出力 -->
                                <?php if (mb_strlen($post->post_title) > 32) : ?>
                                <?php $title = mb_substr($post->post_title, 0, 32); ?>
                                <?php echo $title . '...'; ?>
                                <?php else : ?>
                                <?php echo $post->post_title; ?>
                                <?php endif; ?>
                            </h2>
                        </div>

                        <div class="sp__blog__list__info__middle__bottom">
                            <div class="blog__list__info__middle">
                                <span class="blog__list__info__date"><?php echo get_the_date('Y.m.d'); ?></span>
                                <!-- 投稿に紐づくカテゴリ名を全て取得 -->
                                <div class="blog__list__info__category__wrap">
                                    <?php foreach ($category as $cat) : ?>
                                    <span href="<?php echo get_category_link($cat->term_id); ?>"
                                        class="blog__list__info__category"><?php echo $cat->name; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="blog__list__info__bottom">
                                <div class="blog__list__info__bottom__avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                </div>
                                <div class="blog__list__info__bottom__name">
                                    <?php the_author(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
            <?php else : ?>
            <p class="nohit__text">キーワードを変えてお試しください。</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>



    </main>
    <?php get_template_part("parts/sidebar/sidebar"); ?>

</div>


<?php get_template_part("parts/footer/blogFooter"); ?>