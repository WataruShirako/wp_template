<!-- 最新の投稿のクエリを出力 -->
<?php
// WP_Query引数を設定
$args = array(
    'posts_per_page' => 1, // 取得する投稿数
    'post_type' => 'news', // 投稿タイプ
    'orderby' => 'date', // 並び替えの基準となるパラメータ
    'order' => 'DESC' // 並び替えの順番（DESCは最新から、ASCは最古から）
);

// 最新の投稿の日付が1monthより前だったら表示しない
$today = date('Ymd');
$yesterday = date('Ymd', strtotime('-1 month'));
if (get_the_date('Ymd', $args) < $yesterday) {
    return;
}

// WP_Queryオブジェクトを生成
$the_query = new WP_Query($args);

// ループで投稿を出力
if ($the_query->have_posts()) :
    while ($the_query->have_posts()) : $the_query->the_post();
?>

        <div id="top__news" class="top__news__wrap">
            <a href="<?php the_permalink(); ?>" class="top__news__content">
                <p class="date"><?php echo get_the_date("Y.m.d") ?></p>
                <h2><?php the_title() ?></h2>
            </a>
            <div id="news__close" class="news__close">
                <span class="news__close__line"></span>
                <span class="news__close__line"></span>
            </div>
        </div>
<?php

    endwhile;
    // ループ後のリセット
    wp_reset_postdata();
else :
    // 投稿がない場合のコンテンツ
    echo 'No posts found';
endif;
?>