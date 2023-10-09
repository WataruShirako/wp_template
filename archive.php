<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

// 最新の投稿を11件取得
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 11,
    'orderby' => 'date',
    'order' => 'DESC',
);
$query = new WP_Query($query_args);

// ブログのカテゴリーを全て取得
$blog_args = array(
    'taxonomy' => 'category',
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => false,
);
$categories = get_categories($blog_args);
// カテゴリの色を取得

$pagenation_args = array(
    'mid_size' => 1,
    'prev_text' => '&lt;&lt;前へ',
    'next_text' => '次へ&gt;&gt;',
    'screen_reader_text' => ' ',
);


?>

<?php get_template_part("parts/header/blogHeader"); ?>
<div class="wrapper">
    <main class="arc__blog">
        <!-- 取得したカテゴリを表示 -->
        <span class="caption__text arc__blog__caption sp__top__category">カテゴリから探す</span>
        <ul class="arc__blog__category sp__top__category">
            <?php
            foreach ($categories as $category) :
                $category_color = get_term_meta($category->term_id, 'category_color', true);
            ?>
            <li class="arc__blog__category__list" style="background-color: <?php echo esc_attr($category_color); ?>;">
                <a href="<?php echo get_category_link($category->term_id); ?>" class="arc__blog__category__link">
                    <?php echo $category->name; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($query->have_posts()) : ?>
        <!-- 最新の1本だけ上に表示 -->
        <?php $query->the_post(); ?>
        <div class="blog__list__new">
            <a href="<?php the_permalink(); ?>" class="blog__list__new__img__wrapper">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('', ['class' => 'blog__thumbnail']); ?>
                <?php else : ?>
                <img src="<?php echo $uri; ?>/assets/img/noimage.webp" alt="no-image" class="blog__thumbnail" />
                <?php endif; ?>
                <div class="blog__list__new__info">
                    <div class="blog__list__info__new__top">
                        <h2 class="blog__list__info__new__title">
                            <!-- タイトルが32文字以上の場合は...をつけて出力 -->
                            <?php if (mb_strlen($post->post_title) > 40) : ?>
                            <?php $title = mb_substr($post->post_title, 0, 40); ?>
                            <?php echo $title . '...'; ?>
                            <?php else : ?>
                            <?php echo $post->post_title; ?>
                            <?php endif; ?>
                        </h2>
                    </div>
                    <div class="blog__list__info__new__bottom">
                        <div class="blog__list__info__new__bottom__avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                        </div>
                        <span class="blog__list__info__new__date"><?php echo get_the_date('Y.m.d'); ?></span>
                    </div>
                </div>
            </a>


        </div>
        <!-- 2件目以降の最新投稿を表示 -->
        <?php if ($query->have_posts()) : ?>
        <ul class="blog__list__container">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li>
                <div class="blog__list">
                    <a href="<?php the_permalink(); ?>" class="blog__list__img__wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('', ['class' => 'blog__thumbnail']); ?>
                        <?php else : ?>
                        <img src="<?php echo $uri; ?>/assets/img/noimage.webp" alt="no-image" class="blog__thumbnail" />
                        <?php endif; ?>
                        <div class="mask">
                            <p class="caption">記事を読む</p>
                        </div>
                    </a>
                    <div class="blog__list__info">
                        <div class="blog__list__info__top">
                            <h2 class="blog__list__info__title">
                                <a href="<?php the_permalink(); ?>">
                                    <!-- タイトルが32文字以上の場合は...をつけて出力 -->
                                    <?php if (mb_strlen($post->post_title) > 32) : ?>
                                    <?php $title = mb_substr($post->post_title, 0, 32); ?>
                                    <?php echo $title . '...'; ?>
                                    <?php else : ?>
                                    <?php echo $post->post_title; ?>
                                    <?php endif; ?>
                                </a>
                            </h2>
                        </div>

                        <div class="sp__blog__list__info__middle__bottom">
                            <div class="blog__list__info__middle">
                                <span class="blog__list__info__date"><?php echo get_the_date('Y.m.d'); ?></span>
                                <!-- 投稿に紐づくカテゴリ名を全て取得 -->
                                <div class="blog__list__info__category__wrap">
                                    <?php
                                                // 投稿に紐づくカテゴリを全て取得
                                                $post_categories = get_the_category();
                                                foreach ($post_categories as $cat) :
                                                    $category_color = get_term_meta($cat->term_id, 'category_color', true);
                                                ?>
                                    <a href="<?php echo get_category_link($cat->term_id); ?>"
                                        class="blog__list__info__category"
                                        style="background-color: <?php echo esc_attr($category_color); ?>;"><?php echo $cat->name; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="blog__list__info__bottom">
                                <a class="blog__list__info__bottom__avatar"
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                </a>
                                <a class="blog__list__info__bottom__name"
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php the_author(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <div class="pagination__widget">
            <?php wp_pagenavi(); ?>
        </div>

        <?php endif; ?>

    </main>
    <?php get_template_part("parts/sidebar/sidebar"); ?>

</div>


<?php get_template_part("parts/footer/blogFooter"); ?>