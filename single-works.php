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
                        $terms = get_the_terms($post->ID, 'works-cat'); //タクソノミーのスラッグを設定
                        if ($terms) :
                            foreach ($terms as $term) {
                                $link = str_replace('works-cat/', 'works_', get_term_link($term));
                                echo '<a  class="single_column_cat" href="' . $link . '">' . $term->name . '</a>';
                            }
                        endif;
                    ?>
                </div>
                <h2 class="single_column_title"><?php the_title(); ?></h2>
                <?php
                    $image1 = get_post_meta(get_the_ID(), '_works_image1', true);
                    $image2 = get_post_meta(get_the_ID(), '_works_image2', true);
                ?>
                <div class="works-images single_column_img">
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
                <div class="single_column_content">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <a href="<?= get_post_type_archive_link('works') ?>" class="column_btn">
                一覧に戻る
                <span class="btn_arrow"></span>
            </a>
        </div>

	</section>
</main>
<?php get_footer(); ?>