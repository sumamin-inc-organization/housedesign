<?php get_header(); ?>

<?php get_template_part('header_nav'); ?>

<main class="under_page_main">

    <section class="works">
        <div class="wrapper">
            <p class="secTitleEn fadein_up">WORKS</p>
            <h2 class="pageTitle fadein_up fadein_up_second">施工事例</h2>

            <div class="category">
                <p class="category_label">カテゴリー</p>
                <div class="category_flex">
                    <p class="category_label_sp">カテゴリー</p>
                    <a href="<?= get_post_type_archive_link('works') ?>" class="category_btn category_active" data-category="all">すべて</a>
                    <a href="<?= get_permalink(get_page_by_path('works_roofleak')) ?>" class="category_btn" data-category="roofleak">雨漏り</a>
                    <a href="<?= get_permalink(get_page_by_path('works_wall')) ?>" class="category_btn" data-category="wall">外壁工事</a>
                    <a href="<?= get_permalink(get_page_by_path('works_balcony')) ?>" class="category_btn" data-category="balcony">ベランダ修復</a>
                </div>
            </div>
            <div class="works_content">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'      => 'works',     // ニュース投稿タイプ
                    'posts_per_page' => 8,          // 表示件数
                    'post_status'    => 'publish',  // 公開済みのみ
                    'orderby'        => 'date',     // 投稿日時で並び替え
                    'order'          => 'DESC',     // 新着順
                    'paged'          => $paged,     // 現在のページ数
                );
                $column_query = new WP_Query($args);

                if ($column_query->have_posts()) :
                    while ($column_query->have_posts()) :
                        $column_query->the_post();
                        $terms = get_the_terms( get_the_ID(), 'works-cat' ); // 'works-cat' はカスタムタクソノミーの名前
                        $term_slugs = array();
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                            foreach ( $terms as $term ) {
                                $term_slugs[] = $term->slug;
                            }
                        }
                ?>
                <div class="works_item">
                    <?php
                    $image1 = get_post_meta(get_the_ID(), '_works_image1', true);
                    $image2 = get_post_meta(get_the_ID(), '_works_image2', true);
                    ?>
        
                    <div class="works-images">
                        <div class="works_ba">
                            <div class="box_before js-boxBefore">
                                <?php if ($image1) : ?>
                                    <img src="<?php echo esc_url($image1); ?>" alt="施工前" class="works-image">
                                <?php endif; ?>
                                <span class="label before-label">BEFORE</span>
                            </div>
                            <div class="box_after">
                                <?php if ($image2) : ?>
                                    <img src="<?php echo esc_url($image2); ?>" alt="施工後" class="works-image">
                                <?php endif; ?>
                                <span class="label after-label">AFTER</span>
                            </div>
                            <input type="range" min="0" max="100" value="50" class="slider_range js-sliderRange">
                        </div>
                    </div>

                    <a class="works_text" href="<?php the_permalink(); ?>" data-category="<?php echo esc_attr(implode(' ', $term_slugs)); ?>">
                        <p class="works_title"><?php the_title(); ?></p>
                        <p class="works_excerpt"><?php the_excerpt(); ?></p>
                    </a>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'ニュースが見つかりませんでした。';
                endif;
                ?>
            </div>

            <?php
            // ページネーションを表示
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total'   => $column_query->max_num_pages,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
            ));
            echo '</div>';
            ?>

            <script>
                var prevLink = document.querySelector('a.prev');
                if (prevLink) {
                    prevLink.innerHTML = '<div></div>';
                }
                var nextLink = document.querySelector('a.next');
                if (nextLink) {
                    nextLink.innerHTML = '<div></div>';
                }
            </script>

        </div>
        
    </section>

</main>

<?php get_footer(); ?>