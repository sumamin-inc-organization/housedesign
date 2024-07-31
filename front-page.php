<?php get_header();?>

<?php get_template_part('header_nav_top'); ?>

<main>
    <section class="kv">
        <div class="kv_content">
            <video class="kv_movie" width="100vw" height="100vh" autoplay muted playsinline loop>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/top/kv.mp4" type="video/mp4">
                お使いのブラウザは動画タグをサポートしていません。
            </video>
            <video class="kv_movie_sp" width="100vw" height="100vh" autoplay muted playsinline loop>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/top/sp/kv.mp4" type="video/mp4">
                お使いのブラウザは動画タグをサポートしていません。
            </video>
        </div>
        <img class="kv_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo_wh.svg">
    </section>

    <section class="about">
        <div class="flow_text">
            <p class="flow_text_item">HOUSEDESIGN</p>
            <p class="flow_text_item">HOUSEDESIGN</p>
        </div>
        <div class="wrapper">
            <div class="about_content">
                <div class="about_left">
                    <div class="section_title">
                        <p class="secTitleEn fadein_up">ABOUT House Design</p>
                        <h2 class="secTitle fadein_up fadein_up_second">超地域密着型<br>雨漏り工事のプロ集団</h2>
                    </div>
                    <div class="about_block">
                        <p class="red">緊急<br>対応</p>
                        <p class="green">現地<br>調査</p>
                        <p class="blue">原因<br>特定</p>
                        <p class="yellow">赤外線<br>調査</p>
                    </div>
                </div>
                <div class="about_right">
                    <p>
                        House Designは雨漏り修理から外壁工事一式、ベランダ修復まで<br class="for-pc">
                        トータルで住まいの問題を解決する住宅・店舗の専門店です。<br class="for-pc">
                        地域密着だからこそ、アフターフォローを徹底。<br><br>
                        「どんな人がどんな思いで手をかけているのかわかる」そんな想いで、<br class="for-pc">
                        修理後の未来を見据えた提案を心がけています。<br><br>
                        地域密着型の修理業者だからできるスムーズな施工とアフターフォロー。<br>
                        屋根のお困りごとはハウスデザインへ。
                    </p>
                    <a href="<?= get_permalink(get_page_by_path('about')) ?>" class="top_btn">私たちについて<span class="btn_arrow"></span></a>
                </div>
            </div>
        </div>
        <div class="about_bottom">
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/kv_bottom1.jpg">
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/kv_bottom2.jpg">
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/kv_bottom3.jpg">
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/kv_bottom4.jpg">
            </div>
            <img class="for-sp" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/kv_bottom.png">
        </div>
    </section>

    <section class="service">
        <div class="wrapper">
            <div class="section_title">
                <p class="secTitleEn fadein_up">SERVICES</p>
                <h2 class="secTitle fadein_up fadein_up_second">事業内容</h2>
                <p class="section_text">HOUSE DESIGNでは雨漏り修理から外壁工事一式、ベランダ修復まで<br class="for-pc">お住まいに関するあらゆることに対応いたします。</p>
            </div>
            <div class="service_content">
                <div class="service_item">
                    <h3>雨漏り</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/service1.jpg">
                    <p>雨漏りは迅速な対応が大切。<br>いつでもすぐにご対応します。</p>
                    <a href="<?= get_permalink(get_page_by_path('roofleak')) ?>" class="top_btn">詳しくはこちら<span class="btn_arrow"></span></a>
                </div>
                <div class="service_item">
                    <h3>外壁工事</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/service2.jpg">
                    <p>できる限り既存の壁を活かした<br>施工をいたします。</p>
                    <a href="<?= get_permalink(get_page_by_path('wall')) ?>" class="top_btn">詳しくはこちら<span class="btn_arrow"></span></a>
                </div>
                <div class="service_item">
                    <h3>ベランダ修復</h3>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/service3.jpg">
                    <p>雨風にさらされているベランダ。<br>気づいたらお早めにご相談下さい。</p>
                    <a href="<?= get_permalink(get_page_by_path('balcony')) ?>" class="top_btn">詳しくはこちら<span class="btn_arrow"></span></a>
                </div>
            </div>
        </div>
    </section>

    <div class="grad_bg">

        <section class="works">
            <div class="wrapper">
                <div class="works_content">
                    <a href="<?= get_post_type_archive_link('works') ?>" class="top_btn for-sp">実績一覧<span class="btn_arrow"></span></a>
                    <div class="works_ba">
                        <div class="box_before" id="js-boxBefore">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/works_before.jpg" alt="ビフォー画像">
                        </div>
                        <div class="box_after">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/works_after.jpg" alt="アフター画像">
                        </div>
                        <input type="range" min="0" max="100" value="50" oninput="beforeAfterSlider()" onchange="beforeAfterSlider()" class="slider_range" id="js-sliderRange">
                    </div>
                    <div class="section_title">
                        <p class="secTitleEn fadein_up">WORKS</p>
                        <h2 class="secTitle fadein_up fadein_up_second">実績紹介</h2>
                        <p class="section_text">House Designでは、生活スタイルの変化に応じたリノベーションを提供し、お客様の理想的な暮らしを実現します。私たちのリフォームとリノベーションサービスは、長年にわたる実績と信頼、革新的なアイデアに裏打ちされています。ぜひ、この品質をご体験ください。</p>
                        <a href="<?= get_post_type_archive_link('works') ?>" class="top_btn for-pc">実績一覧<span class="btn_arrow"></span></a>
                    </div>
                </div>
            </div>
            <!-- slider -->
            <ul class="scroller_inner">
                <li class="list_item" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/slider1.jpg" alt="事例"></li>
                <li class="list_item" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/slider2.jpg" alt="事例"></li>
                <li class="list_item" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/slider3.jpg" alt="事例"></li>
                <li class="list_item" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/slider4.jpg" alt="事例"></li>
                <li class="list_item" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/slider5.jpg" alt="事例"></li>
                <li class="list_item" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/slider6.jpg" alt="事例"></li>
            </ul>
        </section>

        <section class="column">
            <div class="wrapper">
                <div class="section_title">
                    <p class="secTitleEn fadein_up">COLUMN</p>
                    <h2 class="secTitle fadein_up fadein_up_second">屋根の豆知識</h2>
                </div>
                <div class="column_content">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type'      => 'column',     // ニュース投稿タイプ
                        'posts_per_page' => 3,          // 表示件数
                        'post_status'    => 'publish',  // 公開済みのみ
                        'orderby'        => 'date',     // 投稿日時で並び替え
                        'order'          => 'DESC',     // 新着順
                        'paged'          => $paged,     // 現在のページ数
                    );
                    $column_query = new WP_Query($args);
    
                    if ($column_query->have_posts()) :
                        while ($column_query->have_posts()) :
                            $column_query->the_post();
                            $terms = get_the_terms( get_the_ID(), 'column-cat' ); // 'column-cat' はカスタムタクソノミーの名前
                            $term_slugs = array();
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                foreach ( $terms as $term ) {
                                    $term_slugs[] = $term->slug;
                                }
                            }
                    ?>
                    <a class="column_item" href="<?php the_permalink(); ?>" data-category="<?php echo esc_attr(implode(' ', $term_slugs)); ?>">
                        <div class="column_img">
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'full' );
                            }
                            ?>
                        </div>
                        <div class="column_text">
                            <div class="column_text_top">
                                <!-- 投稿日 -->
                                <p class="column_date"><?php echo get_the_date('Y.m.d'); ?></p>
                                <!-- カテゴリー -->
                                <p class="column_category">
                                    <?php
                                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                        $term_names = array();
                                        foreach ( $terms as $term ) {
                                            $term_names[] = $term->name;
                                        }
                                        echo implode( ', ', $term_names );
                                    } else {
                                        echo 'カテゴリーがありません';
                                    }
                                    ?>
                                </p>
                            </div>
                            <!-- タイトル -->
                            <p class="column_title"><?php the_title(); ?></p>
                        </div>
                    </a>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'ニュースが見つかりませんでした。';
                    endif;
                    ?>
                </div>
                <a href="<?= get_post_type_archive_link('column') ?>" class="top_btn">豆知識一覧<span class="btn_arrow"></span></a>
            </div>
        </section>
    </div>

</main>

<?php get_footer(); ?>