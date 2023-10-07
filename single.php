<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());
$categories = get_the_category();

?>

<?php get_template_part("parts/header/blogHeader"); ?>

<div class="wrapper">

    <main>
        <div class="single single__blog">
            <section class="single__news">
                <div class="single__news__title">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="single__blog__info">
                    <div class="single__blog__info__top">
                        <div class="single__news__date">
                            <p><?php echo get_the_date("Y.m.d") ?></p>
                        </div>
                        <div>
                            <!-- 取得したカテゴリを表示 -->
                            <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>"
                                class="single__news__category">
                                <?php echo $category->name; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="single__news__content">
                    <?php the_content(); ?>
                </div>
            </section>
        </div>
    </main>
    <?php get_template_part("parts/sidebar/sidebar"); ?>

</div>

<?php get_template_part("parts/footer/blogFooter"); ?>