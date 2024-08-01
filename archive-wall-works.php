<?php
/*
Template Name: works_wall
*/
?>

<?php get_header(); ?>

<?php get_template_part('header_nav'); ?>

<main class="under_page_main">

    <section class="column">
        <div class="wrapper">
            <p class="secTitleEn fadein_up">WORKS</p>
            <h2 class="pageTitle fadein_up fadein_up_second">施工事例</h2>

            <div class="category">
                <p class="category_label">カテゴリー</p>
                <div class="category_flex">
                    <p class="category_label_sp">カテゴリー</p>
                    <a href="<?= get_post_type_archive_link('works') ?>" class="category_btn" data-category="all">すべて</a>
                    <a href="<?= get_permalink(get_page_by_path('works_roofleak')) ?>" class="category_btn" data-category="roofleak">雨漏り</a>
                    <a href="<?= get_permalink(get_page_by_path('works_wall')) ?>" class="category_btn category_active" data-category="wall">外壁工事</a>
                    <a href="<?= get_permalink(get_page_by_path('works_balcony')) ?>" class="category_btn" data-category="balcony">ベランダ修復</a>
                </div>
            </div>
            <div class="column_content">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'      => 'column',
                    'posts_per_page' => 12,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'paged'          => $paged,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'column-cat',
                            'field'    => 'slug',
                            'terms'    => 'wall',
                        ),
                    ),
                );
                $wall_query = new WP_Query($args);

                if ($wall_query->have_posts()) :
                    while ($wall_query->have_posts()) :
                        $wall_query->the_post();
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
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        }
                        ?>
                    </div>
                    <div class="column_text">
                        <div class="column_text_top">
                            <p class="column_date"><?php echo get_the_date('Y.m.d'); ?></p>
                            <p class="column_category">
                                <?php
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    $term_names = array();
                                    foreach ($terms as $term) {
                                        $term_names[] = $term->name;
                                    }
                                    echo esc_html(implode(', ', $term_names));
                                } else {
                                    echo 'カテゴリーがありません';
                                }
                                ?>
                            </p>
                        </div>
                        <p class="column_title"><?php the_title(); ?></p>
                    </div>
                </a>
                <?php
                    endwhile;
                else :
                    echo '<p>投稿が見つかりませんでした。</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>

            <?php
            // ページネーションを表示
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total'   => $wall_query->max_num_pages,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'add_args'  => false,
                'type'      => 'list', // ページネーションのスタイルをリストに変更
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