<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url("/"));
$archive = esc_url(get_post_type_archive_link('archivements'));
$blog = esc_url(get_post_type_archive_link('blog'));
$contact = esc_url(home_url("/contact/"));
$news = esc_url(home_url("/news/"));


?>

<svg class="overlay" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path id="overlayPath" class="overlayPath" vector-effect="non-scaling-stroke" d="M 0 100 V 100 Q 50 100 100 100 V 100 z" />
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

    <div class="pc__footer__flex">
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
        <nav class="footer__bottom">

            <div class="footer__bottom__content">
                <p class="footer__bottom__content__title">事業内容</p>
                <ul>
                    <li>
                        <div href=''>- アプリ開発</div>
                    </li>
                    <li>
                        <div href=''>- Web制作</div>
                    </li>
                    <li>
                        <div href=''>- 映像制作</div>
                    </li>
                </ul>
            </div>
            <div class="footer__bottom__content">
                <p class="footer__bottom__content__title">展開サービス</p>
                <ul>
                    <li>
                        <div href=''>- Sabak</div>
                    </li>
                </ul>
            </div>
            <div class="footer__bottom__content">
                <p class="footer__bottom__content__title">会社情報</p>
                <ul>
                    <li>
                        <div href=''>- 会社概要</div>
                    </li>
                    <li>
                        <div href=''>- 代表挨拶</div>
                    </li>
                    <li>
                        <div href=''>- 役員紹介</div>
                    </li>
                    <li>
                        <div href=''>- アクセス</div>
                    </li>
                </ul>
            </div>
            <ul class="footer__bottom__content">
                <li class="footer__bottom__content__title"><a href='<?php echo $blog; ?>' class="footer__bottom__content__title">ブログ</a>
                </li>
                <li class="footer__bottom__content__title"><a href='<?php echo $news; ?>' class="footer__bottom__content__title">お知らせ</a>
                </li>
                <li class="footer__bottom__content__title"><a href='<?php echo $archive; ?>' class="footer__bottom__content__title">実績紹介</a>
                </li>
                <li class="footer__bottom__content__title"><a href='<?php echo $contact; ?>' class="footer__bottom__content__title">お問い合わせ</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="footer__bottom__under flex">
        <p>&copy; noras inc.</p>
        <a href="">プライバシーポリシー</a>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>