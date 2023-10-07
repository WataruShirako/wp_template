<?php

// ブログのカテゴリーを全て取得
$args = array(
    'taxonomy' => 'category',
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => false,
);
$categories = get_categories($args);

?>

<aside>

    <!-- 検索フォーム -->
    <div class="searchform__widget">
        <p class="caption__text">記事を検索</p>
        <div class="form__wrap">
            <?php get_template_part("parts/sidebar/searchform"); ?>
        </div>
    </div>



    <!-- 取得したカテゴリを表示 -->
    <div class="categorysearch__widget">
        <span class="caption__text arc__blog__caption">カテゴリから探す</span>
        <ul class="arc__blog__category">
            <?php
        foreach ($categories as $category) :
            $category_color = get_term_meta($category->term_id, 'category_color', true);
        ?>
            <li class="arc__blog__category__list">
                <a href="<?php echo get_category_link($category->term_id); ?>" class="arc__blog__category__link"
                    style="background-color: <?php echo esc_attr($category_color); ?>;">
                    <?php echo $category->name; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- ウィジェットから追加できるセクション  -->
    <?php if (is_active_sidebar('main-sidebar')) : ?>
    <ul class="widget__content">
        <?php dynamic_sidebar('main-sidebar'); ?>
    </ul>
    <?php endif; ?>

</aside>