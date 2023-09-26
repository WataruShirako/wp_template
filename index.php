<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="home">


    <div class="noise">
        <div class="noise__item1"></div>
        <div class="noise__item2"></div>
        <div class="noise__item3"></div>
    </div>


    <div class="wrapper">
        <div class="container fv">
            <p>NORAS INC.</p>
            <canvas id="fvCanvas"></canvas>
        </div>
        <div class="container">
            <ul class="image__list">
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <p>こんてな</p>
                    </a>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </a>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </a>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </a>
                </li>
            </ul>
        </div>
        <div style="height:100vh;">
            <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="">
        </div>
    </div>
    <div class="webgl-canvas">
        <canvas id="webgl-canvas" class="webgl-canvas__body"></canvas>
    </div>

</main>

<?php get_template_part("parts/footer/footer"); ?>