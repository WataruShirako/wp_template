<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="contact">


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


</main>

<?php get_template_part("parts/footer/footer"); ?>