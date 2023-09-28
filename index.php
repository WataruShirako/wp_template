<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="home">


    <div class="wrapper">
        <div class="fv">
            <!-- <p class="sh__txt">NORAS INC.</p> -->
            <div class="sh__fv"></div>
        </div>
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
                        <img class="sh__img" src="https://source.unsplash.com/phIFdC6lA4E" alt="" />
                        <h3>APHRODiTE</h3>
                        <p class="caption__text">YouTubeの台本を自動生成するアプリ。</p>
                    </a>
                    <span class="image__item__cat">Dev.</span>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/uA2OC0NY5U8/" alt="" />
                        <h3>夢叶えるプロジェクト2024</h3>
                        <p class="caption__text">ビジネス×クリエイターの祭典</p>
                    </a>
                    <span class="image__item__cat">
                        Design.
                    </span>
                </li>
                <li class="image__item">
                    <a href="" class="image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/aUzU3h_ohQM/" alt="" />
                        <h3>古民家のらり</h3>
                        <p class="caption__text">能登半島の築150年以上の古民家</p>
                    </a>
                    <span class="image__item__cat">Service.</span>
                </li>
            </ul>
        </section>

        <div style="margin-top: 120px;"></div>
        <section class="services">

            <h2 class="container section__title">
                Services
            </h2>

            <!-- <div class="swiper">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="slide__item ">
                            <div class="slide">
                                <img class="js-slide" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                            </div>
                            <div class="slide__text container">
                                <h3>事業内容</h3>
                                <p>事業内容です。</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide__item ">
                            <div class="slide">
                                <img class="js-slide" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                            </div>
                            <div class="slide__text container">
                                <h3>事業内容2</h3>
                                <p>事業内容です。</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide__item ">
                            <div class="slide">
                                <img class="js-slide" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                            </div>
                            <div class="slide__text container">
                                <h3>事業内容</h3>
                                <p>事業内容です。</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container controller">
                    <div class="button flex">
                        <div class="button__item swiper-button-prev">◀︎</div>
                        <div class="button__item swiper-button-next">▶︎</div>
                    </div>
                </div>

            </div> -->

            <!-- <div class="wapper_img">
                <div class="slider js-slider flex">
                    <div class="slide">
                        <img class="js-slide" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </div>
                    <div class="slide">
                        <img class="js-slide" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </div>
                    <div class="slide">
                        <img class="js-slide" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                    </div>
                </div>
            </div> -->

            <div class="cyl"></div>
        </section>

        <div style="height: 100vh;"></div>

    </div>

</main>

<?php get_template_part("parts/footer/footer"); ?>