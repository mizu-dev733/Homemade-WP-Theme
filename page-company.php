<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>
    <section class="p-company-greeting">
        <div class="p-company-greeting__inner l-inner">
            <div class="p-company-greeting__head-wrap">
                <div class="p-company-greeting__head js-scroll-in">
                    <span class="p-company-greeting__en">Greeting</span>
                    <h2 class="p-company-greeting__title">ご挨拶</h2>
                    <h3 class="p-company-greeting__sub-title">
                        安全と品質を追求し、<br class="md">地域社会に貢献する。
                    </h3>
                </div>
                <picture class="p-company-greeting__picture js-scroll-in">
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/company/greeting_sp.webp">
                    <img class="p-company-greeting__img" src="<?php echo get_template_directory_uri(); ?>/images/company/greeting_pc.webp" alt="代表取締役　西門 〇〇">
                </picture>
            </div>
            <div class="p-company-greeting__cont js-scroll-in">
                <p class="p-company-greeting__lead">
                    株式会社西門建設工業は、「地域社会の未来を築く、安全で信頼される建設を目指す」という理念のもと、創業以来、地域に根ざした建設活動を展開してまいりました。私たちは、単に建物を建設するだけでなく、人と街をつなぐ架け橋となることを使命とし、住む人、働く人、訪れる人すべてが安心して笑顔でいられる場所を提供することを目指しています。</p>
                <p class="p-company-greeting__lead">
                    長年にわたり、大阪府南部を中心に、中規模公共工事（道路、橋梁の修繕、水道工事など）、地域の商業施設やマンションの施工、そして個人住宅のリフォーム・耐震補強工事といった幅広い分野で、地域の皆様の生活を支えてまいりました。これらの実績を通じて培ってきた技術力と経験を活かし、お客様の多様なニーズに柔軟に対応できることが、私たちの強みです。
                </p>
                <p class="p-company-greeting__lead">
                    また、私たちは建設現場の安全性を最優先に考え、品質管理を徹底しています。さらに、最新技術を取り入れながら、環境負荷を抑えた持続可能な建設にも積極的に取り組んでいます。これは、私たちが技術と環境の両立を重視し、次世代に繋がる街づくりを目指しているからです。
                </p>
                <p class="p-company-greeting__lead">
                    私たちは、地域密着型の企業として、お客様とのコミュニケーションを大切にし、期待を超えるサービスを提供できるよう日々努力を重ねています。地域社会の発展に貢献するという共通の目標のもと、社員一同が力を合わせ、誠心誠意業務に取り組んでおります。
                    今後も、西門建設工業は、地域と共に成長し続ける企業として、皆様の信頼にお応えできるよう、より一層の努力を重ねてまいります。変わらぬご支援を賜りますよう、心よりお願い申し上げます。
                </p>
                <p class="p-company-greeting__name">代表取締役　西門 〇〇</p>
            </div>
        </div>
    </section>
    <section class="p-company-profile">
        <div class="p-company-profile__inner">
            <div class="p-company-profile__head js-scroll-in">
                <span class="p-company-profile__en">Company Profile</span>
                <h2 class="p-company-profile__title">会社概要</h2>
            </div>
            <table class="p-company-profile__table">
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">会社名</th>
                    <td class="p-company-profile__table-data">西門建設株式会社</td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">住所</th>
                    <td class="p-company-profile__table-data">〒587-0000<br>大阪府堺市〇〇〇</td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">電話番号</th>
                    <td class="p-company-profile__table-data"><a href="tel:000-000-0000" onclick="ga('send', 'event', 'teltap', 'click', 'head', 1);">000-000-0000</a></td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">創業</th>
                    <td class="p-company-profile__table-data">1995年</td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">代表</th>
                    <td class="p-company-profile__table-data">西門 〇〇</td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">資本金</th>
                    <td class="p-company-profile__table-data">5,000万円</td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">従業員数</th>
                    <td class="p-company-profile__table-data">80名</td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">事業内容</th>
                    <td class="p-company-profile__table-data">
                        <ul>
                            <li>中規模公共工事（道路、橋梁の修繕、水道工事など）</li>
                            <li>地域の商業施設やマンションの施工</li>
                            <li>個人住宅のリフォーム・耐震補強工事</li>
                        </ul>
                    </td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">建設業許可</th>
                    <td class="p-company-profile__table-data">
                        <ul>
                            <li>国土交通大臣許可（特-5）第0000号</li>
                            <li>〇〇府知事（14）第0000号</li>
                            <li>〇〇府知事登録（ヌ）第0000号</li>
                        </ul>
                    </td>
                </tr>
                <tr class="p-company-profile__table-row js-scroll-in">
                    <th class="p-company-profile__table-header">主要取引銀行</th>
                    <td class="p-company-profile__table-data">〇〇銀行、〇〇信用金庫、〇〇銀行</td>
                </tr>
            </table>
            <div class="p-company-profile__map">
                <div class="p-company-profile__gmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10424.899899534616!2d135.55795828156823!3d34.5405712333897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000d9d397cc46f5%3A0x4b7e67fabc9d847a!2z44CSNTg3LTAwMDA!5e0!3m2!1sja!2sjp!4v1737938051931!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="p-company-slider">
        <div class="p-company-slider__cont splide" id="company-slide">
            <div class="p-company-slider__track splide__track">
                <ul class="p-company-slider__list splide__list">
                    <li class="p-company-slider__slide splide__slide">
                        <img class="p-company-slider__img" src="<?php echo get_template_directory_uri(); ?>/images/company/slide01.webp" alt="事務所の様子">
                    </li>
                    <li class="p-company-slider__slide splide__slide">
                        <img class="p-company-slider__img" src="<?php echo get_template_directory_uri(); ?>/images/company/slide02.webp" alt="現場で業務に励むベテラン作業員">
                    </li>
                    <li class="p-company-slider__slide splide__slide">
                        <img class="p-company-slider__img" src="<?php echo get_template_directory_uri(); ?>/images/company/slide03.webp" alt="ヘルメットとその奥に街の様子">
                    </li>
                    <li class="p-company-slider__slide splide__slide">
                        <img class="p-company-slider__img" src="<?php echo get_template_directory_uri(); ?>/images/company/slide04.webp" alt="カメラ目線でガッツポーズする男性作業員">
                    </li>
                    <li class="p-company-slider__slide splide__slide">
                        <img class="p-company-slider__img" src="<?php echo get_template_directory_uri(); ?>/images/company/slide05.webp" alt="現場で打ち合わせしている作業員2名">
                    </li>
                    <li class="p-company-slider__slide splide__slide">
                        <img class="p-company-slider__img" src="<?php echo get_template_directory_uri(); ?>/images/company/slide06.webp" alt="こちらを向く笑顔の男性作業員">
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="p-company-cta" id="cv">
        <?php get_template_part('template-parts/cta'); ?>
    </section>
</main>

<?php get_footer(); ?>