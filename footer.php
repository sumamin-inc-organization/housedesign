<section id="contact">
    <div class="contact_wrapper">
        <div class="contact_left">
            <span class="secTitleEn">CONTACT</span>
            <h3 class="secTitle">無料見積もりフォーム</h3>
            <p class="paragraph700">「House Design」は、地域の皆様に向けた雨漏り修理と防水工事の専門サービスを提供しています。当社のウェブサイトを訪れてくださり、心より感謝申し上げます。雨漏りの修理や防水工事に関するお問い合わせ、無料の診断や見積もりのご相談は、電話またはメールフォームから承っております。急ぎのご対応が必要な場合は、電話でのご連絡をいただければ、速やかにご対応いたします。</p>
            
            <a href="tel:0467-84-7404" class="footer_button"><span class="footer_tel">0467-84-7404</span><br>
            <span class="footer_time">9:00〜18:00</span><span class="footer_except">（日・祝除く）</span></a>
        </div>
        
        <div class="contact_right">
            <div class="form_title">
                <h4>カンタン<span class="yellow">30秒!</span><br class="for-sp">お見積りはこちら</h4>
                <span class="aimitsu">相見積もり大歓迎!!</span>
            </div>
            
            <div class="form_content">
                <?php echo do_shortcode('[contact-form-7 id="cc2c841" title="無料見積もりフォーム"]'); ?>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="footer_wrapper">
        <div class="footer_left">
            <a href="<?= home_url() ?>"><img class="footer_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo_wh.svg" alt="株式会社House Design"></a>
        
            <p class="footer_text">Office：〒253-0072 <br class="for-sp">神奈川県茅ヶ崎市今宿965-1-E-1503<br>
            リステージ茅ヶ崎ツインマークスF15<br>
            Base：〒253-0072 <br class="for-sp">神奈川県茅ヶ崎市今宿263-5<br>
            ガレリアタウン湘南茅ヶ崎Y-1</p>
        </div>
        
        <div class="footer_right">
            <div>
                <h4>連絡先</h4>
                <p class="footer_text"><a href="tel:0467-84-7404">TEL：0467-84-7404</a></p>
                <p class="footer_text">FAX：0467-84-7405</p>
                <p class="footer_text">Mail：info@housedesign.life</p>
        
                <h4>営業時間</h4>
                <p class="footer_text">9:00 - 18:00</p>
        
                <h4>休業日</h4>
                <p class="footer_text">水曜日（その他弊社規定休業日）</p>
            </div>
        
            <div class="footer_link">
                <ul>
                    <li><a href="<?= get_permalink(get_page_by_path('about')) ?>">私たちについて</a></li>
                    <li>事業内容</li>
                    <li class="link_lower"><a href="<?= get_permalink(get_page_by_path('roofleak')) ?>">雨漏り対応</a></li>
                    <li class="link_lower"><a href="<?= get_permalink(get_page_by_path('wall')) ?>">外壁工事</a></li>
                    <li class="link_lower"><a href="<?= get_permalink(get_page_by_path('balcony')) ?>">ベランダ修復</a></li>
                </ul>
        
                <ul>
                    <li><a href="<?= get_post_type_archive_link('works') ?>">施工事例</a></li>
                    <li><a href="<?= get_post_type_archive_link('column') ?>">コラムコラム</a></li>
                    <li><a href="<?= get_permalink(get_page_by_path('company')) ?>">会社概要</a></li>
                    <li><a href="<?= get_permalink(get_page_by_path('contact')) ?>">お問い合わせ</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="copyright">
        <p>&copy; HouseDesign All Rights Reserved</p>
    </div>
</footer>g
<?php wp_footer(); ?>
</body>
</html>