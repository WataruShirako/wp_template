 <?php
    // デフォルトの投稿タイプにアーカイブページを追加
    add_filter('register_post_type_args', function ($args, $post_type) {
        if ('post' == $post_type) {
            global $wp_rewrite;
            $archive_slug = 'blog'; //URLスラッグ
            $args['label'] = 'ブログ'; //管理画面左ナビに「投稿」の代わりに表示される
            $args['has_archive'] = $archive_slug;
            $archive_slug = $wp_rewrite->root . $archive_slug;
            $feeds = '(' . trim(implode('|', $wp_rewrite->feeds)) . ')';
            add_rewrite_rule("{$archive_slug}/?$", "index.php?post_type={$post_type}", 'top');
            add_rewrite_rule("{$archive_slug}/feed/{$feeds}/?$", "index.php?post_type={$post_type}" . '&feed=$matches[1]', 'top');
            add_rewrite_rule("{$archive_slug}/{$feeds}/?$", "index.php?post_type={$post_type}" . '&feed=$matches[1]', 'top');
            add_rewrite_rule("{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type={$post_type}" . '&paged=$matches[1]', 'top');
        }
        return $args;
    }, 10, 2);

    // カスタム投稿タイプを追加
    add_action('init', 'create_post_type_arc');
    function create_post_type_arc()
    {
        register_post_type(
            'archivements', // 投稿タイプ名の定義
            array(
                'labels' => array(
                    'name' => __('制作事例'), // 表示する投稿タイプ名
                    'singular_name' => __('archivements')
                ),
                'public' => true,
                'menu_position' => 5,
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'excerpt',
                    'custom-fields',
                    'revisions',
                    'page-attributes'
                )
            )
        );
    }

    // カスタム投稿タイプを追加
    add_action('init', 'create_post_type_news');
    function create_post_type_news()
    {
        register_post_type(
            'news', // 投稿タイプ名の定義
            array(
                'labels' => array(
                    'name' => __('お知らせ'), // 表示する投稿タイプ名
                    'singular_name' => __('news')
                ),
                'public' => true,
                'menu_position' => 5,
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'excerpt',
                    'custom-fields',
                    'revisions',
                    'page-attributes'
                )
            )
        );
    }
