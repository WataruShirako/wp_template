<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());
$categories = get_the_category();

?>

<?php get_template_part("parts/header/blogHeader"); ?>

<div class="wrapper">

    <main>
        <div class="single single__blog__wrapper">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); // ループ開始
            ?>
            <article class="single__blog">
                <div class="single__blog__title">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="single__blog__info">
                    <div class="single__blog__info__top">
                        <div class="single__blog__date">
                            <p><?php echo get_the_date("Y.m.d") ?></p>
                        </div>
                        <!-- 投稿に紐づくカテゴリ名を全て取得 -->
                        <div class="blog__list__info__new__category__wrap">
                            <?php
                                    // 投稿に紐づくカテゴリを全て取得
                                    $post_categories = get_the_category();
                                    foreach ($post_categories as $cat) :
                                        $category_color = get_term_meta($cat->term_id, 'category_color', true);
                                    ?>
                            <a href="<?php echo get_category_link($cat->term_id); ?>"
                                class="blog__list__info__new__category"
                                style="background-color: <?php echo esc_attr($category_color); ?>;"><?php echo $cat->name; ?></a>
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
                <!-- サムネイル -->
                <div class="single__blog__thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                    <img src="<?php echo $uri; ?>/assets/img/noimage.webp" alt="no-image" class="blog__thumbnail" />
                    <?php endif; ?>
                </div>
                <!-- 本文 -->
                <div class="single__blog__content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
                endwhile;
            else :
                echo '投稿が見つかりません'; // 記事が見つからない場合のメッセージ
            endif;
            ?>
        </div>
    </main>
    <?php get_template_part("parts/sidebar/sidebar"); ?>

</div>

<?php get_template_part("parts/footer/blogFooter"); ?>