<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>
    <section class="p-contact-intro">
        <div class="p-contact-intro__inner l-inner">
            <div class="p-contact-intro__head">
                <h2 class="p-contact-intro__title">
                    お気軽にお問い合わせください
                </h2>
                <p class="p-contact-intro__lead">
                    弊社へのお問い合わせはお電話または<br class="u-md">以下のフォームから承ります。
                </p>
            </div>
            <div class="p-contact-intro__tel js-scroll-in">
                <h2 class="p-contact-intro__tel-title">
                    お電話でのお問い合わせ
                </h2>
                <div class="p-contact-intro__tel-inner">
                    <p class="p-contact-intro__tel-num">
                        <a class="p-contact-intro__tel-href" href="tel:000-000-0000" onclick="ga('send', 'event', 'teltap', 'click', 'head', 1);">000-000-0000</a>
                    </p>
                    <p class="p-contact-intro__tel-hour">
                        電話受付：平日9時〜17時
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="p-cf7__wrap" id="navi">
        <?php
        echo do_shortcode('[contact-form-7 id="dde4144" title="コンタクトフォーム 1"]');
        ?>
    </section>
</main>

<?php get_footer(); ?>