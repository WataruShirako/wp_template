<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());

?>

<?php get_template_part("parts/header/header"); ?>

<main data-barba="container" data-barba-namespace="home">


    <div class="wrapper">
        <div class="fv">
            <div class="fv__inner">
                <img class="fv__img" src="<?php echo $uri; ?>/assets/img/noras_fv.png" />
                <p>
                    ノラスは、ウェブコンテンツ、アプリ開発、<br class="sp" />
                    デザイン制作を行う会社です。
                </p>
            </div>

        </div>
        <section class="archivements">
            <h2 class="container section__title">
                Archivements
                <span>制作事例</span>
            </h2>
            <ul class="arc__container container">
                <li class="arc__list">
                    <a href="" class="arc__list__image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/whOkVvf0_hU/" alt="" />
                        <h3 class="arc__list__title">Sabak</h3>
                        <p class="caption__text">もう迷わない、プロジェクト管理ツール</p>
                    </a>

                </li>
                <li class="arc__list">
                    <a href="" class="arc__list__image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/phIFdC6lA4E" alt="" />
                        <h3 class="arc__list__title">APHRODiTE</h3>
                        <p class="caption__text">YouTubeの台本を自動生成するアプリ。</p>
                    </a>

                </li>
                <li class="arc__list">
                    <a href="" class="arc__list__image__wrapper">
                        <img class="sh__img" src="https://source.unsplash.com/uA2OC0NY5U8/" alt="" />
                        <h3 class="arc__list__title">夢叶えるプロジェクト2024</h3>
                        <p class="caption__text">ビジネス×クリエイターの祭典</p>
                    </a>

                </li>
                <li class="arc__list">
                    <a href="" class="arc__list__image__wrapper">
                        <img class="sh__img" src="<?php echo $uri; ?>/assets/img/service/service_4.webp" alt="" />
                        <h3 class="arc__list__title">古民家のらり</h3>
                        <p class="caption__text">能登半島の築150年以上の古民家</p>
                    </a>

                </li>
            </ul>
        </section>

        <div style="margin-top: 120px;"></div>
        <section class="services">

            <h2 class="container section__title">
                Services
                <span>事業内容</span>
            </h2>

            <div id="slider" class="container">

                <div class="slider__img">
                    <img class="s_img" src="https://source.unsplash.com/aUzU3h_ohQM/" />
                    <img class="s_img" src="https://source.unsplash.com/uA2OC0NY5U8/" />
                    <img class="s_img" src="https://source.unsplash.com/phIFdC6lA4E" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_4.webp" width="1280" height="720" />
                </div>

                <div class="slider__content ">

                    <div id="slider__text">
                        <div class="meta">Service</div>
                        <div id="slide-status">01</div>
                        <span data-slide-status="0">01</span>
                        <span data-slide-status="1">02</span>
                        <span data-slide-status="2">03</span>
                        <span data-slide-status="3">04</span>
                        <h2 id="slide-title">アプリ開発</h2>
                        <span data-slide-title="0">アプリ開発</span>
                        <span data-slide-title="1">ウェブデザイン</span>
                        <span data-slide-title="2">映像制作</span>
                        <span data-slide-title="3">古民家のらり</span>

                    </div>


                    <div id="pagination">
                        <button class="active" data-slide="0"></button>
                        <button data-slide="1"></button>
                        <button data-slide="2"></button>
                        <button data-slide="3"></button>
                    </div>
                </div>



            </div>

        </section>

        <div style="height: 100vh;"></div>



    </div>

</main>

<?php get_template_part("parts/footer/footer"); ?>