<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="error" class="not-found">



    <span>404 not found</span><br />
    ページが見つかりません
</main>



<?php get_template_part("parts/footer/footer"); ?>