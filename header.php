<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&family=Rubik:wght@400;700&family=Noto+Serif+JP:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

</head>

<body id="<?php echo is_front_page() ? 'home' : (is_singular() ? get_post_field('post_name', get_post()) : ''); ?>">
    <?php
    if (is_front_page()) {
    ?>
        <?php get_template_part('template-parts/loading'); ?>
    <?php
    }
    ?>

    <header id="header" class="l-header">
        <div class="l-header__inner">
            <h1 class="l-header__logo-wrap">
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
            </h1>
            <div class="l-header__cont">
                <nav class="l-header__nav p-nav-pc">
                    <ul class="p-nav-pc__list">
                        <li class="p-nav-pc__list-item <?php if (is_front_page()) echo 'is-current'; ?>" itemprop="name">
                            <a class="p-nav-pc__list-item-link" href="<?php echo esc_url(home_url('/')); ?>">ホーム</a>
                        </li>
                        <li class="p-nav-pc__list-item <?php if (is_page('service')) echo 'is-current'; ?>" itemprop="name">
                            <a class="p-nav-pc__list-item-link" href="<?php echo get_template_directory_uri(); ?>/service/">事業紹介</a>
                        </li>
                        <li class="p-nav-pc__list-item <?php if (is_post_type_archive('works') || is_singular('works') || is_tax('type_works')) echo 'is-current'; ?>" itemprop="name">
                            <a class="p-nav-pc__list-item-link" href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">施工事例</a>
                        </li>
                        <li class="p-nav-pc__list-item <?php if (is_page('recruit')) echo 'is-current'; ?>" itemprop="name">
                            <a class="p-nav-pc__list-item-link" href="<?php echo get_template_directory_uri(); ?>/recruit/">採用情報</a>
                        </li>
                        <li class="p-nav-pc__list-item <?php if (is_page('company')) echo 'is-current'; ?>" itemprop="name">
                            <a class="p-nav-pc__list-item-link" href="<?php echo get_template_directory_uri(); ?>/company/">会社概要</a>
                        </li>
                    </ul>
                </nav>
                <div class="l-header__contact-btn-wrap">
                    <a href="<?php echo get_template_directory_uri(); ?>/contact/" class="l-header__contact-btn">
                        お問い合わせ
                    </a>
                </div>
            </div>
            <button class="l-header__nav-toggle l-nav-btn" aria-controls="nav" aria-expanded="false">
                <span class="l-nav-btn__line"></span>
                <span class="l-nav-btn__line"></span>
                <span class="l-nav-btn__line"></span>
            </button>
            <nav class="p-nav-sp" id="nav" role="navigation">
                <ul class="p-nav-sp__list">
                    <li class="p-nav-sp__list-item" itemprop="name">
                        <a class="p-nav-sp__list-item-link" href="<?php echo esc_url(home_url('/')); ?>">ホーム</a>
                    </li>
                    <li class="p-nav-sp__list-item" itemprop="name">
                        <a class="p-nav-sp__list-item-link" href="<?php echo get_template_directory_uri(); ?>/service/">事業紹介</a>
                    </li>
                    <li class="p-nav-sp__list-item" itemprop="name">
                        <a class="p-nav-sp__list-item-link" href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">施工事例</a>
                    </li>
                    <li class="p-nav-sp__list-item" itemprop="name">
                        <a class="p-nav-sp__list-item-link" href="<?php echo get_template_directory_uri(); ?>/company/">会社概要</a>
                    </li>
                    <li class="p-nav-sp__list-item" itemprop="name">
                        <a class="p-nav-sp__list-item-link" href="<?php echo get_template_directory_uri(); ?>/news/">新着情報</a>
                    </li>
                    <li class="p-nav-sp__list-item" itemprop="name">
                        <a class="p-nav-sp__list-item-link" href="<?php echo get_template_directory_uri(); ?>/recruit/">採用情報</a>
                    </li>
                </ul>
                <div class="p-nav-sp__contact">
                    <a href="<?php echo get_template_directory_uri(); ?>/contact/" class="p-nav-sp__contact-btn">
                        <span>お問い合わせ</span></a>
                </div>
            </nav>
        </div>

    </header>