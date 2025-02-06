<div class="l-lower-mv" id="lower-mv">
    <div class="l-lower-mv__inner">
        <div class="l-lower-mv__head js-scroll-in">
            <?php
            if (is_page('service')) : ?>
                <span class="l-lower-mv__page-en">service</span>
                <h2 class="l-lower-mv__page-ja">事業紹介</h2>

            <?php elseif (is_page('company')) : ?>
                <span class="l-lower-mv__page-en">company</span>
                <h2 class="l-lower-mv__page-ja">会社概要</h2>

            <?php elseif (is_page('recruit')) : ?>
                <span class="l-lower-mv__page-en">recruit</span>
                <h2 class="l-lower-mv__page-ja">採用情報</h2>

            <?php elseif (is_page('news') || is_singular('post') || is_category() || is_home()) : ?>
                <span class="l-lower-mv__page-en">news</span>
                <h2 class="l-lower-mv__page-ja">新着情報</h2>

            <?php elseif (is_page('contact') || is_page('thanks')) : ?>
                <span class="l-lower-mv__page-en">contact</span>
                <h2 class="l-lower-mv__page-ja">お問い合わせ</h2>

            <?php elseif (is_post_type_archive('works') || is_singular('works') || is_tax('type_works')) : ?>
                <span class="l-lower-mv__page-en">works</span>
                <h2 class="l-lower-mv__page-ja">施工事例</h2>
            <?php endif; ?>
        </div>

        <div class="l-lower-mv__breadcrumb js-scroll-in">
            <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>

        <div class="l-lower-mv__image-wrap">
            <picture class="l-lower-mv__picture js-scroll-in">
                <?php
                if (is_page('service')) : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/service/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/service/lower-mv_pc.webp" alt="Service Image">

                <?php elseif (is_page('company')) : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/company/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/company/lower-mv_pc.webp" alt="Company Image">

                <?php elseif (is_page('recruit')) : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/recruit/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/recruit/lower-mv_pc.webp" alt="Recruit Image">

                <?php elseif (is_page('news') || is_singular('post') || is_category() || is_home()) : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/news/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/news/lower-mv_pc.webp" alt="News Image">

                <?php elseif (is_page('contact') || is_page('thanks')) : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/contact/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/contact/lower-mv_pc.webp" alt="Contact Image">

                <?php elseif (is_post_type_archive('works') || is_singular('works') || is_tax('type_works')) : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/works/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/works/lower-mv_pc.webp" alt="Works Image">

                <?php else : ?>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/common/lower-mv_sp.webp">
                    <img class="l-lower-mv__image" src="<?php echo get_template_directory_uri(); ?>/images/common/lower-mv_pc.webp" alt="Default Image">
                <?php endif; ?>
            </picture>
        </div>
    </div>
</div>