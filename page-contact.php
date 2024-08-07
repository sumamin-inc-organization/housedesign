<?php
/*
Template Name: contact
*/
?>
<?php get_header(); ?>
<?php get_template_part('header_nav'); ?>
<main class="under_page_main">
    <section class="contact">
        <div class="contact_wrap">
        <div class="contact_grid">
            <div class="contact_text">
                <div class="contact_text_upper">
                    <p class="page_subtitle contact_subtitle fadein_up">CONTACT</p>
                    <h1 class="page_title contact_title fadein_up fadein_up_second">お問い合わせ</h1>
                </div>
                <div class="contact_text_bottom">
                    <p class="contact_description">雨漏りや外壁工事、ベランダの修復など<br class="for-sp">お住まいに関するあらゆることに<br class="for-sp">対応いたします。<br class="for-sp">
                    お住まいに関することで<br class="for-sp">お困りのことがありましたら、<br class="for-sp">まずはお気軽にお問い合わせください。</p>
                </div>
            </div>
            <div class="contact_form_wrap">
                <div class="contact_form">
                    <div class="contact_form_description">
                        <p>以下のフォームに必要事項をご記入の上、送信ボタンを押してください。<br><span class="required">*</span>は必須項目です。</p>
							</div>
					<?php echo do_shortcode('[contact-form-7 id="36c05ed" title="お問合せフォーム"]') ?>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('#wpcf7-f230-o1'); // 対象のフォームのIDを指定
    if (form) {
        // privacy_policy クラスを持たない <p> 要素を削除
        form.querySelectorAll('p').forEach(function(p) {
            if (!p.closest('.privacy_policy')) {
                p.outerHTML = p.innerHTML; // <p>タグを削除
            }
        });

        // privacy_policy クラスを持つ要素内の <br> を除外して削除
        form.querySelectorAll('br').forEach(function(br) {
            if (!br.closest('.privacy_policy')) {
                br.outerHTML = br.innerHTML; // <br>タグを削除
            }
        });
    }
});
</script>
<?php get_footer(); ?>
