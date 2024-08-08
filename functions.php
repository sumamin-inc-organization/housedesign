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
        wp_enqueue_style( 'loading-css', get_template_directory_uri() . '/assets/css/loading.css', array(), filemtime( get_template_directory() . '/assets/css/loading.css' ) );
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
            //'thumbnail',
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


// excerpt文字制限
function custom_excerpt_length( $length ) {
    return 40;	//表示したい文字数
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// excerpt省略記号を「…」に変更する
add_filter( 'excerpt_more', function( $more ){
    return '&hellip;';
}, 999 );

// 投稿画面にメディアアップローダーを追加
// メタボックスを追加する関数
function add_works_meta_boxes() {
    add_meta_box(
        'works_media_meta_box', // メタボックスのID
        '施工事例写真', // メタボックスのタイトル
        'works_media_meta_box_callback', // コールバック関数
        'works', // 対象の投稿タイプ
        'normal', // 表示する場所
        'high' // 表示される優先度
    );
}
add_action('add_meta_boxes', 'add_works_meta_boxes');

// メタボックスのコールバック関数
function works_media_meta_box_callback($post) {
    wp_nonce_field('works_media_meta_box', 'works_media_meta_box_nonce');

    $image1 = get_post_meta($post->ID, '_works_image1', true);
    $image2 = get_post_meta($post->ID, '_works_image2', true);

    ?>
    <p>
        <label for="works_image1">施工前:</label>
        <input type="hidden" id="works_image1" name="works_image1" value="<?php echo esc_attr($image1); ?>">
        <input type="button" class="button works-media-upload" data-target="#works_image1" value="画像を選択">
        <input type="button" class="button works-media-remove" data-target="#works_image1" value="画像を取り消す" style="<?php echo $image1 ? 'display:inline-block;' : 'display:none;'; ?>">
        <span class="works-image-preview">
            <?php if ($image1): ?>
                <img src="<?php echo esc_url($image1); ?>" alt="Image 1" style="max-width: 100px; max-height: 100px;">
            <?php endif; ?>
        </span>
    </p>
    <p>
        <label for="works_image2">施工後:</label>
        <input type="hidden" id="works_image2" name="works_image2" value="<?php echo esc_attr($image2); ?>">
        <input type="button" class="button works-media-upload" data-target="#works_image2" value="画像を選択">
        <input type="button" class="button works-media-remove" data-target="#works_image2" value="画像を取り消す" style="<?php echo $image2 ? 'display:inline-block;' : 'display:none;'; ?>">
        <span class="works-image-preview">
            <?php if ($image2): ?>
                <img src="<?php echo esc_url($image2); ?>" alt="Image 2" style="max-width: 100px; max-height: 100px;">
            <?php endif; ?>
        </span>
    </p>
    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;

            // 画像を選択ボタンのクリックイベント
            $('.works-media-upload').click(function(e) {
                e.preventDefault();

                var targetInput = $(this).data('target');
                var previewElement = $(this).siblings('.works-image-preview');
                var removeButton = $(this).siblings('.works-media-remove');

                // メディアアップローダーが既に存在する場合は再利用
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                // 新しいメディアアップローダーを作成
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: '画像を選択',
                    button: {
                        text: '画像を選択'
                    },
                    multiple: false // 1つの画像のみ選択可能
                });

                // 画像が選択された後の処理
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $(targetInput).val(attachment.url);
                    previewElement.html('<img src="' + attachment.url + '" style="max-width: 100px; max-height: 100px;">');
                    removeButton.show(); // 取り消すボタンを表示
                });

                // メディアアップローダーを開く
                mediaUploader.open();
            });

            // 画像を取り消すボタンのクリックイベント
            $('.works-media-remove').click(function() {
                var targetInput = $(this).data('target');
                var previewElement = $(this).siblings('.works-image-preview');

                // フィールドの値をクリア
                $(targetInput).val('');
                previewElement.html(''); // プレビュー画像を削除
                $(this).hide(); // 取り消すボタンを非表示
            });
        });
    </script>
    <?php
}

// メタデータを保存する関数
function save_works_meta_boxes($post_id) {
    if (!isset($_POST['works_media_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['works_media_meta_box_nonce'], 'works_media_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['works_image1'])) {
        update_post_meta($post_id, '_works_image1', esc_url_raw($_POST['works_image1']));
    }
    if (isset($_POST['works_image2'])) {
        update_post_meta($post_id, '_works_image2', esc_url_raw($_POST['works_image2']));
    }
}
add_action('save_post', 'save_works_meta_boxes');

// 管理画面の投稿一覧にカテゴリーを表示させる
function add_custom_column( $defaults ) {
    global $post_type;
    if ( 'works' == $post_type ) {
        $defaults['works-cat'] = 'カテゴリー';
    }
    elseif ( 'column' == $post_type ) {
        $defaults['column-cat'] = 'カテゴリー';
    }
    return $defaults;
}
add_filter('manage_posts_columns', 'add_custom_column');
function add_custom_column_id($column_name, $id) {
if( $column_name == 'works-cat' ) {
echo get_the_term_list($id, 'works-cat', '', ', ');
}
elseif( $column_name == 'column-cat' ) {
echo get_the_term_list($id, 'column-cat', '', ', ');
}
}
add_action('manage_works_posts_custom_column', 'add_custom_column_id', 10, 2);
add_action('manage_column_posts_custom_column', 'add_custom_column_id', 10, 2);

// カテゴリー絞り込み検索
function add_post_taxonomy_restrict_filter() {
    global $post_type;
    if ( 'works' == $post_type ) {
        ?>
        <select name="works-cat">
            <option value="">カテゴリー指定なし</option>
            <?php
            $terms = get_terms('works-cat');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
        <?php
    }
    else if ( 'column' == $post_type ) {
        ?>
        <select name="column-cat">
            <option value="">カテゴリー指定なし</option>
            <?php
            $terms = get_terms('column-cat');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
        <?php
    }
}
add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter' );