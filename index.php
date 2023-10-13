<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url());
$contact = esc_url(home_url("/contact/"));

?>

<?php get_template_part("parts/header/header"); ?>
<?php echo get_template_part("parts/header/loader") ?>

<main>

    <?php echo get_template_part("/parts/top/news") ?>

    <div class="wrapper front-page">
        <section class="fv">
            <div class="fv__inner">
                <h1 class="fv__text__h1">
                    <span>N</span><span>o</span><span>r</span><span>a</span><span>s</span><span>&nbsp;</span><span>I</span><span>n</span><span>c</span><span>.</span>
                </h1>
                <img class="fv__img" src="<?php echo $uri; ?>/assets/img/fv_img.webp" />
            </div>
            <div class="mouse"></div>
        </section>

        <section class="intro">
            <div class="intro__inner">

                <img class="sh__img" src="<?php echo $uri; ?>/assets/img/intro_img.webp" alt="">

                <div class="text">
                    <h2 class="moret__title">
                        Countryside 2.0<br />
                        We start it.
                    </h2>
                    <p class="intro__text">
                        ノラスは、能登半島のWEBコンテンツ制作会社です。<br />
                        2023年8月に創業し、”田舎2.0”をビジョンに掲げ、WEBコンテンツ制作を中心に私たちの活動を通じて<br />
                        田舎を活性化するための活動をしています。<br />
                        <br />
                        築150年の古民家を拠点に、アプリ開発支援・ホームページ制作支援・<br />
                        WEBマーケティング支援を行っております。<br />
                        広大な敷地で自然に囲まれながら、楽しく働ける環境を作っています。
                    </p>
                </div>
            </div>

        </section>

        <section class="services">
            <div id="slider" class="container">
                <!-- slider用のシェーダー -->
                <?php
                get_template_part("parts/shader/vShaderSlide");
                get_template_part("parts/shader/fShaderSlide");
                ?>
                <div class="slider__img">
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_1.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_2.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_3.webp" />
                    <img class="s_img" src="<?php echo $uri; ?>/assets/img/service/service_4.webp" />
                </div>
                <div class="slider__content ">
                    <h2 class="container moret__title">
                        Service
                        <span>事業内容</span>
                    </h2>
                    <div id="slider__text">
                        <div id="slide-status">01</div>
                        <span data-slide-status="0">01</span>
                        <span data-slide-status="1">02</span>
                        <span data-slide-status="2">03</span>
                        <span data-slide-status="3">04</span>
                        <h2 id="slide-title">
                            アプリ開発
                            <p class="data__slide__title__exp">
                                お客様の課題を解決するWEBアプリ・モバイルアプリ開発を行います。
                            </p>
                        </h2>
                        <div class="data__slide__title" data-slide-title="0">
                            アプリ開発
                            <p class="data__slide__title__exp">
                                お客様の課題を解決するWEBアプリ・モバイルアプリ開発を行います。
                            </p>
                            </d>
                            <div class="data__slide__title" data-slide-title="1">
                                ウェブデザイン
                                <p class="data__slide__title__exp">
                                    ハイクオリティなデザインで、お客様のブランドを最大限に引き出します。
                                </p>
                            </div>
                            <div class="data__slide__title" data-slide-title="2">
                                映像制作
                                <p class="data__slide__title__exp">
                                    企業PR動画やモーショングラフィックなど、広告用の映像制作を行っています。
                                </p>
                            </div>
                            <div class="data__slide__title" data-slide-title="3">
                                古民家のらり
                                <p class="data__slide__title__exp">
                                    明治元年建立の古民家を改装し、一棟貸しの貸別荘を展開しています。
                                </p>
                            </div>
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

        <section class="projects front-page">
            <h2 class="container moret__title">
                Projects
                <span>これまでのプロジェクト</span>
            </h2>
            <ul class="proj__container container">
                <li class="proj__list">
                    <div class="proj__list__image__wrapper">
                        <img class="sh__img" src="<?php echo $uri; ?>/assets/img/intro_img.webp" alt="デフォルト画像" />
                        <div class="proj__list__title">
                            <p class="proj__list__title__name">古民家のらり</p>
                            <h3 class="proj__list__title__main">
                                明治元年建立<br />
                                能登半島の古民家
                            </h3>
                            <p class="proj__list__title__exp">
                                明治元年建立の古民家を改装し、一棟貸しの貸別荘を準備中です。<br />
                                YouTube「のらりと過ごす古民家生活」配信中です。
                            </p>
                        </div>
                    </div>
                </li>
                <li class="proj__list">
                    <div class="proj__list__image__wrapper">
                        <img class="sh__img" src="<?php echo $uri; ?>/assets/img/sabak_img.webp" alt="デフォルト画像" />
                        <div class="proj__list__title">
                            <p class="proj__list__title__name">Sabak</p>
                            <h3 class="proj__list__title__main">
                                もう納期に遅れない<br />
                                プロジェクト進行ツール
                            </h3>
                            <p class="proj__list__title__exp">
                                タスク・ガントチャート・WBSが一目でわかる。<br />
                                今日さばくタスクから中長期のプロジェクトまで、これ一つで簡単に管理できます。<br />
                                2024年6月リリース予定です。
                            </p>
                        </div>
                    </div>
                </li>

            </ul>
        </section>

        <section class="about">
            <h2 class="moret__title">
                Company
                <span>会社概要</span>
            </h2>
            <div class="about__container">
                <table>
                    <tr>
                        <th>会社名</th>
                        <td>合同会社ノラス</td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td>
                            〒926-0836<br />
                            石川県七尾市町屋町リ-66-1<br />
                            <a href="https://maps.app.goo.gl/9CUV6WiE7rvWR68y5" class="link" target="_blank">
                                Googleマップで開く
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.75479 8.4225L11.9989 3.17843V6.16659H13.6655V0.333252H7.83221V1.99992H10.8204L5.57629 7.244L6.75479 8.4225Z" fill="#DADADA" />
                                    <path d="M12.8346 12.0001V8.66675H11.168V12.0001H2.00126V2.83341H5.33463V1.16675H2.00126C1.08079 1.16675 0.334595 1.91294 0.334595 2.83341V12.0001C0.334595 12.9206 1.08079 13.6667 2.00126 13.6667H11.168C12.0884 13.6667 12.8346 12.9206 12.8346 12.0001Z" fill="#DADADA" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>メール</th>
                        <td>contact@norasinc.jp</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>070-7562-0563</td>
                    </tr>
                    <tr>
                        <th>設立</th>
                        <td>2023年8月</td>
                    </tr>
                    <tr>
                        <th>法人番号</th>
                        <td>4220003003560</td>
                    </tr>
                </table>
            </div>
        </section>

    </div>
</main>

<?php
get_template_part("parts/shader/vShaderArc");
get_template_part("parts/shader/fShaderArc");
?>

<?php get_template_part("parts/footer/footer"); ?>