<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>

    <div class="p-works-archive">
        <div class="p-works-archive__inner l-inner">
            <div class="p-works-archive__category-filter">
                <form method="get" action="">
                    <div class="p-works-archive__category-buttons">
                        <?php
                        $active_all_class = (empty($_GET['category_filter'])) ? 'is-active' : '';
                        ?>
                        <button type="submit" name="category_filter" value="" class="p-works-archive__category-button <?php echo $active_all_class; ?>">すべて</button>

                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'type_works',
                            'orderby' => 'name',
                            'order' => 'DSC',
                            'hide_empty' => true,
                        ]);

                        if ($terms) :
                            foreach ($terms as $term) :
                                $active_class = (isset($_GET['category_filter']) && $_GET['category_filter'] == $term->term_id) ? 'is-active' : '';
                                echo '<button type="submit" name="category_filter" value="' . esc_attr($term->term_id) . '" class="p-works-archive__category-button ' . $active_class . '">' . esc_html($term->name) . '</button>';
                            endforeach;
                        endif;
                        ?>
                    </div>
                </form>
            </div>


            <ul class="p-works-archive__list">

                <?php
                // 現在のページ番号を取得（デフォルトは1）
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $category_filter = isset($_GET['category_filter']) ? $_GET['category_filter'] : '';

                $args = [
                    'post_type' => 'works',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'tax_query' => [],
                ];

                if ($category_filter) {
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'type_works',
                            'field'    => 'term_id',
                            'terms'    => $category_filter,
                            'operator' => 'IN',
                        ],
                    ];
                }

                $works_query = new WP_Query($args);

                if ($works_query->have_posts()) :
                    while ($works_query->have_posts()) : $works_query->the_post();
                        $img1 = get_field('img1');
                        $month_year = get_field('month_year');
                        $size = 'just-size';
                ?>
                        <li class="p-works-archive__item js-scroll-in">
                            <a class="p-works-archive__href" href="<?php the_permalink(); ?>">
                                <div class="p-works-archive__img-wrap">
                                    <?php if ($img1) : ?>
                                        <?php echo wp_get_attachment_image($img1, $size); ?>
                                    <?php endif; ?>
                                </div>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'type_works');
                                if ($terms && !is_wp_error($terms)) :
                                    foreach ($terms as $term) :
                                        echo '<span class="p-works-archive__category">' . esc_html($term->name) . '</span>';
                                    endforeach;
                                endif;
                                ?>
                                <?php if ($month_year) : ?>
                                    <span class="p-works-archive__date">竣工年月：<?php echo esc_html($month_year); ?></span>
                                <?php endif; ?>
                                <h3 class="p-works-archive__title">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="p-works-archive__message">施工事例がありません。</p>';
                endif;
                ?>
            </ul>

            <div class="p-works-archive__pagination">
                <div class="p-works-archive__pagination-inner">
                    <?php
                    global $paged, $works_query;
                    if (!isset($paged) || !$paged) {
                        $paged = 1;
                    }

                    $total_pages = $works_query->max_num_pages;

                    if ($total_pages > 1) {
                        echo '<nav class="p-works-archive__pagination-nav" aria-label="Pagination">';
                        echo '<ul class="p-works-archive__pagination-list">';
                        // 「前へ」ボタン
                        if ($paged > 1) {
                            echo '<li class="p-works-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '" class="p-works-archive__pagination-href">←</a></li>';
                        }
                        // 最初のページへのリンク
                        if ($paged === 1) {
                            echo '<li class="p-works-archive__pagination-item is-current"><span class="p-works-archive__pagination-href">1</span></li>';
                        } else {
                            echo '<li class="p-works-archive__pagination-item"><a href="' . esc_url(get_pagenum_link(1)) . '" class="p-works-archive__pagination-href">1</a></li>';
                        }
                        // 「…」の表示（現在のページが2つ目以降で、最初のページと間隔がある場合）
                        if ($paged > 3) {
                            echo '<li class="p-works-archive__pagination-item"><span class="p-works-archive__pagination-ellipsis">…</span></li>';
                        }
                        // 中央のページナビゲーション
                        $mid_size = 1; // 現在のページの前後に表示する数
                        for ($i = max(2, $paged - $mid_size); $i <= min($paged + $mid_size, $total_pages - 1); $i++) {
                            if ($i === $paged) {
                                echo '<li class="p-works-archive__pagination-item is-current"><span class="p-works-archive__pagination-href">' . $i . '</span></li>';
                            } else {
                                echo '<li class="p-works-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($i)) . '" class="p-works-archive__pagination-href">' . $i . '</a></li>';
                            }
                        }
                        // 「…」の表示（現在のページが最後の2つ手前でない場合）
                        if ($paged < $total_pages - 2) {
                            echo '<li class="p-works-archive__pagination-item"><span class="p-works-archive__pagination-ellipsis">…</span></li>';
                        }
                        // 最後のページへのリンク
                        if ($total_pages > 1) {
                            if ($paged === $total_pages) {
                                echo '<li class="p-works-archive__pagination-item is-current"><span class="p-works-archive__pagination-href">' . $total_pages . '</span></li>';
                            } else {
                                echo '<li class="p-works-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="p-works-archive__pagination-href">' . $total_pages . '</a></li>';
                            }
                        }
                        // 「次へ」ボタン
                        if ($paged < $total_pages) {
                            echo '<li class="p-works-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '" class="p-works-archive__pagination-href">→</a></li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <section class=" c-service-cta" id="cv">
        <?php get_template_part('template-parts/cta'); ?>
    </section>

</main>

<?php get_footer(); ?>