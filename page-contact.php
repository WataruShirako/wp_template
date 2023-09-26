<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="contact">


    <div class="noise">
        <div class="noise__item1"></div>
        <div class="noise__item2"></div>
        <div class="noise__item3"></div>
    </div>


    <div class="wrapper">
        <!-- <div class="scrollable"> -->
        <div class="container">
            contactページです
        </div>
        <div style="height:100vh;">
            <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="">
        </div>
        <!-- </div> -->
    </div>
    <div class="webgl-canvas">
        <canvas id="webgl-canvas" class="webgl-canvas__body"></canvas>
    </div>

</main>

<?php get_template_part("parts/footer/footer"); ?>