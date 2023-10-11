<?php
/*
Template Name: YouTube Page
*/

$uri = get_template_directory_uri();
$home = esc_url(home_url());
$youtube_data = youtube_search();

?>

<?php get_template_part("parts/header/blogHeader"); ?>

<main>

    <div class="wrapper subp">
        <section>

            <ul class="arc__container container">

                <?php
                foreach ((array)$youtube_data->items as $item) :
                    if ($item->id->kind === 'youtube#video') {
                        $video_id = $item->id->videoId;
                        $title = $item->snippet->title;
                ?>
                        <li class="arc__list">
                            <div>
                                <a class="arc__list__image__wrapper" href="https://www.youtube.com/watch?v=<?php echo $item->id->videoId; ?>" target="_blank">
                                    <img src=" <?php echo $item->snippet->thumbnails->medium->url; ?>" alt="">
                                </a>
                                <h2 class="arc__list__title">
                                    <?php echo $item->snippet->title; ?>
                                </h2>
                            </div>
                        </li>
                <?php
                    }
                endforeach; ?>
            </ul>
        </section>
    </div>
</main>

<?php get_template_part("parts/footer/blogFooter"); ?>