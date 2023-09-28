<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="archive-archivements" class="archive">

    <div class="wrapper">
        <section class="archivements container">
            <h2 class="section__title">
                Archivements
            </h2>
            <ul class="image__list">
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <h3>Sabak</h3>
                        <p class="caption__text">もう迷わない、プロジェクト管理ツール</p>
                    </a>
                    <span class="image__item__cat">Dev.</span>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <h3>APHRODiTE</h3>
                        <p class="caption__text">YouTubeの台本を自動生成するアプリ。</p>
                    </a>
                    <span class="image__item__cat">Dev.</span>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <h3>夢叶えるプロジェクト2024</h3>
                        <p class="caption__text">ビジネス×クリエイターの祭典</p>
                    </a>
                    <span class="image__item__cat">
                        Design.
                    </span>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <h3>古民家のらり</h3>
                        <p class="caption__text">能登半島の築150年以上の古民家</p>
                    </a>
                    <span class="image__item__cat">Service.</span>
                </li>
            </ul>
        </section>


</main>

<?php get_template_part("parts/footer/footer"); ?>