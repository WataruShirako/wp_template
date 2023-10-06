<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="contact">

    <div class="wrapper subp page__contact">
        <div class="page__contact__text">
            <p>
                ノラスに関心を持っていただき、<br />
                ありがとうございます。<br />
                <br />
                WEB開発・HP制作・映像制作に関するお問い合わせは、フォームより送信してください。
            </p>
            <p class="page__contact__text__line2">
                〒926-0836<br />
                石川県七尾市町屋町リ-66-1<br />
                TEL: <a href="tel:070-7562-0563">070-7562-0563</a>
            </p>
        </div>

        <div class="page__contact__form">
            <div class="contact__form__inner">
                <?php
                echo do_shortcode('[contact-form-7 id="975fa50" title="お問い合わせフォーム"]')
                ?>
            </div>

        </div>
    </div>

</main>

<div class="webgl-canvas">
    <canvas id="webgl-canvas" class="webgl-canvas__body"></canvas>
</div>

<footer></footer>
<!-- <?php wp_footer(); ?> -->
</body>

</html>