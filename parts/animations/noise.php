<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<div class="noise">
    <div class="noise__item1"></div>
    <div class="noise__item2"></div>
    <video class="video" webkit-playsinline playsinline muted autoplay loop>
        <source src="<?php echo $uri; ?>/assets/videos/bg-noise.mp4" type="video/mp4">
    </video>
</div>