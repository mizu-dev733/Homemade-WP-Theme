<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>
    <article class="p-news-archive">
        <div class="p-news-archive__inner l-inner">
            <div class="p-news-archive__category">

                <?php
                $active_all_class = (empty($_GET['category_filter'])) ? 'is-active' : '';
                ?>
                <form method="get" class="p-news-archive__category-form">
                    <div class="p-news-archive__category-list">
                        <button type="submit" name="category_filter" value="" class="p-news-archive__category-button <?php echo $active_all_class; ?>">ALL</button>

                        <?php
                        $terms = get_terms([
                            'taxonomy'   => 'category',
                            'orderby'    => 'name',
                            'order'      => 'ASC',
                            'hide_empty' => true,
                        ]);

                        if ($terms) :
                            foreach ($terms as $term) :
                                $active_class = (isset($_GET['category_filter']) && $_GET['category_filter'] == $term->term_id) ? 'is-active' : '';
                        ?>
                                <button type="submit" name="category_filter" value="<?php echo esc_attr($term->term_id); ?>" class="p-news-archive__category-button <?php echo $active_class; ?>">
                                    <?php echo esc_html($term->name); ?>
                                </button>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </form>

            </div>

            <div class="p-news-archive__cont">
                <?php

                $news_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 10,
                    'paged'          => $news_paged,
                );

                if (!empty($_GET['category_filter'])) {
                    $args['cat'] = intval($_GET['category_filter']);
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <div class="p-news-archive__item js-scroll-in">
                            <a href="<?php the_permalink(); ?>" class="p-news-archive__item-link">
                                <div class="p-news-archive__item-info">
                                    <span class="p-news-archive__item-date">
                                        <?php echo get_the_time(('Y.m.d')); ?>
                                    </span>
                                    <span class="p-news-archive__item-category">
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo esc_html($categories[0]->name);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <h3 class="p-news-archive__item-title">
                                    <?php the_title(); ?>
                                </h3>
                            </a>
                        </div>
                    <?php endwhile; ?>

                    <!-- ページネーション -->
                    <div class="p-news-archive__pagination">
                        <div class="p-news-archive__pagination-inner">
                            <?php
                            // 現在のページ番号を取得
                            $news_paged = get_query_var('paged') ? get_query_var('paged') : 1;

                            // 総ページ数
                            $total_pages = $query->max_num_pages;

                            if ($total_pages > 1) {
                                echo '<nav class="p-news-archive__pagination-nav" aria-label="Pagination">';
                                echo '<ul class="p-news-archive__pagination-list">';

                                // 「前へ」ボタン
                                if ($news_paged > 1) {
                                    echo '<li class="p-news-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($news_paged - 1)) . '" class="p-news-archive__pagination-href">←</a></li>';
                                }

                                // 最初のページ
                                if ($news_paged === 1) {
                                    echo '<li class="p-news-archive__pagination-item is-current"><span class="p-news-archive__pagination-href">1</span></li>';
                                } else {
                                    echo '<li class="p-news-archive__pagination-item"><a href="' . esc_url(get_pagenum_link(1)) . '" class="p-news-archive__pagination-href">1</a></li>';
                                }

                                // 中央部分の省略
                                if ($news_paged > 3) {
                                    echo '<li class="p-news-archive__pagination-item"><span class="p-news-archive__pagination-ellipsis">…</span></li>';
                                }

                                // 中央のページナビゲーション
                                $mid_size = 1;
                                for ($i = max(2, $news_paged - $mid_size); $i <= min($news_paged + $mid_size, $total_pages - 1); $i++) {
                                    if ($i === $news_paged) {
                                        echo '<li class="p-news-archive__pagination-item is-current"><span class="p-news-archive__pagination-href">' . $i . '</span></li>';
                                    } else {
                                        echo '<li class="p-news-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($i)) . '" class="p-news-archive__pagination-href">' . $i . '</a></li>';
                                    }
                                }

                                // 最後のページ
                                if ($news_paged < $total_pages - 2) {
                                    echo '<li class="p-news-archive__pagination-item"><span class="p-news-archive__pagination-ellipsis">…</span></li>';
                                }

                                if ($total_pages > 1) {
                                    if ($news_paged === $total_pages) {
                                        echo '<li class="p-news-archive__pagination-item is-current"><span class="p-news-archive__pagination-href">' . $total_pages . '</span></li>';
                                    } else {
                                        echo '<li class="p-news-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="p-news-archive__pagination-href">' . $total_pages . '</a></li>';
                                    }
                                }

                                // 「次へ」ボタン
                                if ($news_paged < $total_pages) {
                                    echo '<li class="p-news-archive__pagination-item"><a href="' . esc_url(get_pagenum_link($news_paged + 1)) . '" class="p-news-archive__pagination-href">→</a></li>';
                                }

                                echo '</ul>';
                                echo '</nav>';
                            }
                            ?>
                        </div>
                    </div>
                <?php
                else :
                    echo '<p>新着情報はありません。</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </article>


</main>

<?php get_footer(); ?>