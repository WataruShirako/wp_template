 <?php

    // css読み込み
    function enqueue_my_styles()
    {
        $uri = get_template_directory_uri();

        // 全ページで読み込むCSS
        wp_enqueue_style('main-css', $uri . '/assets/css/main.css');
        wp_enqueue_style('header-css', $uri . '/assets/css/parts/header.css');
        wp_enqueue_style('navigation-css', $uri . '/assets/css/parts/navigation.css');
        wp_enqueue_style('news-css', $uri . '/assets/css/parts/news.css');
        wp_enqueue_style('footer-css', $uri . '/assets/css/parts/footer.css');
        wp_enqueue_style('loading-css', $uri . '/assets/css/animations/loading.css');

        // トップページ
        if (is_front_page()) {
            wp_enqueue_style('scrolldown-css', $uri . '/assets/css/parts/scrolldown.css');
            wp_enqueue_style('noise-css', $uri . '/assets/css/animations/noise.css');
        }

        // ブログページ
        if (is_post_type_archive('post') || is_category() || is_author() || is_page('youtube')) {
            wp_enqueue_style('blog-archive-css', $uri . '/assets/css/archives/archive-blog.css');
            wp_enqueue_style('blog-sidebar-css', $uri . '/assets/css/parts/sidebar.css');
        }
        // ブログシングルページ
        if (is_single() && 'post' == get_post_type()) {
            wp_enqueue_style('single-blog-css', $uri . '/assets/css/singles/single-blog.css');
            wp_enqueue_style('single-blog-sidebar-css', $uri . '/assets/css/parts/sidebar.css');
        }

        // ニュースページ
        if (is_post_type_archive('news')) {
            wp_enqueue_style('news-archive-css', $uri . '/assets/css/archives/archive-news.css');
        }
        // ニュースシングルページ
        if (is_single() && 'news' == get_post_type()) {
            wp_enqueue_style('single-news-css', $uri . '/assets/css/singles/single-news.css');
        }
        // アーカイブページ
        if (is_post_type_archive('achievement') || is_page('youtube')) {
            wp_enqueue_style('archive-achievement-css', $uri . '/assets/css/archives/archive-achievement.css');
        }
        // youtubeページ
        if (is_page('youtube')) {
            wp_enqueue_style('page-youtube-css', $uri . '/assets/css/pages/page-youtube.css');
        }
        // 実績シングルページ
        if (is_single() && 'achivement' == get_post_type()) {
            wp_enqueue_style('single-achievement-css', $uri . '/assets/css/singles/single-achievement.css');
        }
        // コンタクトページ
        if (is_page('contact')) {
            wp_enqueue_style('contact-css', $uri . '/assets/css/pages/page-contact.css');
        }
        // 404ページ
        if (is_404()) {
            wp_enqueue_style('404-css', $uri . '/assets/css/pages/page-404.css');
        }
    }
    add_action('wp_enqueue_scripts', 'enqueue_my_styles');
