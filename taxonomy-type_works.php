<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>

    <div class="p-works-tax">
        <div class="p-works-tax__inner l-inner">

            <h2 class="p-works-tax__title">
                <?php single_term_title(); ?>の実績
            </h2>

            <ul class="p-works-tax__list">

                <?php
                $paged_tax = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = [
                    'post_type' => 'works',
                    'posts_per_page' => 10,
                    'paged' => $paged_tax,
                    'tax_query' => [
                        [
                            'taxonomy' => 'type_works',
                            'field'    => 'slug',
                            'terms'    => get_queried_object()->slug,
                        ],
                    ],
                ];

                $works_query = new WP_Query($args);

                if ($works_query->have_posts()) :
                    while ($works_query->have_posts()) : $works_query->the_post();
                        $img1 = get_field('img1');
                        $month_year = get_field('month_year');
                        $size = 'just-size';
                ?>
                        <li class="p-works-tax__item">
                            <a class="p-works-tax__href" href="<?php the_permalink(); ?>">
                                <div class="p-works-tax__item-img-wrap">
                                    <?php if ($img1) : ?>
                                        <?php echo wp_get_attachment_image($img1, $size); ?>
                                    <?php endif; ?>
                                </div>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'type_works');
                                if ($terms && !is_wp_error($terms)) :
                                    foreach ($terms as $term) :
                                        echo '<span class="p-works-tax__item-category">' . esc_html($term->name) . '</span>';
                                    endforeach;
                                endif;
                                ?>
                                <?php if ($month_year) : ?>
                                    <span class="p-works-tax__item-date">竣工年月：<?php echo esc_html($month_year); ?></span>
                                <?php endif; ?>
                                <h3 class="p-works-tax__item-title">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="p-works-tax__message">施工事例がありません。</p>';
                endif;
                ?>
            </ul>

            <div class="p-works-tax__pagination">
                <div class="p-works-tax__pagination-inner">
                    <?php
                    $total_pages = $works_query->max_num_pages;
                    $current_page = max(1, get_query_var('paged', 1)); // 現在のページ番号

                    if ($total_pages > 1) {
                        echo '<nav class="p-works-tax__pagination-nav" aria-label="Pagination">';
                        echo '<ul class="p-works-tax__pagination-list">';

                        // 「前へ」リンク
                        if ($current_page > 1) {
                            echo '<li class="p-works-tax__pagination-item"><a href="' . esc_url(get_pagenum_link($current_page - 1)) . '" class="p-works-tax__pagination-href">←</a></li>';
                        }

                        // 最初のページリンク
                        if ($current_page === 1) {
                            echo '<li class="p-works-tax__pagination-item is-current"><span class="p-works-tax__pagination-href">1</span></li>';
                        } else {
                            echo '<li class="p-works-tax__pagination-item"><a href="' . esc_url(get_pagenum_link(1)) . '" class="p-works-tax__pagination-href">1</a></li>';
                        }

                        // 「...」の表示
                        if ($current_page > 3) {
                            echo '<li class="p-works-tax__pagination-item"><span class="p-works-tax__pagination-ellipsis">…</span></li>';
                        }

                        // 中央のページリンク
                        $mid_size = 1;
                        for ($i = max(2, $current_page - $mid_size); $i <= min($current_page + $mid_size, $total_pages - 1); $i++) {
                            if ($i === $current_page) {
                                echo '<li class="p-works-tax__pagination-item is-current"><span class="p-works-tax__pagination-href">' . $i . '</span></li>';
                            } else {
                                echo '<li class="p-works-tax__pagination-item"><a href="' . esc_url(get_pagenum_link($i)) . '" class="p-works-tax__pagination-href">' . $i . '</a></li>';
                            }
                        }

                        // 「...」の表示
                        if ($current_page < $total_pages - 2) {
                            echo '<li class="p-works-tax__pagination-item"><span class="p-works-tax__pagination-ellipsis">…</span></li>';
                        }

                        // 最後のページリンク
                        if ($total_pages > 1) {
                            if ($current_page === $total_pages) {
                                echo '<li class="p-works-tax__pagination-item is-current"><span class="p-works-tax__pagination-href">' . $total_pages . '</span></li>';
                            } else {
                                echo '<li class="p-works-tax__pagination-item"><a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="p-works-tax__pagination-href">' . $total_pages . '</a></li>';
                            }
                        }

                        // 「次へ」リンク
                        if ($current_page < $total_pages) {
                            echo '<li class="p-works-tax__pagination-item"><a href="' . esc_url(get_pagenum_link($current_page + 1)) . '" class="p-works-tax__pagination-href">→</a></li>';
                        }

                        echo '</ul>';
                        echo '</nav>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <section class="p-tax-works-cta" id="cv">
        <?php get_template_part('template-parts/cta'); ?>
    </section>
</main>

<?php get_footer(); ?>