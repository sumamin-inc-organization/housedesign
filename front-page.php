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
    </section>
</main>

<?php get_footer(); ?>