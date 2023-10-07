<?php
// サムネイルをサポート
add_theme_support('post-thumbnails');

// カスタムメニューをサポート
add_theme_support('menus');

// タイトルタグをサポート
add_theme_support('title-tag');

// ウィジェットをサポート
function my_theme_widgets_init()
{
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');

// //
// function my_title_separator($separator)
// {
//     $separator = '|';
//     return $separator;
// }
// add_filter('document_title_separator', 'my_title_separator');