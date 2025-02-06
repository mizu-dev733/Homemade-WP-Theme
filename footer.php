<footer class="l-footer">
    <div class="l-footer__inner l-inner">
        <div class="l-footer__top">
            <div class="l-footer__info">
                <div class="l-footer__logo-wrap">
                    <?php if (has_custom_logo()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo">
                            <?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            if ($custom_logo_id) {
                                $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                                echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                            }
                            ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="l-footer__address-warp">
                    <p class="l-footer__address-num">〒587-0000</p>
                    <p class="l-footer__address">大阪府堺市〇〇-〇〇</p>
                </div>
                <div class="l-footer__tel-warp">
                    <p class="l-footer__tel">
                        TEL:
                        <a class="l-footer__tel-href" href="">
                            075-0000-0000
                        </a>
                    </p>
                    <p class="l-footer__fax">
                        FAX:075-0000-0000
                    </p>
                </div>
            </div>
            <nav class="l-footer__nav-wrap">
                <ul class="l-footer__nav-list l-footer__nav-list01">
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="/">
                            ホーム
                        </a>
                    </li>
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="<?php echo get_template_directory_uri(); ?>/service/">
                            事業紹介
                        </a>
                    </li>
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">
                            施工事例
                        </a>
                    </li>
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="<?php echo get_template_directory_uri(); ?>/company/">
                            会社概要
                        </a>
                    </li>
                </ul>
                <ul class="l-footer__nav-list l-footer__nav-list02">
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="<?php echo get_template_directory_uri(); ?>/recruit/">
                            採用情報
                        </a>
                    </li>
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="<?php echo get_template_directory_uri(); ?>/news/">
                            新着情報
                        </a>
                    </li>
                    <li class="l-footer__nav-list-item">
                        <a class="l-footer__nav-list-item-link" href="<?php echo get_template_directory_uri(); ?>/contact/">
                            お問い合わせ
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="l-footer__bottom">
            <div class="l-footer__copyright">
                © 2025 Nishikado Construction industry. Co., Ltd
            </div>
            <div class="l-footer__page-top">
                <a href="#header"></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>