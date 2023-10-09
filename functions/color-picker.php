<?php

// カラーピッカー作成
function admin_enqueue_color_picker($hook_suffix)
{
    // 以下のページだけでスクリプトとスタイルを読み込む
    if ($hook_suffix == 'edit-tags.php' || $hook_suffix == 'term.php') {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('category-color-picker', get_template_directory_uri() . '/assets/js/wp-custom/category-color-picker.js', array('wp-color-picker'), '', true);
    }
}
add_action('admin_enqueue_scripts', 'admin_enqueue_color_picker');
