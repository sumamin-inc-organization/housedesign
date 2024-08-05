<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single.column.css" type="text/css">
<?php get_template_part('header_nav'); ?>
<main class="under_page_main">
    <section class="single_column">
        <div class="wrapper">
            <div class="cloumn_inner">
                <?php while (have_posts()) : the_post(); ?>
                <div class="single_column_info">
                    <span class="single_column_date"><?php echo get_the_date('Y.m.d'); ?></span>
                    <?php
                        $terms = get_the_terms($post->ID, 'column-cat'); //タクソノミーのスラッグを設定
                        if ($terms) :
                            foreach ($terms as $term) {
                                echo '<a  class="single_column_cat" href="' . get_term_link($term) . '">' . $term->name . '</a>';
                            }
                        endif;
                    ?>
                </div>
                <h2 class="single_column_title"><?php the_title(); ?></h2>
                <?php
                if (has_post_thumbnail()) {
                    echo '<div class="single_column_img">';
                    the_post_thumbnail('full');
                    echo '</div>';
                }
                ?>
                <div class="single_column_content">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <a href="<?= get_post_type_archive_link('column') ?>" class="column_btn">
                一覧に戻る
                <span class="btn_arrow"></span>
            </a>
        </div>

	</section>
</main>
<?php get_footer(); ?>