<?php

/**
 * noras original theme
 * @author: shirako
 * @link: https://norasinc.jp
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

if (!defined('ABSPATH')) exit;
include get_template_directory() . "/inc/link.php";

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

// ブログのタグを全て取得
$tag_args = array(
    'taxonomy' => 'post_tag',
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => false, // 空のタグも含める
    'number' => 50, // 最大50件のタグを取得
);
$tags = get_terms($tag_args);

$pagenation_args = array(
    'mid_size' => 1,
    'prev_text' => '&lt;&lt;前へ',
    'next_text' => '次へ&gt;&gt;',
    'screen_reader_text' => ' ',
);

// ヘッダーを取得
get_template_part("parts/header/header");
?>

<main class="ly_subp">
    <section id="column" class="ly_cont">
        <div class="bl_content">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 16,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                    <article class="bl_cloumn">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                                <img src="<?= $uri; ?>/assets/img/no-image.png" alt="">
                            <?php endif; ?>
                            <p><?php the_title(); ?></p>
                        </a>
                    </article>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>

    </section>
</main>


<?php get_template_part("parts/footer/footer"); ?>