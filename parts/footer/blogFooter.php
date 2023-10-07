<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url("/"));
$archive = esc_url(get_post_type_archive_link('archivements'));
$blog = esc_url(get_post_type_archive_link('blog'));
$contact = esc_url(home_url("/contact/"));

?>

<svg class="overlay" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path id="overlayPath" class="overlayPath" vector-effect="non-scaling-stroke"
        d="M 0 100 V 100 Q 50 100 100 100 V 100 z" />
</svg>


<footer class="footer">

    <section class="contact">
        <div class="container">
            <a href="<?php echo $contact ?>" class="button__g__border" id="contact__button">
                <span class="contact__btn__caption">Contact</span>
                <span class="contact__btn__text">お問い合わせ</span>
                <span class="contac__btn__click pc">お問い合わせはこちらをクリックしてください</span>
            </a>
            <p class="contact__bottom__text">営業時間<br class="sp" /> 9:00-18:00(土日祝含む)</p>
        </div>
    </section>

    <div class="footer__top">
        <a href="<?php echo $home; ?>" class="footer__top__logo">
            <img src="<?php echo $uri; ?>/assets/img/logo.svg" alt="">
        </a>
        <p class="footer__top__address">
            合同会社ノラス<br />
            〒926-0836<br />
            石川県七尾市町屋町リ-66-1
        </p>
    </div>
    <!-- navリリースまでpadding調整 -->
    <div style="padding-top: 2.5rem;"></div>
    <!-- <nav class="footer__bottom">

        <div class="footer__bottom__content">
            <p class="footer__bottom__content__title">事業内容</p>
            <ul>
                <li><a href=''>- アプリ開発</a></li>
                <li><a href=''>- Web制作</a></li>
                <li><a href=''>- 映像制作</a></li>
            </ul>
        </div>
        <div class="footer__bottom__content">
            <p class="footer__bottom__content__title">展開サービス</p>
            <ul>
                <li><a href=''>- Sabak</a></li>
            </ul>
        </div>
        <div class="footer__bottom__content">
            <p class="footer__bottom__content__title">会社情報</p>
            <ul>
                <li><a href=''>- 会社概要</a></li>
                <li><a href=''>- 代表挨拶</a></li>
                <li><a href=''>- 役員紹介</a></li>
                <li><a href=''>- アクセス</a></li>
            </ul>
        </div>
        <ul class="footer__bottom__content">
            <li class="footer__bottom__content__title"><a href='' class="footer__bottom__content__title">ブログ</a></li>
            <li class="footer__bottom__content__title"><a href='' class="footer__bottom__content__title">お知らせ</a></li>
            <li class="footer__bottom__content__title"><a href='' class="footer__bottom__content__title">実績紹介</a></li>
            <li class="footer__bottom__content__title"><a href='' class="footer__bottom__content__title">採用情報</a></li>
        </ul>
    </nav> -->
    <div class="footer__bottom__under flex">
        <p>&copy; noras inc.</p>
        <a href="">プライバシーポリシー</a>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>