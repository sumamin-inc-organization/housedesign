<<<<<<< HEAD
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
                    <!-- <div class="horizontal_group">
                        <div class="form_group">
                            <label for="name">お名前<span class="required space">*</span></label>
                            <input type="text" id="name" name="name" required placeholder="山田 太郎">
                        </div>
                        <div class="form_group">
                            <label for="furigana">フリガナ<span class="required space">*</span></label>
                            <input type="text" id="furigana" name="furigana" required placeholder="ヤマダ タロウ">
                        </div>
                    </div>
                    <div class="horizontal_group">
                        <div class="form_group">
                            <label for="phone">電話番号<span class="required space">*</span></label>
                            <input type="tel" id="phone" name="phone" required placeholder="000-000-0000">
                        </div>
                        <div class="form_group">
                            <label for="email">メールアドレス<span class="required space">*</span></label>
                            <input type="email" id="email" name="email" required placeholder="info@mail.com">
                        </div>
                    </div>
                    <div class="form_group">
                        <label>ご希望の連絡方法<span class="required space">*</span></label>
                        <div class="radio_group">
                            <div class="radio_item">
                                <input type="radio" id="visit" name="contact_method" value="訪問" checked>
                                <label for="visit">訪問</label>
                            </div>
                            <div class="radio_item">
                                <input type="radio" id="phone_contact" name="contact_method" value="電話">
                                <label for="phone_contact">電話</label>
                            </div>
                                <div class="radio_item">
                                <input type="radio" id="email_contact" name="contact_method" value="メール">
                                <label for="email_contact">メール</label>
                            </div>
                        </div>
                    </div>
                    <div class="form_group">
                        <label>お問い合わせ内容<span class="required space">*</span></label>
                        <div class="radio_group">
                            <div class="radio_item">
                                <input type="radio" id="rain_leakage" name="inquiry_type" value="雨漏り" checked>
                                <label for="rain_leakage">雨漏り</label>
                            </div>
                            <div class="radio_item">
                                <input type="radio" id="exterior" name="inquiry_type" value="外壁">
                                <label for="exterior">外壁</label>
                            </div>
                            <div class="radio_item">
                                <input type="radio" id="veranda" name="inquiry_type" value="ベランダ修復">
                                <label for="veranda">ベランダ修復</label>
                            </div>
                            <div class="radio_item">
                                <input type="radio" id="other" name="inquiry_type" value="その他">
                                <label for="other">その他</label>
                            </div>
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="details">お問い合わせの詳細内容<span class="required space">*</span></label>
                        <textarea id="details" name="details" required placeholder="入力して下さい"></textarea>
                    </div>
                    <div class="form_group">
                        <label for="privacy_policy">プライバシーポリシー</label>
                        <div class="privacy_policy">
                            <p>株式会社House Design（以下、当社）では、当社業務において当店が取り扱う全ての個人情報の保護について、社会的使命を十分に認識し、本人の権利の保護、個人情報に関する法規制等を遵守します。</p>
                            <p>1. 個人情報の取得について<br>
                            利用目的を明確にしたうえで、必要とする範囲内に限り、適法かつ公正な手段によって個人情報を取得し、最新の注意を払って管理いたします。</p>

                            <p>2. 個人情報の利用について<br>
                            お問い合わせなどをいただく際に、お客様のメールアドレス、お名前等の情報の入力が必要な場合がございます。これらは、適切にご回答したり、ご予約を承ったりする際に必要な情報になります。</p>

                            <p>3. 個人情報の開示・提供について<br>
                            当社は以下の場合を除いて、個人情報を委託提供する場合はございません。<br>
                            ・お客様の同意がある場合<br>
                            ・法令等により官公署から個人情報の提供を求められた場合<p>

                            <p>4. 個人情報の管理について<br>
                            当社は個人情報の正確性を保持し、且つこれを安全に管理致します。当社は個人情報の紛失、破損、改ざん及び漏洩等を防止する為、不正アクセスコンピューターウィルス等に対する適正な情報セキュリティ対策を講じます。当社は個人情報を持ち出し、外部へ送信する等により漏洩させません。当サイトにて収集された個人情報に、オフラインや第三者から知り得た情報が補足されることはありません。</p>
                        </div>
                        <div class="checkbox_group">
                            <input type="checkbox" id="agree_privacy" name="agree_privacy" required>
                            <label for="agree_privacy">プライバシーポリシーに同意する</label>
                        </div>
                    </div>
                    <div class="contact_form_button_wrap">
                        <button class="contact_form_button" type="submit">
                            この内容で送信する
                            <svg class="contact_form_button_arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <g transform="translate(-15270 -1364)">
                                    <path d="M15280,1365a9,9,0,1,1-9,9,9.01,9.01,0,0,1,9-9m0-1a10,10,0,1,0,10,10,10,10,0,0,0-10-10Z" fill="#fff"/>
                                    <path d="M8.022.5H0v-1H8.022Z" transform="translate(15275.338 1374)" fill="#fff"/>
                                    <path d="M15279.384,1378.908l-.818-.879,4.334-4.028-4.334-4.029.818-.879,5.278,4.908Z" fill="#fff"/>
                                </g>
                            </svg>
                        </button>
                    </div> -->
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
=======
>>>>>>> 3e10dc215e99b0c53cfea9ca2d2714c74127f0a8
