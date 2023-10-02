<div class="webgl-canvas">
    <canvas id="webgl-canvas" class="webgl-canvas__body"></canvas>
</div>

<footer>
    <div class="footer__top">
        <h2>合同会社ノラス</h2>
        <p class="footer__top__address">
            〒926-0836<br />
            石川県七尾市町屋町リ-66-1<br />
            TEL: 070-7562-0563
        </p>
    </div>
    <!-- <ul class="footer__bottom">
        <li>
            <a href="" class="footer__bottom__list">
                <span class="nav__line">\</span>&nbsp;<span>SERVICES</span>&nbsp;<span class="nav__line">\</span>
            </a>
        </li>
        <li>
            <a href="" class="footer__bottom__list">
                <span class="nav__line">\</span>&nbsp;<span>ARCHIVEMENTS</span>&nbsp;<span class="nav__line">\</span>
            </a>
        </li>
        <li>
            <a href="" class="footer__bottom__list">
                <span class="nav__line">\</span>&nbsp;<span>BLOG</span>&nbsp;<span class="nav__line">\</span>
            </a>
        </li>
    </ul> -->

    <div class="copy">
        <p><small>copyright &copy; noras LLC. All rights reserved.</small></p>

    </div>
</footer>

<!-- imagePlane用のシェーダー -->
<?php get_template_part("parts/shader/vShaderFv"); ?>
<?php get_template_part("parts/shader/fShaderFv"); ?>

<!-- imagePlane用のシェーダー -->
<?php get_template_part("parts/shader/vShaderArc"); ?>
<?php get_template_part("parts/shader/fShaderArc"); ?>

<!-- slider用のシェーダー -->
<?php get_template_part("parts/shader/vShaderSlide"); ?>
<?php get_template_part("parts/shader/fShaderSlide"); ?>

</body>

</html>