<?php

// サムネイルをサポート
add_theme_support('post-thumbnails');

// カスタムメニューをサポート
add_theme_support('menus');

// カスタムメニューの「場所」を設定
register_nav_menu('header-navi', 'ヘッダーナビゲーション');
register_nav_menu('footer-navi', 'フッターナビゲーション');

// カスタム投稿タイプを追加
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type(
        'project', // 投稿タイプ名の定義
        array(
            'labels' => array(
                'name' => __('制作事例'), // 表示する投稿タイプ名
                'singular_name' => __('project')
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