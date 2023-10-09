<?php

$uri = get_template_directory_uri();
$home = esc_url(home_url("/"));
$archive = esc_url(home_url("/archivements/"));
$news = esc_url(home_url("/news/"));
$blog = esc_url(home_url("/blog/"));
$contact = esc_url(home_url("/contact/"));

?>


<button id="toggle" class="hamburger" type="button" aria-label="メニューを開く" aria-controls="nav"
    aria-expanded="false">MENU</button>

<nav id="nav" class="nav" aria-hidden="true">

    <ul id="menu" class="menu nav__list">
        <?php
        $menu_items = array(
            'TOP' => $home,
            'ARCHIVES' => $archive,
            'NEWS' => $news,
            'BLOG' => $blog,
            'CONTACT' => $contact,
        );
        $menu_items_jp = array(
            'TOP' => $home,
            'ARCHIVES' => $archive,
            'NEWS' => $news,
            'BLOG' => $blog,
            'CONTACT' => $contact,
        );
        foreach ($menu_items as $name => $link) :
        ?>
        <li class="nav__list__li">
            <a href="<?php echo $link; ?>" class="header__nav__list__item" data-hover-text="<?php echo $name; ?>">
                <?php echo $name; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

</nav>