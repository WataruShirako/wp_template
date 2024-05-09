<?php

/**
 * noras original theme
 * @author: shirako
 * @link: https://norasinc.jp
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 *     
 */

// デフォルトの投稿タイプにアーカイブページを追加
add_filter('register_post_type_args', function ($args, $post_type) {
    if ('post' == $post_type) {
        global $wp_rewrite;
        $archive_slug = 'column'; //URLスラッグ
        $args['label'] = '投稿'; //管理画面左ナビに「投稿」の代わりに表示される
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
