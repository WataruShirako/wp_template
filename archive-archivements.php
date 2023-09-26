<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="archive-archivements" class="archive">

    <div class="wrapper">
        <!-- <div class="scrollable"> -->
        <div class="container">
            <ul class="image-list">
                <li class="image-item">
                    <a href="" class="image-wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <p>こんてな</p>
                    </a>
                </li>
                <li class="image-item">
                    <a href="" class="image-wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </a>
                </li>
                <li class="image-item">
                    <a href="" class="image-wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </a>
                </li>
                <li class="image-item">
                    <a href="" class="image-wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </a>
                </li>
            </ul>
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