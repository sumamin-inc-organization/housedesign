<header class="header_under">
    <h1 class="header_logo"><a href="<?= home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" alt="TONAMI"></a></h1>
    <div class="header_menu">
        <ul class="header_nav">
            <li <?= is_home() ? ' class="current"' : '' ?>><a href="<?= home_url() ?>" class="header_link">HOME</a></li>
            <li <?= is_page('about') ? ' class="current"' : '' ?>><a href="<?= get_permalink(get_page_by_path('about')) ?>" class="header_link">私たちについて</a></li>
            <li <?= (is_page('roofleak') || is_page('wall') || is_page('balcony')) ? ' class="current"' : '' ?> class="header_link">事業内容
                <ul class="sub-menu">
                    <li><a href="<?= get_permalink(get_page_by_path('roofleak')) ?>" class="header_link">雨漏り</a></li>
                    <li><a href="<?= get_permalink(get_page_by_path('wall')) ?>" class="header_link">外壁工事</a></li>
                    <li><a href="<?= get_permalink(get_page_by_path('balcony')) ?>" class="header_link">ベランダ修復</a></li>
                </ul>
            </li>
            <li <?= is_post_type_archive('works') ? ' class="current"' : '' ?>><a href="<?= get_post_type_archive_link('works') ?>" class="header_link">施工事例</a></li>
            <li <?= is_post_type_archive('column') ? ' class="current"' : '' ?>><a href="<?= get_post_type_archive_link('column') ?>" class="header_link">コラム</a></li>
            <li <?= is_page('company') ? ' class="current"' : '' ?>><a href="<?= get_permalink(get_page_by_path('company')) ?>" class="header_link">会社概要</a></li>
        </ul>
        <a href="<?= get_permalink(get_page_by_path('contact')) ?>" class="header_btn">お問い合わせ</a>
        <div class="header_tel">
            <a class="header_tel_number" href="tel:0467-84-7404">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/phone.svg">
                <span>0467-84-7404</span>
            </a>
            <p class="header_tel_open">9:00〜18:00<span>(日・祝除く)</span></p>
        </div>
        <!-- hamburger -->
        <button class="hamburger-menu" id="js-hamburger-menu">
            <span class="hamburger-menu__bar"></span>
            <span class="hamburger-menu__bar"></span>
            <span class="hamburger-menu__bar"></span>
        </button>
        <nav class="navigation">
            <ul class="navigation__list">
                <li class="navigation__list-item"><a href="<?= home_url() ?>" class="navigation__link">HOME</a></li>
                <li class="navigation__list-item"><a href="<?= get_permalink(get_page_by_path('about')) ?>" class="navigation__link">私たちについて</a></li>
                <li class="navigation__list-item">
                    事業内容
                    <div class="navigation__works">
                        <a href="<?= get_permalink(get_page_by_path('roofleak')) ?>" class="navigation__link">雨漏り</a>
                        <a href="<?= get_permalink(get_page_by_path('wall')) ?>" class="navigation__link">外壁工事</a>
                        <a href="<?= get_permalink(get_page_by_path('balcony')) ?>" class="navigation__link">ベランダ修復</a>
                    </div>
                </li>
                <li class="navigation__list-item"><a href="<?= get_post_type_archive_link('works') ?>" class="navigation__link">施工事例</a></li>
                <li class="navigation__list-item"><a href="<?= get_post_type_archive_link('column') ?>" class="navigation__link">コラム</a></li>
                <li class="navigation__list-item"><a href="<?= get_permalink(get_page_by_path('company')) ?>" class="navigation__link">会社概要</a></li>
                <div class="hamburger_tel">
                    <a class="header_tel_number" href="tel:0467-84-7404">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/phone.svg">
                        <span>0467-84-7404</span>
                    </a>
                    <p class="header_tel_open">9:00〜18:00<span>(日・祝除く)</span></p>
                </div>
                <div class="navigation_btn">
                    <a href="<?= get_permalink(get_page_by_path('contact')) ?>" class="hamburger_btn">お問い合わせ</a>
                </div>
            </ul>
        </nav>
    </div>
</header>