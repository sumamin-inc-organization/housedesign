<header class="under_page">
    <h1 class="header_logo"><a href="#top"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.svg" alt="TONAMI"></a></h1>
    <div class="header_menu" id="g_nav">
        <a href="#" class="header_nav" <?php if( is_front_page() ): ?> class="current"<?php else: endif; ?>>HOME</a>
        <a href="#" class="header_nav" <?php if( is_page('about') ): ?>class="current"<?php else: endif; ?>>私たちについて</a>
        <a href="#" class="header_nav" <?php if( is_page('roofleak') || is_page('wall') || is_page('balcony') ): ?>class="current"<?php else: endif; ?>>事業内容</a>
        <a href="#" class="header_nav" <?php if( is_page('works') ): ?>class="current"<?php else: endif; ?>>施工事例</a>
        <a href="#" class="header_nav" <?php if( is_page('column') ): ?>class="current"<?php else: endif; ?>>コラム</a>
        <a href="#" class="header_nav" <?php if( is_page('company') ): ?>class="current"<?php else: endif; ?>>会社概要</a>
        <a href="#contact" class="header_btn">お問い合わせ</a>
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
            <div class="header_bg"></div>
            <ul class="navigation__list">
                <li class="navigation__list-item"><a href="#" class="navigation__link">HOME</a></li>
                <li class="navigation__list-item"><a href="#" class="navigation__link">私たちについて</a></li>
                <li class="navigation__list-item"><a href="#" class="navigation__link">事業内容</a></li>
                <li class="navigation__list-item"><a href="#" class="navigation__link">施工事例</a></li>
                <li class="navigation__list-item"><a href="#" class="navigation__link">コラム</a></li>
                <li class="navigation__list-item"><a href="#" class="navigation__link">会社概要</a></li>
            </ul>
        </nav>
    </div>
</header>