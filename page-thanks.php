<?php get_header(); ?>

<main>
    <section class="p-thanks">
        <div class="p-thanks__inner l-inner">
            <h2 class="p-thanks__title">送信完了</h2>
            <p class="p-thanks__text">
                お問合せいただきありがとうございました。<br>
                2営業日以内に担当者よりご返信差し上げます。
            </p>
            <div class="p-thanks__btn-wrap">
                <div class="c-btn01">
                    <a class="c-btn01__href" href="<?php echo esc_url(home_url('/')); ?>">
                        ホームに戻る
                        <span class="c-btn01__ico"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>