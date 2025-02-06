<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>

    <?php
    while (have_posts()) :
        the_post();
    ?>
        <article class="p-works-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="p-works-post__inner l-inner">
                <header class="p-works-post__header">

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'type_works');
                    if ($terms && !is_wp_error($terms)) :
                        foreach ($terms as $term) :
                            echo '<span class="p-works-post__category">' . esc_html($term->name) . '実績</span>';
                        endforeach;
                    endif;
                    ?>

                    <h2 class="p-works-post__title"><?php the_title(); ?></h2>
                </header>

                <div class="p-works-post__slider">
                    <div class="p-works-post__slider-main splide" id="splide-slider">
                        <div class="splide__track">
                            <ul class="p-works-post__slider-list splide__list">
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    $image_id = get_post_meta(get_the_ID(), 'img' . $i, true);
                                    if ($image_id) {
                                        $image_url = wp_get_attachment_image_url($image_id, 'large');
                                        echo '<li class="p-works-post__slider-item splide__slide">';
                                        echo '<img class="p-works-post__slider-img" src="' . esc_url($image_url) . '" alt="Slide ' . $i . '">';
                                        echo '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="p-works-post__thumbnails-wrap">
                        <div class="p-works-post__thumbnails splide" id="splide-thumbnails">
                            <div class="splide__track">
                                <ul class="p-works-post__thumbnails-list splide__list">
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        $image_id = get_post_meta(get_the_ID(), 'img' . $i, true);
                                        if ($image_id) {
                                            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                                            echo '<li class="p-works-post__thumbnails-item splide__slide">';
                                            echo '<img class="p-works-post__thumbnails-img"  src="' . esc_url($image_url) . '" alt="Thumbnail ' . $i . '">';
                                            echo '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-works-post__cont">
                    <dl class="p-works-post__list">
                        <?php if ($use = get_post_meta(get_the_ID(), 'use', true)): ?>
                            <dt class="p-works-post__term">用途</dt>
                            <dd class="p-works-post__desc"><?php echo esc_html($use); ?></dd>
                        <?php endif; ?>

                        <?php if ($location = get_post_meta(get_the_ID(), 'location', true)): ?>
                            <dt class="p-works-post__term">所在地</dt>
                            <dd class="p-works-post__desc"><?php echo esc_html($location); ?></dd>
                        <?php endif; ?>

                        <?php
                        $month_year = get_field('month_year');
                        if ($month_year) : ?>
                            <dt class="p-works-post__term">竣工年月</dt>
                            <dd class="p-works-post__desc"><?php echo esc_html($month_year); ?></dd>
                        <?php endif; ?>

                        <?php if (get_the_content()): ?>
                            <dt class="p-works-post__term">概要</dt>
                            <dd class="p-works-post__desc"><?php the_content(); ?></dd>
                        <?php endif; ?>

                        <?php if ($remarks = get_post_meta(get_the_ID(), 'remarks', true)): ?>
                            <dt class="p-works-post__term">備考</dt>
                            <dd class="p-works-post__desc"><?php echo esc_html($remarks); ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
                <div class="p-works-post__btn">
                    <div class="c-btn01">
                        <a class="c-btn01__href" href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">
                            施工事例一覧へ
                            <span class="c-btn01__ico"></span>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    <?php
    endwhile;
    ?>


    <div class="p-works-related">
        <div class="p-works-related__inner l-inner">
            <div class="p-works-related__head">
                <h2 class="p-works-related__title">
                    その他の実績
                </h2>
            </div>

            <?php
            $current_post_id = get_the_ID();
            $terms = wp_get_post_terms($current_post_id, 'type_works');

            if ($terms) {
                $term_ids = wp_list_pluck($terms, 'term_id');

                $args = array(
                    'post_type'      => 'works',
                    'posts_per_page' => 3,
                    'post__not_in'   => array($current_post_id),
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'type_works',
                            'field'    => 'id',
                            'terms'    => $term_ids,
                            'operator' => 'IN',
                        ),
                    ),
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    echo '<div class="p-works-related__items">';
                    while ($query->have_posts()) : $query->the_post();
                        // タクソノミーを表示
                        $terms = wp_get_post_terms(get_the_ID(), 'type_works');
                        $term_names = wp_list_pluck($terms, 'name');
                        $term_list = implode(', ', $term_names);
            ?>
                        <div class="p-works-related__item">
                            <a class="p-works-related__href" href="<?php echo get_permalink(); ?>">
                                <?php
                                $img1 = get_field('img1');
                                if ($img1) :
                                ?>
                                    <div class="p-works-related__item-img">
                                        <?php echo wp_get_attachment_image($img1, 'just-size');
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <div class="p-works-related__item-cont">
                                    <div class="p-works-related__item-head">
                                        <div class="p-works-related__item-term">
                                            <?php echo esc_html($term_list); ?>
                                        </div>
                                        <h3 class="p-works-related__item-title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>
                                    <div class="p-works-related__item-details">
                                        <div class="p-works-related__item-flex">
                                            <span class="p-works-related__item-label">用途</span>
                                            <span class="p-works-related__item-value">
                                                <?php echo esc_html(get_field('use')); ?>
                                            </span>
                                        </div>
                                        <div class="p-works-related__item-flex">
                                            <span class="p-works-related__item-label">所在地</span>
                                            <span class="p-works-related__item-value">
                                                <?php echo esc_html(get_field('location')); ?>
                                            </span>
                                        </div>
                                        <div class="p-works-related__item-flex">
                                            <span class="p-works-related__item-label">竣工年月</span>
                                            <span class="p-works-related__item-value">
                                                <?php echo esc_html(get_field('month_year')); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php
                    endwhile;
                    echo '</div>';
                else :
                    echo '<p>関連記事はありません。</p>';
                endif;

                wp_reset_postdata();
            }
            ?>
        </div>
    </div>

    <section class="p-service-cta" id="cv">
        <?php get_template_part('template-parts/cta'); ?>
    </section>
</main>
<?php get_footer(); ?>