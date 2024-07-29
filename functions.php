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
        wp_enqueue_script('about-script', get_template_directory_uri() . '/assets/js/page.about.js', array(), null, true);
    }
    if ( is_page( 'roofleak' ) ) {
        wp_enqueue_style( 'roofleak-css', get_template_directory_uri() . '/assets/css/page.roofleak.css', array(), filemtime( get_template_directory() . '/assets/css/page.roofleak.css' ) );
        wp_enqueue_script('roofleak-script', get_template_directory_uri() . '/assets/js/page.roofleak.js', array(), null, true);
    }
    if ( is_page( 'wall' ) ) {
        wp_enqueue_style( 'roofleak-css', get_template_directory_uri() . '/assets/css/page.roofleak.css', array(), filemtime( get_template_directory() . '/assets/css/page.roofleak.css' ) );
        wp_enqueue_script('roofleak-script', get_template_directory_uri() . '/assets/js/page.roofleak.js', array(), null, true);
    }
    if ( is_page( 'balcony' ) ) {
        wp_enqueue_style( 'roofleak-css', get_template_directory_uri() . '/assets/css/page.roofleak.css', array(), filemtime( get_template_directory() . '/assets/css/page.roofleak.css' ) );
        wp_enqueue_script('roofleak-script', get_template_directory_uri() . '/assets/js/page.roofleak.js', array(), null, true);
    }
    if ( is_singular( 'works' ) || is_post_type_archive( 'works' ) ) {
        wp_enqueue_style( 'works-css', get_template_directory_uri() . '/assets/css/page.works.css', array(), filemtime( get_template_directory() . '/assets/css/page.column.css' ) );
        wp_enqueue_script('works-script', get_template_directory_uri() . '/assets/js/page.works.js', array(), null, true);
    }
    if ( is_singular( 'column' ) || is_post_type_archive( 'column' ) ) {
        wp_enqueue_style( 'column-css', get_template_directory_uri() . '/assets/css/page.column.css', array(), filemtime( get_template_directory() . '/assets/css/page.column.css' ) );
        wp_enqueue_script('column-script', get_template_directory_uri() . '/assets/js/page.column.js', array(), null, true);
    }
    if ( is_page( 'company' ) ) {
        wp_enqueue_style( 'company-css', get_template_directory_uri() . '/assets/css/page.company.css', array(), filemtime( get_template_directory() . '/assets/css/page.company.css' ) );
        wp_enqueue_script('company-script', get_template_directory_uri() . '/assets/js/page.company.js', array(), null, true);
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
    register_post_type('column',
    array(
        'labels' => array(
            'name' => __('屋根の豆知識'),
            'singular_name' => __('屋根の豆知識')
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
        'rewrite' => array('slug' => 'column'),
        )
    );
	
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


// columnページ AJAXハンドラの追加
function ajax_load_posts() {
    // セキュリティチェック
    check_ajax_referer('load_more_posts', 'security');

    // カテゴリとページ番号を取得
    $category = sanitize_text_field($_POST['category']);
    $paged = intval($_POST['paged']);
    
    $args = array(
        'post_type'      => 'column',
        'posts_per_page' => 12,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged,
    );

    // カテゴリフィルター
    if ($category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'column-cat',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    $query = new WP_Query($args);
    
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $terms = get_the_terms(get_the_ID(), 'column-cat');
            $term_slugs = array();
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $term_slugs[] = $term->slug;
                }
            }
?>
            <a class="column_item" href="<?php the_permalink(); ?>" data-category="<?php echo esc_attr(implode(' ', $term_slugs)); ?>">
                <div class="column_img">
                    <?php if (has_post_thumbnail()) the_post_thumbnail('full'); ?>
                </div>
                <div class="column_text">
                    <div class="column_text_top">
                        <p class="column_date"><?php echo get_the_date('Y.m.d'); ?></p>
                        <p class="column_category">
                            <?php
                            $term_names = array();
                            foreach ($terms as $term) {
                                $term_names[] = $term->name;
                            }
                            echo implode(', ', $term_names);
                            ?>
                        </p>
                    </div>
                    <p class="column_title"><?php the_title(); ?></p>
                </div>
            </a>
<?php
        endwhile;
        // ページネーションリンクを追加
        echo '<div class="pagination">';
        echo paginate_links(array(
            'total'   => $query->max_num_pages,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
        ));
        echo '</div>';
    else :
        echo 'ニュースが見つかりませんでした。';
    endif;

    wp_die();
}

add_action('wp_ajax_load_posts', 'ajax_load_posts');
add_action('wp_ajax_nopriv_load_posts', 'ajax_load_posts');

// AJAX用のURLをフロントエンドに渡す
function my_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);

    // ajaxurlをローカライズ
    wp_localize_script('custom-js', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    ));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
