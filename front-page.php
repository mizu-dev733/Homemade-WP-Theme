<?php get_header(); ?>

<div class="p-mv">
    <div class="p-mv__inner">
        <div class="p-mv__main-catch-wrap js-scroll-in">
            <h2 class="p-mv__main-catch">
                地域社会の<br>
                未来を築く
            </h2>
        </div>
        <div class="p-mv__sub-catch-wrap">
            <span class="p-mv__sub-catch">
                安全で信頼される建設を目指して。
            </span>
        </div>
        <div class="splide js-scroll-in" id="mv" aria-live="polite">
            <div class="p-mv__main-image splide__track" id="mv">
                <ul class="p-mv__main-image-list splide__list">
                    <li class="p-mv__main-image-item splide__slide">
                        <picture class="p-mv__main-image-picture">
                            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/mv01_sp.webp">
                            <img class="p-mv__main-image-img" src="<?php echo get_template_directory_uri(); ?>/images/home/mv01_pc.webp" alt="未来を築く作業員の姿">
                        </picture>
                    </li>
                    <li class="p-mv__main-image-item splide__slide">
                        <picture class="p-mv__main-image-picture">
                            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/mv02_sp.webp">
                            <img class="p-mv__main-image-img" src="<?php echo get_template_directory_uri(); ?>/images/home/mv02_pc.webp" alt="堺市に密着した建設会社">
                        </picture>
                    </li>
                    <li class="p-mv__main-image-item splide__slide">
                        <picture class="p-mv__main-image-picture">
                            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/mv03_sp.webp">
                            <img class="p-mv__main-image-img" src="<?php echo get_template_directory_uri(); ?>/images/home/mv03_pc.webp" alt="建設会社のイメージ">
                        </picture>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main>
    <section class="p-home-news" id="news">
        <div class="p-home-news__inner l-inner">
            <div class="p-home-news__head">
                <div class="c-heading01 js-scroll-in">
                    <span class="c-heading01__en">News</span>
                    <h2 class="c-heading01__ja">新着情報</h2>
                </div>
            </div>
            <div class="p-home-news__cont">
                <div class="p-home-news__tabs">
                    <ul class="p-home-news__tab-list js-scroll-in">
                        <li class="p-home-news__tab-item">
                            <button class="p-home-news__tab is-active" data-category="all">ALL</button>
                        </li>
                        <li class="p-home-news__tab-item">
                            <button class="p-home-news__tab" data-category="notice">お知らせ</button>
                        </li>
                        <li class="p-home-news__tab-item">
                            <button class="p-home-news__tab" data-category="careers">採用情報</button>
                        </li>
                        <li class="p-home-news__tab-item">
                            <button class="p-home-news__tab" data-category="partner">パートナー</button>
                        </li>
                    </ul>
                </div>
                <div class="p-home-news__list-wrap js-scroll-in">
                    <div class="p-home-news__list">
                        <!-- ALL -->
                        <ul class="p-home-news__category-list js-all-posts">
                            <?php
                            // 全てのカテゴリを一度に取得
                            $args = array(
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                            $all_query = new WP_Query($args);
                            if ($all_query->have_posts()) :
                                while ($all_query->have_posts()) : $all_query->the_post();
                            ?>
                                    <li class="p-home-news__item">
                                        <a class="p-home-news__item-href" href="<?php the_permalink(); ?>">
                                            <div class="p-home-news__item-info">
                                                <span class="p-home-news__item-time"><?php the_time('Y.m.d'); ?></span>
                                                <span class="p-home-news__item-category">
                                                    <?php $categories = get_the_category();
                                                    echo $categories[0]->name; ?>
                                                </span>
                                            </div>
                                            <h3 class="p-home-news__item-title"><?php the_title(); ?></h3>
                                        </a>
                                    </li>
                            <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </ul>

                        <!-- 各カテゴリの投稿リスト -->
                        <?php
                        // 各カテゴリに対するループ
                        $categories = ['notice', 'careers', 'partner'];
                        foreach ($categories as $category_slug) :
                            $args = array(
                                'category_name' => $category_slug,
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                            $category_query = new WP_Query($args);
                            if ($category_query->have_posts()) :
                        ?>
                                <ul class="p-home-news__category-list js-<?php echo $category_slug; ?>-posts">
                                    <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
                                        <li class="p-home-news__item">
                                            <a class="p-home-news__item-href" href="<?php the_permalink(); ?>">
                                                <div class="p-home-news__item-info">
                                                    <span class="p-home-news__item-time"><?php the_time('Y-m-d'); ?></span>
                                                    <span class="p-home-news__item-category"><?php $categories = get_the_category();
                                                                                                echo $categories[0]->name; ?></span>
                                                </div>
                                                <h3 class="p-home-news__item-title"><?php the_title(); ?></h3>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                        <?php
                            endif;
                            wp_reset_postdata();
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <div class="p-home-news__bottom">
                <div class="c-btn02">
                    <a class="c-btn02__href" href="<?php echo get_template_directory_uri(); ?>/news/">
                        <span class="c-btn02__inner">
                            一覧を見る
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="p-home-company" id="company">
        <div class="p-home-company__inner">
            <div class="p-home-company__cont">
                <div class="p-home-company__head js-scroll-in">
                    <span class="p-home-company__en">Company</span>
                    <h2 class="p-home-company__ja">人と街をつなぐ架け橋となる</h2>
                </div>
                <div class="p-home-company__lead-wrap">
                    <p class="p-home-company__lead">私たち西門建設工業は、地域社会のインフラを支える中規模公共工事から、人々の暮らしを彩る商業施設やマンションの施工、そして、住まいの安心を支える個人住宅のリフォーム・耐震補強工事まで、幅広い建設ニーズに柔軟に対応しています。<br>
                        創業以来、大阪府南部を中心に、地域に密着した活動を続けてきました。単に建物を建てるだけでなく、地域社会の未来を共に築くことを使命とし、安全で信頼される建設を通じて、人と街をつなぐ架け橋となることを目指しています。</p>
                </div>
                <div class="p-home-company__btn">
                    <div class="c-btn01">
                        <a class="c-btn01__href" href="<?php echo get_template_directory_uri(); ?>/company">
                            会社概要へ
                            <span class="c-btn01__ico"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-home-company__img-wrap">
                <div class="p-home-company__img01 js-scroll-in">
                    <picture class="p-home-company__picture">
                        <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/company01_sp.webp">
                        <img class="p-home-company__img01-img" src="<?php echo get_template_directory_uri(); ?>/images/home/company01_pc.webp" alt="設計図を確認する作業員">
                    </picture>
                </div>
                <div class="p-home-company__img02 js-scroll-in">
                    <picture class="p-home-company__picture">
                        <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/company02_sp.webp">
                        <img class="p-home-company__img02-img" src="<?php echo get_template_directory_uri(); ?>/images/home/company02_pc.webp" alt="作業の打ち合わせをする男女の作業員">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="p-home-works" id="works">
        <div class="p-home-works__top">
            <div class="c-heading01  js-scroll-in">
                <span class="c-heading01__en">Works</span>
                <h2 class="c-heading01__ja">施工実績</h2>
            </div>
        </div>
        <div class="p-home-works__cont splide" id="works-slide">
            <div class="p-home-works__cont-inner splide__track">
                <ul class="p-home-works__list splide__list">
                    <?php
                    $args = array(
                        'post_type' => 'works',
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();

                            // カスタムフィールド img1 の取得
                            $img1_id = get_field('img1', get_the_ID());
                            if ($img1_id) :
                                $img1_url = wp_get_attachment_url($img1_id);
                    ?>
                                <li class="p-home-works__item splide__slide">

                                    <div class="p-home-works__item-img-wrap">
                                        <img class="p-home-works__item-img" src="<?php echo esc_url($img1_url); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>

                                    <div class="p-home-works__item-info">

                                        <?php
                                        // カスタムフィールドの取得と表示
                                        $fields = [
                                            'use'       => '用途',
                                            'location'  => '所在地',
                                            'month_year' => '竣工年月'
                                        ];

                                        // タームの取得と表示
                                        $terms = get_the_terms(get_the_ID(), 'type_works');
                                        if ($terms && !is_wp_error($terms)) {
                                            $term_names = wp_list_pluck($terms, 'name');
                                            echo '<p class="p-home-works__item-term">' . implode(', ', $term_names) . '</p>';
                                        }
                                        ?>
                                        <h3 class="p-home-works__item-title">
                                            <?php the_title(); ?>
                                        </h3>

                                        <?php
                                        // フィールドをループで出力
                                        foreach ($fields as $field_key => $label) {
                                            $value = get_field($field_key);
                                            if ($value) {
                                                echo '<div class="p-home-works__item-flex">';
                                                echo '<span class="p-home-works__item-label">' . esc_html($label) . '</span>';
                                                echo '<span class="p-home-works__item-value">' . esc_html($value) . '</span>';
                                                echo '</div>';
                                            }
                                        }
                                        ?>
                                        <div class="p-home-works__btn">
                                            <div class="c-btn02">
                                                <a class="c-btn02__href" href="<?php echo get_permalink(); ?>
                                                ">
                                                    <span class="c-btn02__inner">
                                                        詳細を見る
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                    <?php
                            else :
                                echo '<!-- img1 フィールドが設定されていません -->';
                            endif;

                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>施工事例がありません。</p>';
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        <div class="p-home-works__btn">
            <div class="c-btn01">
                <a class="c-btn01__href" href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">
                    施工実績一覧へ
                    <span class="c-btn01__ico"></span>
                </a>
            </div>
        </div>
    </section>
    <section class="p-home-service" id="service">
        <div class="p-home-service__inner l-inner">
            <div class="p-home-service__info-wrap  js-scroll-in">
                <?php
                $services = [
                    [
                        'id' => 'info-1',
                        'image_pc' => get_template_directory_uri() . '/images/home/service01_pc.webp',
                        'image_sp' => get_template_directory_uri() . '/images/home/service01_sp.webp',
                        'en_title' => 'Architecture',
                        'ja_title' => '建築事業',
                        'detail' => '最新技術と伝統の技を融合させ、安心・安全で洗練された空間づくりを提供します。住宅、商業施設、公共施設まで幅広いニーズに対応します。',
                    ],
                    [
                        'id' => 'info-2',
                        'image_pc' => get_template_directory_uri() . '/images/home/service02_pc.webp',
                        'image_sp' => get_template_directory_uri() . '/images/home/service02_sp.webp',
                        'en_title' => 'Civil engineering',
                        'ja_title' => '土木事業',
                        'detail' => '地域社会を支える基盤づくりをお手伝いします。道路や橋梁の整備から河川やダム工事まで、確かな技術力と環境に配慮した施工で未来を築くお手伝いをいたします。',
                    ],
                    [
                        'id' => 'info-3',
                        'image_pc' => get_template_directory_uri() . '/images/home/service03_pc.webp',
                        'image_sp' => get_template_directory_uri() . '/images/home/service03_sp.webp',
                        'en_title' => 'Housing',
                        'ja_title' => '住宅事業',
                        'detail' => '家族の笑顔が集まる場所をつくる。それが私たちの使命です。快適さとデザイン性を兼ね備えた家づくりで、理想のライフスタイルを実現するお手伝いをします。',
                    ],
                ];

                foreach ($services as $index => $service) : ?>
                    <div class="p-home-service__info <?php echo $index === 0 ? 'is-active' : ''; ?>" id="<?php echo esc_attr($service['id']); ?>">
                        <div class="p-home-service__info-img">
                            <picture class="p-home-service__picture">
                                <source media="(max-width: 767px)" srcset="<?php echo esc_url($service['image_sp']); ?>">
                                <img class="p-home-service__img" src="<?php echo esc_url($service['image_pc']); ?>" alt="<?php echo esc_html($service['ja_title']); ?>">
                            </picture>
                        </div>
                        <div class="p-home-service__info-title">
                            <span class="p-home-service__info-en">
                                <?php echo esc_html($service['en_title']); ?>
                            </span>
                            <h3 class="p-home-service__info-title-ja">
                                <?php echo esc_html($service['ja_title']); ?>
                            </h3>
                        </div>
                        <div class="p-home-service__info-detail">
                            <p class="p-home-service__info-text">
                                <?php echo esc_html($service['detail']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="p-home-service__cont">
                <div class="p-home-service__head">
                    <div class="c-heading02  js-scroll-in">
                        <span class="c-heading02__en">Service</span>
                        <h2 class="c-heading02__ja">事業紹介</h2>
                    </div>
                    <div class="p-home-service__lead">
                        <p class="p-home-service__text">
                            域社会に貢献するため、私たちは環境に優しい土木事業を推進しています。公共施設やインフラの整備を通じて、持続可能な未来を築くために尽力しています。高い技術力と丁寧な施工で、地域の発展に貢献できるよう努めています。
                        </p>
                    </div>
                </div>
                <ul class="p-home-service__list">
                    <?php foreach ($services as $index => $service) : ?>
                        <li class="p-home-service__item <?php echo $index === 0 ? 'is-active' : ''; ?>" data-target="<?php echo esc_attr($service['id']); ?>">
                            <h3 class="p-home-service__item-title">
                                <?php echo esc_html($service['ja_title']); ?>
                            </h3>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="p-home-service__btn">
                <div class="c-btn01">
                    <a class="c-btn01__href" href="<?php echo esc_url(get_template_directory_uri() . '/service'); ?>">
                        事業紹介へ
                        <span class="c-btn01__ico"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="p-home-recruit" id="recruit">
        <div class="p-home-recruit__inner l-inner">
            <div class="p-home-recruit__cont">
                <div class="p-home-recruit__head">
                    <div class="c-heading02 js-scroll-in">
                        <span class="c-heading02__en">Recruit</span>
                        <h2 class="c-heading02__ja">採用情報</h2>
                    </div>

                </div>
                <h3 class="p-home-recruit__sub-title js-scroll-in">
                    チームで成長する、<br>地域密着の建設会社。
                </h3>
                <p class="p-home-recruit__lead">
                    西門建設工業は、社員同士のチームワークを大切にする企業文化です。経験豊富な先輩社員が丁寧に指導し、未経験の方でも安心して成長できる環境が整っています。<br>
                    地域密着型で、アットホームな雰囲気の中、チーム一丸となって目標を達成する喜びを分かち合いましょう。
                </p>
                <div class="p-home-recruit__btn">
                    <div class="c-btn01">
                        <a class="c-btn01__href" href="<?php echo esc_url(get_template_directory_uri() . '/recruit'); ?>">
                            採用情報へ
                            <span class="c-btn01__ico"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-home-recruit__img-wrap js-scroll-in">
                <div class="p-home-recruit__img-inner">
                    <picture class="p-home-recruit__picture">
                        <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/recruit01_sp.webp">
                        <img class="p-home-recruit__img" src="<?php echo get_template_directory_uri(); ?>/images/home/recruit01_pc.webp" alt="前を向く若い男性作業員">
                    </picture>
                    <picture class="p-home-recruit__picture">
                        <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/recruit02_sp.webp">
                        <img class="p-home-recruit__img" src="<?php echo get_template_directory_uri(); ?>/images/home/recruit02_pc.webp" alt="丁寧に作業を進める女性事務員">
                    </picture>
                    <picture class="p-home-recruit__picture">
                        <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/home/recruit03_sp.webp">
                        <img class="p-home-recruit__img" src="<?php echo get_template_directory_uri(); ?>/images/home/recruit03_pc.webp" alt="現場で業務に励むベテラン作業員">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="p-home-cta" id="cv">
        <?php get_template_part('template-parts/cta'); ?>
    </section>
</main>

<?php get_footer(); ?>