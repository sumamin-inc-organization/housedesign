<?php
// 基本設定
function my_setup(){
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');

// CSS/JSファイルの読み込み
function load_assets() {
    // 共通CSS
    wp_enqueue_style( 'resetcss', get_template_directory_uri() . '/assets/css/reset.css', array(), filemtime( get_template_directory() . '/assets/css/reset.css' ) );
    wp_enqueue_style( 'stylecss', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( get_template_directory() . '/assets/css/style.css' ) );

    // 共通JS
    wp_enqueue_script('common-script', get_template_directory_uri() . '/assets/js/common.js', array(), null, true);

    // 各ページCSS/JS
    if ( is_front_page() ) { 
        wp_enqueue_style( 'top-css', get_template_directory_uri() . '/assets/css/page.top.css', array(), filemtime( get_template_directory() . '/assets/css/page.top.css' ) );
        wp_enqueue_script('top-script', get_template_directory_uri() . '/assets/js/page.top.js', array(), null, true);
			wp_enqueue_script('loading-script', get_template_directory_uri() . '/assets/js/loading.js', array(), null, true);
    }
    if ( is_page( 'about' ) ) {
        wp_enqueue_style( 'about-css', get_template_directory_uri() . '/assets/css/page.about.css', array(), filemtime( get_template_directory() . '/assets/css/page.about.css' ) );
    }
    if ( is_page( 'roofleak' ) || is_page( 'wall' ) || is_page( 'balcony' ) ) {
        wp_enqueue_style( 'roofleak-css', get_template_directory_uri() . '/assets/css/page.roofleak.css', array(), filemtime( get_template_directory() . '/assets/css/page.roofleak.css' ) );
    }
    if ( is_singular( 'works' ) || is_post_type_archive( 'works' ) || is_page( 'works_roofleak' ) || is_page( 'works_wall' ) || is_page( 'works_balcony' ) ) {
        wp_enqueue_style( 'works-css', get_template_directory_uri() . '/assets/css/page.works.css', array(), filemtime( get_template_directory() . '/assets/css/page.works.css' ) );
        wp_enqueue_script('works-script', get_template_directory_uri() . '/assets/js/page.works.js', array(), null, true);
    }
    if ( is_singular( 'column' ) || is_post_type_archive( 'column' ) || is_page( 'column_roofleak' ) || is_page( 'column_wall' ) || is_page( 'column_balcony' ) ) {
        wp_enqueue_style( 'column-css', get_template_directory_uri() . '/assets/css/page.column.css', array(), filemtime( get_template_directory() . '/assets/css/page.column.css' ) );
    }
    if ( is_page( 'company' ) ) {
        wp_enqueue_style( 'company-css', get_template_directory_uri() . '/assets/css/page.company.css', array(), filemtime( get_template_directory() . '/assets/css/page.company.css' ) );
    }
    if ( is_page( 'contact' ) ) {
        wp_enqueue_style( 'contact-css', get_template_directory_uri() . '/assets/css/page.contact.css', array(), filemtime( get_template_directory() . '/assets/css/page.contact.css' ) );
        wp_enqueue_script('contact-script', get_template_directory_uri() . '/assets/js/page.contact.js', array(), null, true);
    }

    // jQuery
    wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'load_assets' );


// カスタム投稿タイプ
function custom_post_types() {
    // カスタム投稿タイプ 'works'
    register_post_type('works',
    array(
        'labels' => array(
            'name' => __('施工事例'),
            'singular_name' => __('施工事例')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 4,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
        ),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'works'),
    ));
    
    register_taxonomy(
        'works-cat',
        'works',
        array(
            'label' => 'カテゴリー',
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
        )
    );

    // 既存のカスタム投稿タイプ 'column'
    register_post_type('column',
    array(
        'labels' => array(
            'name' => __('屋根の豆知識'),
            'singular_name' => __('屋根の豆知識')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
        ),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'column'),
    ));
    
    register_taxonomy(
        'column-cat',
        'column',
        array(
            'label' => 'カテゴリー',
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'custom_post_types');
