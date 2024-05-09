<?php

/**
 * noras original theme
 * @author: shirako
 * @link: https://norasinc.jp
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

function enqueue_my_styles()
{
    $uri = get_template_directory_uri();

    // 全ページで読み込むCSS
    wp_enqueue_style('base-css', $uri . '/assets/css/base.css');
    wp_enqueue_style('main-css', $uri . '/assets/css/main.css');

    // TOPページ以外で読み込むCSS
    if (!is_front_page()) {
        wp_enqueue_style('subp-css', $uri . '/assets/css/subp.css');
    }

    // アーカイブページ
    if (is_archive()) {
        wp_enqueue_style('news-archive-css', $uri . '/assets/css/archive.css');
    }
    // シングルページ
    if (is_singular()) {
        wp_enqueue_style('single-css', $uri . '/assets/css/single.css');
    }
    // 固定ページ contact
    if (is_page('contact')) {
        wp_enqueue_style('contact-css', $uri . '/assets/css/pages/page-contact.css');
    }
    // 固定ページ service
    if (is_page('service')) {
        wp_enqueue_style('service-css', $uri . '/assets/css/pages/page-service.css');
    }
    // 404ページ
    if (is_404()) {
        wp_enqueue_style('404-css', $uri . '/assets/css/pages/page-404.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');
