<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url("/"));
$archive = esc_url(get_post_type_archive_link('archivements'));
$blog = esc_url(get_post_type_archive_link('blog'));
$contact = esc_url(home_url("/contact/"));

?>

<div class="webgl-canvas">
    <canvas id="webgl-canvas" class="webgl-canvas__body"></canvas>
</div>

<ul class="transition">
    <li class="transition1"></li>
    <li class="transition2"></li>
</ul>

<footer>
    <div class="footer__top">
        <h2>合同会社ノラス</h2>
        <p class="footer__top__address">
            〒926-0836<br />
            石川県七尾市町屋町リ-66-1<br />
            TEL: 070-7562-0563
        </p>
    </div>
    <ul class="footer__bottom">
        <?php
        $menu_items = array(
            'TOP' => $home,
            // 'ARCHIVEMENTS' => $archive,
            // 'ARCHIVEMENTS' => $archive,
            'CONTACT' => $contact,
        );
        foreach ($menu_items as $name => $link) :
        ?>
            <li>
                <a href="<?php echo $link; ?>" class="footer__bottom__list" data-barba-prevent>
                    <span class="nav__line">\</span>
                    <span><?php echo $name; ?></span>
                    <span class="nav__line">\</span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="copy">
        <p><small>copyright &copy; noras LLC. All rights reserved.</small></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>